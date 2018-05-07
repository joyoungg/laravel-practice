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
        dragstart: function (event) {
            event.target.style.opacity = '0.5'
            event.dataTransfer.effectAllowed = 'move'
            event.dataTransfer.setData("text/plain", event.target.id);
        },
        dragover: function (event) {
            event.preventDefault()
        },
        drop: function (event) {
            event.preventDefault()
            let data = event.dataTransfer.getData("text/plain")
            let dragged = document.getElementById(data)
            console.log(event.target.parentNode.parentNode)
            if (!data) {
                console.log('nothing!!')
            }
            else {
                console.log('data part')
                if (event.target.parentNode.parentNode.className == 'completezone' || 'todozone') {
                    event.target.style.background = ''
                    dragged.parentNode.removeChild(dragged)
                    event.target.parentNode.parentNode.insertAdjacentElement('afterend', dragged);
                }
            }
            if (dragged.parentNode.className != event.target.parentNode.id) {
                this.change(dragged.id)
            }

        },
        dragenter: function (event) {
            event.preventDefault()
            // highlight potential drop target when the draggable element enters it
            if (event.target.parentNode.parentNode.className == 'completezone' || 'todozone') {
                event.target.style.background = 'purple'
            }
        },
        dragleave: function (event) {
            event.preventDefault()
            if (event.target.parentNode.parentNode.className == 'completezone' || 'todozone') {
                event.target.style.background = "";
            }
        },
        allowDrop: function (event) {
            if (event.target.getAttribute('draggable') == 'true') {
                event.preventDefault()
            }
            else {
                event.dataTransfer.dropEffect = 'all'
            }
        }
    }
})
