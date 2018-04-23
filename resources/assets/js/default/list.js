new Vue({
  el: '#app',
  data: function () {
    return {
      data: {},
      id: '',
      page: {
        nextPageUrl: '',
        prevPageUrl: '',
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
      axios.get('/api/list').then(response => {
        console.log(response)
        console.log(response.data.data)
        console.log(response.data.meta)
        this.data = response.data.data
        this.page = response.data.meta.pagination
        console.log(this.page.per_page)
        // this.data = response.data.data
        // this.page = response.data.meta.pagination
        // console.log(this.data)
        // console.log(this.page)
      }, error => {
        console.error(error)
      })
    },
    view: function (id) {
      location.href = '/list/detail/' + id
    },
    getPage: function (num) {
      console.log('click' + num + 'page')
      this.page.current_page = num
      //this.getData()
    }
  }
})
