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
      console.log('mounted!')
    })
  },
  methods: {
    getContent: function () {
      axios.get('/api/getTodoContent').then(response => {
        this.todo = response.data.data
      })
    },
    getList: function () {
      axios.get('/api/getTodoTitle').then(response => {
        this.todoList = response.data.data
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
    },
    drag: function () {
      console.log('drag')
    },
    dragstart: function (event) {
      event.target.style.opacity = .5
    },
    dragover: function (event) {
      //prevent default to allow drop
      event.preventDefault()
      console.log('drag over')
    },
    drop: function (event) {
      event.preventDefault()
      console.log(123)
      // move dragged elem to the selected drop target
      if (event.target.className == 'dropzone') {
        event.target.style.background = ''
        dragged.parentNode.removeChild(dragged)
        event.target.appendChild(dragged)
      }
      var data = event.dataTransfer.getData('Text')
      console.log(data)

    },
    dragend: function (event) {
      // reset the transparency
      event.target.style.opacity = ''
      console.log('eeeeeeeeeee')
    },
    dragenter: function () {
      // highlight potential drop target when the draggable element enters it
      if (event.target.className == 'dropzone') {
        event.target.style.background = 'purple'
      }
      console.log('drag enter')
    }
  }
})
