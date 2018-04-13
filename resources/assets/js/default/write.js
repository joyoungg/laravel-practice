new Vue({
  el: '#app',
  data: function () {
    return {
      submitted: false,
      data: {
        title: '',
        name: '',
        content: '',
      },
    }
  },
  methods: {
    submit: function () {
      axios.post('/api/write', this.data).then(response => {
        this.submitted = true
        console.log(this.data)
        alert('등록되었습니다.')
        location.href = '/list'
      }, error => {
        console.log(error)
        this.submitted = false
      })
    },
  }
})
