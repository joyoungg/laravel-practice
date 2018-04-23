new Vue({
  el: '#app',
  data: function () {
    return {
      id: '',
      data:{},
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.getAccount()
      //this.getRole()

    })
  },
  methods: {
    getAccount: function () {
      axios.get('/api/account').then(result => {

      })

    },
    // getRole: function () {
    //
    // }

  },
})
