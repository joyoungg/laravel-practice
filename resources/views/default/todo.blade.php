@extends('layout.default')

@section('content')
	<div data-controller="todo">

		<div class="input-group mb-3">
			<input type="text" class="form-control" placeholder="할 일을 입력해주세요" aria-label="todo"
						 v-model="todoData.title">
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
					<input type="text" v-model="item.title" style="border: 0px"
								 @keyup.enter="editTitle(item.id, item.title)">
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
								<button type="button" style="border:none; font-size:5px" @click="deleteTitle(item.id)">
									삭제
								</button>
							</li>
						</ul>
					</div>
				</td>

				<td class="todozone" v-on:dragover="allowDrop($event)">
					{{--투두 목록--}}
					<div v-for="(data, index) in todo" v-if="(item.id == data.title_id&&data.status == 0)" draggable="true"							 v-bind:id="data.id"
							 v-on:dragstart="dragstart($event)"
							 v-on:dragover="dragover($event)"
							 v-on:dragleave="dragleave($event)"
							 v-on:dragenter="dragenter($event)"
							 v-on:drop="drop($event)">
						<div id="todozone">
							<input type="text" v-model="data.content" style="border: 0px"
										 @keyup.enter="editText(data.id, data.content)">
							{{--@{{ data.content }}--}}
							<button type="button" style="border:none; font-size:5px" @click="change(data.id)">완료</button>
						</div>
					</div>
				</td>

				{{--완료 목록--}}
				<td class="completezone" v-on:dragover="allowDrop($event)">
					<div v-for="(data, index) in todo" v-if="(item.id == data.title_id&&data.status == 1)" draggable="true"
							 v-bind:id="data.id"
							 v-on:dragstart="dragstart($event)"
							 v-on:dragover="dragover($event)"
							 v-on:dragleave="dragleave($event)"
							 v-on:dragenter="dragenter($event)"
							 v-on:drop="drop($event)">
						<div id="completezone" >
							@{{ data.content }}
							<button type="button" style="border:none; font-size:5px" @click="deleteItem(data.id)">삭제</button>
						</div>
					</div>
				</td>

			</tr>
			</tbody>
		</table>
	</div>



@endsection