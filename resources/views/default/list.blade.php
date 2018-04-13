@extends('layout.default')

@section('content')
  <div data-controller="list">
    <div class="container py-5">
      <h3> 게시글 확인</h3>
    </div>
    <table class="table table-hover">
      <thead>
      <tr>
        <th class="py-3">번호</th>
        <th class="py-3">작성자</th>
        <th class="py-3">제목</th>
        <th class="py-3">내용</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(content, index) in data" @click="view(content.id)">
        <th class="py-3">@{{ content.id }}</th>
        <th class="py-3">@{{ content.name }}</th>
        <th class="py-3">@{{ content.title }}</th>
        <th class="py-3">@{{ content.content }}</th>
      </tr>
      </tbody>
    </table>

  </div>
@endsection
