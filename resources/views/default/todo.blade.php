@extends('layout.default')

@section('content')
  <div data-controller="todo">
    <div class="input-group mb-3">
      <label for=""></label>
      <input type="text" class="form-control" placeholder="할 일을 입력해주세요" aria-label="todo" v-model="todoData.item">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" @click="addTodo">추가</button>
      </div>
    </div>
    <div v-for="(item, index) in todoList">
      <div v-if="item.status==0">
        @{{ item.content }}
        <span class="text-right">
          <button type="button" style="border:none; font-size:5px" @click="change(item.id)">완료</button>
          <button type="button" style="border:none; font-size:5px" @click="erase(item.id)">삭제</button>
          </span>
      </div>
    </div>
    {{--체크한 리스트 show--}}
    <br><br><br>

    <div v-for="(item, index) in todoList">
      <div v-if="item.status==1" v-if="!item.deleted_at">
        @{{ item.content }}
        <span class="text-right">
          <button type="button" style="border:none; font-size:5px" @click="change(item.id)">추가</button>
          <button type="button" style="border:none; font-size:5px" @click="erase(item.id)">삭제</button>
          </span>
      </div>
    </div>

  </div>
@endsection
