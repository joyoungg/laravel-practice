<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport"
        content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
  <title>Login Demo - Kakao JavaScript SDK</title>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

</head>
<body>
<div>
  <a id="kakao-login-btn"></a>
</div>
<div>
  <div id="kakao-logged-group"></div>
</div>
<div id="kakao-profile"></div>


<script type='text/javascript'>
  //<![CDATA[
  // 사용할 앱의 JavaScript 키를 설정해 주세요.
  $(document).ready(function () {
    Kakao.init('0dcdfc9cb3669d792a3fb56babaf680f')
    // 카카오 로그인 버튼을 생성합니다.
    Kakao.Auth.createLoginButton({
      container: '#kakao-login-btn',
      size: 'large',
      persistAccessToken: true,
      persistRefreshToken: true,
      success: function (authObj) {
        Kakao.API.request({
          url: '/v1/user/me',
          success: function (res) {
            Kakao.Auth.getStatus(function (statusObj) {
              alert('hi' + statusObj)
              var refreshToken = Kakao.Auth.getRefreshToken()
            })
            $('#kakao-profile').append(res.properties.nickname)
            // $('#kakao-profile').append($('<img/>', {
            //   'src': res.properties.profile_image,
            //   'alt': res.properties.nickname + '님의 프로필 사진'
            // }))
            console.log(JSON.stringify(res.kaccount_email));
            console.log(JSON.stringify(res.id));
            console.log(JSON.stringify(res.properties.nickname));
          },
          fail: function (error) {
            console.log(error)
          }
        })
        createKakaotalkLogout()
        //alert(JSON.stringify(authObj));
      },
      fail: function (err) {
        console.log(err)
        //alert(JSON.stringify(err));
      }
    })
    function createKakaotalkLogout () {
      $('#kakao-logged-group .kakao-logout-btn,#kakao-logged-group .kakao-login-btn').remove()
      var logoutBtn = $('<a/>', {'class': 'kakao-logout-btn', 'text': '로그아웃'})
      logoutBtn.click(function () {
        Kakao.Auth.logout()
        Kakao.Auth.getStatus(function (statusObj) {
          alert(statusObj)
        })
        //Kakao.Auth.createLoginButton()
        $('#kakao-profile').text('')
      })
      $('#kakao-logged-group').prepend(logoutBtn)
    }

    if (Kakao.Auth.getRefreshToken() != undefined && Kakao.Auth.getRefreshToken().replace(/ /gi, '') != '') {
      console.log(1)
      //createKakaotalkLogout()
      //getKakaotalkUserProfile()
    } else {
      console.log(2)
      // createKakaotalkLogin()
    }
  })
</script>
</body>
</html>