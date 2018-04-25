new Vue({
  el: '#app',
  data: function () {
    return {
      data: {},
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.getData()
    })
  },
  methods: {
    getData: function () {
      $client_id = "JhAG4x3MO1GR7_4VTrTg";
      $client_secret = "f9BLgLA_fD";
      $encText = urlencode("불정로 6");
      $url = "https://openapi.naver.com/v1/map/geocode?query=".$encText; // json
// $url = "https://openapi.naver.com/v1/map/geocode.xml?query=".$encText; // xml

      $is_post = false;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, $is_post);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $headers = array();
      $headers[] = "X-Naver-Client-Id: ".$client_id;
      $headers[] = "X-Naver-Client-Secret: ".$client_secret;
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      $response = curl_exec ($ch);
      $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      echo "status_code:".$status_code."<br>";
      curl_close ($ch);
      if($status_code == 200) {
        echo $response;
      } else {
        echo "Error 내용:".$response;
      }
    },
  }
})
