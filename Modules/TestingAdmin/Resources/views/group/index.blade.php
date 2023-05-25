@extends('testingadmin::layouts.master', ['all_groups' => 'active bg-secondary rounded'])

@section('content')
<h2>Все группы</h2>
<div class="row my-3">
    <div class="col-1">
        <a
            href="{{route('testingadmin.group.create')}}"
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
				<th scope="col">Название группы</th>
				<th scope="col">Название теста</th>
                <th scope="col">Количество заявок в группе</th>
				<th scope="col">Действия</th>
			</tr>
		</thead>
		<tbody>
            @if(count($groups)>0)
                @foreach($groups as $key=>$group)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$group->group_name}}</td>
                        <td>
                            @if($group->test->test_name)
                                <a
                                    class="text-decoration-none"
                                    target="_blade"
                                    title="Перейти к тесту"
                                    href="{{route('testingadmin.test.edit', $group->test->id)}}">
                                    {{$group->test->test_name ?? ''}}
                                </a>
                            @endif
                        </td>
                        <td>{{$group->order->count() ?? ''}}</td>
                        <td class="d-flex justify-content-center hstack gap-2">
                                <a
                                    role="button"
                                    href="{{route('testingadmin.group.edit', $group->id)}}"
                                    class="btn btn-primary btn-sm"
                                    title="Редактировать"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{route('testingadmin.group.delete', $group->id)}}" method="post">
                                    @csrf
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal_{{$key+1}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Удаление группы</h5>
                                                    <button
                                                        type="button"
                                                        class="close btn btn-outline-primary"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Вы уверены, что хотите удалить группу<br/><strong>№{{$key+1}} {{$group->group_name}}</strong>?</p>
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