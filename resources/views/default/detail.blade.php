@extends('layout.default')

@section('content')
  <div data-controller="detail">
    <div class="container py-5">
      <div class="row">
        <div class="col-6"><h3> 게시글 확인</h3></div>
        <div class="col-6 text-right">
          <button @click="modify">수정</button>
        </div>
      </div>
    </div>
    <input id="id" type="hidden" value="{{ $id }}">
    <table>
      <tbody>
      <tr>
        <th scope="row">
          <p>번호</p>
        </th>
        <td>
          @{{ data.id }}
        </td>
      </tr>
      <tr>
        <th scope="row">
          <p>작성자</p>
        </th>
        <td>
          @{{ data.name }}
        </td>
      </tr>
      <tr>
        <th scope="row">
          <p>제목</p>
        </th>
        <td>
          @{{ data.title }}
        </td>
      </tr>
      <tr>
        <th scope="row">
          <p>내용</p>
        </th>
        <td>
          @{{ data.content}}
        </td>
      </tr>
      </tbody>
    </table>
    <br><br><br><br><br><br>
    <table>
      <thead>
      <tr>
        <td>작성자</td>
        <td>내용</td>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(comment, index) in coList">
        <td  v-if="comment.own == coData.own">@{{ comment.coName }}</td>
        <td  v-if="comment.own == coData.own">@{{ comment.coContent }}</td>
      </tr>
      </tbody>
    </table>
    <br><br><br><br>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-10">
        <form  @submit.prevent="comment">
          <table>
            <tbody>
            <tr>
              <th scope="row">
                <label for="nickname">이름</label>
              </th>
              <td>
                <input type="text" name="nickname" id="nickname" v-model="coData.coName">
              </td>
            </tr>
            <tr>
              <th scope="row">
                <label for="coContent">내용</label>
              </th>
              <td>
                <textarea name="coContent" id="coContent" cols="80" rows="5" v-model="coData.coContent"></textarea>
              </td>
            </tr>
            </tbody>
          </table>
            <button class="">코멘트 작성</button>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection
