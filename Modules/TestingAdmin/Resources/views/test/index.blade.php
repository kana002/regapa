@extends('testingadmin::layouts.master', ['all_tests' => 'active bg-secondary rounded'])

@section('content')
<h2>Все тесты</h2>
<div class="row my-3">
    <div class="col-1 w-100">
        <a
            href="{{route('testingadmin.test.create')}}"
            role="button"
            class="btn btn-primary"
        >Создать</a>
    </div>
</div>
<div class="container px-5 table-responsive">
	<table class="table text-center table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">№</th>
				<th scope="col">Название</th>
				<th scope="col">Категория теста</th>
                <th scope="col">Язык теста</th>
				<th scope="col">Дата теста</th>
				<th scope="col">Действия</th>
			</tr>
		</thead>
		<tbody>
            @if(count($tests)>0)
                @foreach($tests as $key=>$test)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$test->test_name}}</td>
                        <td>{{$test->test_category->name_ru ?? ''}}</td>
                        <td>{{$test->lang->name_ru ?? ''}}</td>
                        <td>{{$test->test_date ?? ''}}</td>
                        <td class="d-flex justify-content-center hstack gap-2">
                                <a
                                    role="button"
                                    href="{{route('testingadmin.test.edit', $test->id)}}"
                                    class="btn btn-primary btn-sm"
                                    title="Редактировать"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="{{route('testingadmin.test.destroy', ['id' => $test->id])}}" method="post">
                                    @csrf
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal_{{$key+1}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Удаление теста</h5>
                                                    <button
                                                        type="button"
                                                        class="close btn btn-outline-primary"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Вы уверены, что хотите удалить тест<br/><strong>№{{$key+1}} {{$test->test_name}}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-primary"
                                                        data-bs-dismiss="modal"
                                                        id="close-modal">Нет</button>
                                                    <button
                                                        type="submit"
                                                        class="btn btn-outline-danger"
                                                        id="delete-yes"
                                                        onclick="console.log('yes')">Да</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm"
                                        title="Удалить"
                                        data-bs-target="#deleteModal_{{$key+1}}"
								        data-bs-toggle="modal"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            @endif
		</tbody>
	</table>
</div>
@endsection