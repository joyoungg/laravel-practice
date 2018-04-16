new Vue({
  el: '#app',
  data: function () {
    return {
      id: '',
      data: {
        //게시글 내용
      },
    addComment: {
        //새로추가
        content_id: '',
        comment_id: '',
        name: '',
        content: '',
        index:'',
    },
      coList: {
        //기존
      },
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.id = $('#id').val()
      this.addComment.content_id = this.id
      //console.log('글번호는' + this.coData.own)
      this.getData()
      this.getComment()
    })
  },
  methods: {
    getComment: function () {
      // 게시글의 코멘트 리스트 show
      axios.get('/api/comment/list/' + this.id).then(result => {
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
    modify: function () {
      // console.log(id)
      location.href = '/list/modify/' + this.id
    },
    mkComment: function (id) {
      this.addComment.comment_id = id
      axios.post('/api/comment/create', this.addComment).then(response => {
        alert('코멘트 등록!')
        location.reload()
      }), error => {
        console.log(error)
      }
    },
  },
})
