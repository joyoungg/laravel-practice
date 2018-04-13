new Vue({
  el: '#app',
  data: function () {
    return {
      id: '',
      data: {},
      coData: {
        coName: '',
        coContent: '',
        own: '',
      },
      coList:{}
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
      axios.get('/api/comment/list').then(result => {
        this.coList = result.data.data
        console.log('기존의 코멘트')
        console.log(this.coList)

      })
    },
    getData: function () {
      axios.get('/api/list/' + this.id).then(result => {
        this.data = result.data
        console.log(this.data)
      })
    },
    modify: function (id) {
      location.href = '/list/modify/' + id
    },
    comment: function () {
      //this.coData.own = this.id
      axios.post('/api/comment/create', this.coData).then(response => {
        console.log('등록하는 코멘트')
        console.log(this.coData)
        alert('코멘트 등록!')
        location.reload()
      }), error => {
        console.log(error)
      }
    }
  },
})
