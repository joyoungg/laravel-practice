new Vue({
  el: '#app',
  data: function () {
    return {
      todoData: {},
      todoList: {},
      todo: {},
    }
  },
  mounted: function () {
    this.$nextTick(function () {
      this.getList()
      this.getContent()
    })
  },
  methods: {
    getContent: function () {
      axios.get('/api/getTodoContent').then(response => {
        //console.log(response.data.data)
        this.todo = response.data.data
      })

    },
    getList: function () {
      axios.get('/api/getTodoTitle').then(response => {
        this.todoList = response.data.data
        console.log(this.todoList)
      })

    },
    addTitle: function () {
      axios.post('/api/addTodo', this.todoData).then(result => {
        if (result.status == 200) {
          console.log('등록!')
          this.getList()
        }
      }, errors => {
        console.log(errors)
      })
    },
    addTodo: function (id) {
      this.todoData.title_id = id
      axios.post('/api/addTodo', this.todoData).then(result => {
        if (result.status == 200) {
          console.log('등록!')
          this.getContent()
        }
      }, errors => {
        console.log(errors)
      })
    },
    change: function (id) {
      this.todoData.id = id
      axios.post('/api/done', this.todoData).then(result => {
        console.log(result)
        this.getContent()
      }, errors => {
        console.log(errors)
      })
    },
    deleteItem: function (id) {
      this.todoData.id = id
      axios.delete('/api/erase/item/' + this.todoData.id)
      this.getContent()
    },
    deleteTitle: function (id) {
      this.todoData.id = id
      axios.delete('/api/erase/title/' + this.todoData.id)
      this.getList()
    },
    editTitle: function (id, title) {
      this.todoData.id = id
      this.todoData.title = title
      axios.patch('/api/edit/title', this.todoData).then(result => {
      }, errors => {
        console.log(errors)
      })
    }
  }
})
