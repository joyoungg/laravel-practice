new Vue({
  el: '#app',
  data: function () {
    return {
      submitted:false,
      data: {},
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.id = $('#id').val()
      this.getData()
    })
  },
  methods: {
    getData: function () {
      axios.get('/api/list/'+ this.id ).then(result => {
        this.data = result.data
        console.log(this.data)
      })
    },
    submit:function () {
      console.log(this.data)
      axios.post('/api/modify',this.data).then(response => {
        alert('수정!')
        location.href='/list'
      },error => {
        if (error.response.status == 404) {
          alert(error.response.data.errors[Object.keys(error.response.data.errors)[0]])
        }
        console.log(error)
      })
    }
  },
})
