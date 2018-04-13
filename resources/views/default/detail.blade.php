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
        <td>댓글번호</td>
        <td>작성자</td>
        <td>내용</td>
        <td></td>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(comment, index) in coList" v-if="comment.own == coData.own" @click="click(comment.id)">
        <td>@{{ comment.id }}</td>
        <td>@{{ comment.coContent }}</td>
        <td>@{{ comment.coName }}</td>
        <td></td>
        {{--<form>--}}
        {{--<td>--}}
        {{--<input type="text" class="" name="recoName" id="recoName" v-model="recoData.recoName">--}}
        {{--<input type="text" class="" name="recoContent" id="recoContent" v-model="recoData.recoContent">--}}
        {{--<button class="" @click="submit">re</button>--}}
        {{--</td>--}}
        {{--</form>--}}
      </tr>
      </tbody>
    </table>
    <br><br><br><br>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-10">
        <form @submit.prevent="comment">
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

  <div id="myModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">댓글 입력</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="recomment()">
          <div class="form-group">
            <label for="recoName" class="col-form-label">이름</label>
            <input class="form-control" id="recoName" v-model="recoData.recoName">
            <label for="recoContent" class="col-form-label">내용</label>
            <input class="form-control" id="recoContent" v-model="recoData.recoContent">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" @click="" data-dismiss="modal">등록</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">취소</button>
      </div>
    </div>
  </div>
@endsection