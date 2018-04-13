new Vue({
  el: '#app',
  data: function () {
    return {
      data: {},
      id: '',
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
      axios.get('/api/list').then(result => {
        this.data = result.data.data
      })
    },
    view: function (id) {
      location.href = '/list/detail/' + id
    },
  }
})
