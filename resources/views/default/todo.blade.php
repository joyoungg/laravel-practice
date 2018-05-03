@extends('layout.default')

@section('content')
  <div data-controller="todo">

    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="할 일을 입력해주세요" aria-label="todo" v-model="todoData.title">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" @click="addTitle">추가</button>
      </div>
    </div>

    <table class="table">
      <thead>
      <tr>
        <th>title</th>
        <th>todo</th>
        <th>done</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(item, index) in todoList">
        <td>
          {{--<span>@{{ item.title }}</span>--}}
          <input type="text" v-model="item.title" style="border: 0px" @keyup.enter="editTitle(item.id, item.title)">
          {{--버튼--}}
          <div class="btn-group pull-right"
               style="font-size: 12px; line-height: 1;">
            <button type="button"
                    class="btn-link dropdown-toggle"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">add<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li>
                <div>
                  <form @submit.prevent="addTodo(item.id)">
                    <div class="form-group">
                      <label for="content" class="col-form-label">내용</label>
                      <span>@{{ item.id }}</span>
                      <input class="form-control" id="content" v-model="todoData.content">
                      <button> 등록</button>
                    </div>
                  </form>
                </div>
              </li>
              <li>
                <button type="button" style="border:none; font-size:5px" @click="deleteTitle(item.id)">삭제</button>
              </li>
            </ul>
          </div>
        </td>

        <td>
          <div v-for="(data, index) in todo" v-if="(item.id == data.title_id&&data.status == 0)">
            <span>
               <input type="text" v-model="data.content" style="border: 0px" @keyup.enter="editText(data.id, data.content)">
                {{--@{{ data.content }}--}}
            </span>
            <span>
              <button type="button" style="border:none; font-size:5px" @click="change(data.id)">완료</button>
            </span>
          </div>
        </td>

        <td>
          <div v-for="(data, index) in todo" v-if="(item.id == data.title_id&&data.status == 1)">
            <span>
                @{{ data.content }}
            </span>
            <span>
              <button type="button" style="border:none; font-size:5px" @click="deleteItem(data.id)">삭제</button>
            </span>
          </div>
        </td>

      </tr>
      </tbody>
    </table>

    {{--<div v-for="(item, index) in todoList">--}}
    {{--<div>--}}
    {{--@{{ item.title }}--}}
    {{--<div class="btn-group pull-right"--}}
    {{--style="font-size: 12px; line-height: 1;">--}}
    {{--<button type="button"--}}
    {{--class="btn-link dropdown-toggle"--}}
    {{--data-toggle="dropdown"--}}
    {{--aria-haspopup="true"--}}
    {{--aria-expanded="false">add<span class="caret"></span>--}}
    {{--</button>--}}
    {{--<ul class="dropdown-menu">--}}
    {{--<li>--}}
    {{--<div>--}}
    {{--<form @submit="addTodo(item.id)">--}}
    {{--<div class="form-group">--}}
    {{--<input type="hidden" value="item.title" v-model="todoData.title">--}}
    {{--<label for="content" class="col-form-label">내용</label>--}}
    {{--<input class="form-control" id="content" v-model="todoData.content">--}}
    {{--<button> 등록 </button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<span class="text-right">--}}
    {{--<button type="button" style="border:none; font-size:5px" @click="change(item.id)">완료</button>--}}
    {{--<button type="button" style="border:none; font-size:5px" @click="erase(item.id)">삭제</button>--}}
    {{--</span>--}}
  </div>



@endsection