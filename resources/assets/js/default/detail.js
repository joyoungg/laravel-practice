new Vue({
  el: '#app',
  data: function () {
    return {
      id: '',
      data: {
        //게시글 내용
      },
      coData: {
        //새로추가
        id: '',
        coName: '',
        coContent: '',
        own: '',
      },
      coList: {
        //기존
      },
      recoData: {
        coNumber: '',
        recoName: '',
        recoContent: '',
      },
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.id = $('#id').val()
      this.coData.own = this.id
      //console.log('글번호는' + this.coData.own)
      this.getData()
      this.getComment()
    })
  },
  methods: {
    getComment: function () {
      // 게시글의 코멘트 리스트 show
      axios.get('/api/comment/list').then(result => {
        this.coList = result.data.data
        console.log('기존의 코멘트')
        console.log(this.coList)
      })
    },
    getData: function () {
      //게시글 상세내용
      axios.get('/api/list/' + this.id).then(result => {
        this.data = result.data
      })
    },
    modify: function (id) {
      location.href = '/list/modify/' + id
    },
    comment: function () {
      // 새로운 코멘트 등록
      axios.post('/api/comment/create', this.coData).then(response => {
        console.log('등록하는 코멘트')
        console.log(this.coData)
        alert('코멘트 등록!')
        location.reload()
      }), error => {
        console.log(error)
      }
    },
    // test: function (id) {
    //   alert('click' + id)
    //   $('#passwordModal').modal('show')
    // },
    click: function (id) {
      alert('click' + id)
      $('#myModal').modal('show')
    },
    recomment:function (id) {

    },
    // submit: function () {
    //   axios.post('/api/comment/create/re', this.recoData).then(response => {
    //     console.log(this.recoData)
    //     alert('등록!')
    //     //location.reload()
    //   }), error => {
    //     console.log(error)
    //   }
    // }
  },
})
