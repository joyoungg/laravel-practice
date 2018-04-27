new Vue({
  el: '#app',
  data: function () {
    return {
      data: {},
      id: '',
      page: {
        nextPageUrl: '',
        prevPageUrl: '',
        per_page: '1',
      },
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
      axios.get('/api/list?' + this.page.per_page).then(response => {
        console.log(this.page.current_page)
        console.log(response)
        console.log(response.data.data)
        this.data = response.data.data
        this.page = response.data.meta.pagination
      }, error => {
        console.error(error)
      })
    },
    view: function (id) {
      location.href = '/list/detail/' + id
    },
    getPage: function (num) {
      this.page.current_page = num
      this.getData()
    }
  }
})
