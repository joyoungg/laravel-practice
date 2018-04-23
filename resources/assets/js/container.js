(function () {
  let container = {
    'write': './default/write',
    'list': './default/list',
    'detail': './default/detail',
    'modify' : './default/modify',
    'default' : './default/default',
    'todo' : './default/todo'
  }

  $(document).ready(function () {
    let controller = container[document.getElementById('app').firstElementChild.getAttribute('data-controller')]

    if (controller !== undefined) {
      require('' + controller)
    } else {
      new Vue({el: '#app'})
    }
  })
})()

