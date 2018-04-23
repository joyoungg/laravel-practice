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
    <ul v-for="(comment, index) in coList">
      <li>
        <div>
          <span v-if="!(comment.id == comment.comment_id)">ㄴ</span>
          @{{ comment.id }}
          @{{ comment.content }}
          @{{ comment.name }}
        </div>
        <div class="btn-group pull-right"
             style="font-size: 12px; line-height: 1;">
          <button type="button"
                  class="btn-link dropdown-toggle"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false">댓글달기<span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li>
              <div>
                <form @submit.prevent="mkComment(comment.id)">
                  <div class="form-group">
                    <input type="hidden" id="my" value="comment.id" v-model="addComment.comment_id">
                    <label for="name" class="col-form-label">이름</label>
                    <input class="form-control" id="name" v-model="addComment.name">
                    <label for="content" class="col-form-label">내용</label>
                    <input class="form-control" id="content" v-model="addComment.content">
                    <button> 등록 </button>
                  </div>
                </form>
              </div>
            </li>
          </ul>
        </div>
          {{--<div id="add-reply" style="display: none">--}}
            {{--<div>--}}
              {{--<form @submit.prevent="mkComment(index)">--}}
                {{--<div class="form-group">--}}
                  {{--<input type="hidden" id="comment_id" v-model="addComment.comment_id">--}}
                  {{--<label for="name" class="col-form-label">이름</label>--}}
                  {{--<input class="form-control" id="name" v-model="addComment.name">--}}
                  {{--<label for="content" class="col-form-label">내용</label>--}}
                  {{--<input class="form-control" id="content" v-model="addComment.content">--}}
                  {{--<button> 등록 </button>--}}
                {{--</div>--}}
              {{--</form>--}}
            {{--</div>--}}
          {{--</div>--}}
      </li>
    </ul>
    <br><br><br><br>

    {{--댓글남기기 --}}
    <div class="row">
      <div class="col-2"></div>
      <div class="col-10">
        <form @submit.prevent="mkComment()">
          <table>
            <tbody>
            <tr>
              <th scope="row">
                <label for="nickname">이름</label>
              </th>
              <td>
                <input type="text" name="nickname" id="nickname" v-model="addComment.name">
              </td>
            </tr>
            <tr>
              <th scope="row">
                <label for="coContent">내용</label>
              </th>
              <td>
                <textarea name="coContent" id="coContent" cols="80" rows="5" v-model="addComment.content"></textarea>
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
