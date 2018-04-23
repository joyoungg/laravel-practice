@extends('layout.default')

@section('content')
  <div data-controller="write">
    <div class="container py-5">
      <h3> 게시글 작성하기</h3>
    </div>
    <form @submit.prevent="submit">
      <div class="form-row">
        <div class="form-group col-6">
          <label for="title" class="col-form-label-sm">글제목</label>
          <input type="text" id="title" class="form-control" v-model="data.title">
        </div>
        <div class="form-group col-6">
          <label for="name" class="col-form-label-sm">작성자</label>
          <input type="text" id="name" class="form-control" v-model="data.name">
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
          <button class="btn btn-primary" :disable="submitted">등록하기</button>
        </div>
      </div>
    </form>
  </div>
  @if ($errors->has('name'))
    <div class="name">
            <span class="invalid-feedback">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
    </div>
  @elseif($errors->has('title'))
    <div class="title">
            <span class="invalid-feedback">
              <strong>{{ $errors->first('title') }}</strong>
            </span>
    </div>
  @else()
    <div class="content">
            <span class="invalid-feedback">
              <strong> content empty! </strong>
            </span>
    </div>
  @endif
@endsection
