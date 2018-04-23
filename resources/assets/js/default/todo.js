new Vue({
  el: '#app',
  data: function () {
    return {
      todoData: {},
      todoList: {},
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.getList()
    })
  },
  methods: {
    getList: function () {
      axios.get('/api/getTodo').then(response => {
        this.todoList = response.data.data
        // console.log(response.data)
        //console.log(response.data.data)
        //console.log(response)
      })
    },
    addTodo: function () {
      axios.post('/api/addTodo', this.todoData).then(result => {
        //console.log(result)
        if (result.status == 200) {
          alert('등록!')
          this.getList()
        }
      }, errors => {
        console.log(errors)
      })
    },
    change: function (id) {
      this.todoData.id = id
      axios.post('/api/done', this.todoData).then(result => {
        console.log(result)
        this.getList()
      }, errors => {
        console.log(errors)
      })
    },
    erase: function (id) {
      this.todoData.id = id
      axios.delete('/api/erase/' + this.todoData.id)
      this.getList()
    },
  }
})
