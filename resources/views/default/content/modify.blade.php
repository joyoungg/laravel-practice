@extends('layout.default')

@section('content')
  <div data-controller="modify">
    <div class="container py-5">
      <h3> 게시글 수정</h3>
    </div>
    <input id="id" type="hidden" value="{{ $id }}">
    <form @submit.prevent="submit">
      <div class="form-row">
        <div class="form-group col-3">
          <label for="title" class="col-form-label-sm">글번호</label>
          <input type="text" id="title" class="form-control" v-model="data.id" disabled>
        </div>
        <div class="form-group col-3">
          <label for="title" class="col-form-label-sm">글제목</label>
          <input type="text" id="title" class="form-control" v-model="data.title">
        </div>
        <div class="form-group col-6">
          <label for="name" class="col-form-label-sm">작성자</label>
          <input type="text" id="name" class="form-control" v-model="data.name" disabled>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-12">
          <label for="content" class="col-form-label-sm">내용</label>
          <textarea id="content" rows="8" cols="100" class="form-control" v-model="data.content"></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-12 text-center">
          <button class="btn btn-primary" :disable="submitted">수정하기</button>
        </div>
      </div>
    </form>

  </div>
@endsection
