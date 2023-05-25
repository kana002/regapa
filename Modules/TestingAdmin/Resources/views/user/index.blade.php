@extends('testingadmin::layouts.master', ['all_users' => 'active bg-secondary rounded'])

@section('content')
<h2 class="mb-3">Все пользователи</h2>
<div class="row my-3">
    <div class="col d-flex justify-content-end">
        <!-- <a
            href="{{route('testingadmin.create_users')}}"
            role="button"
            class="btn btn-primary"
        >Создать</a> -->
    </div>
</div>
<div class="container px-5 table-responsive">
	<table class="table text-center table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">№</th>
				<th scope="col">ФИО</th>
                <th scope="col">Email</th>
				<th scope="col">Действия</th>
                </tr>
		</thead>
		<tbody>
			@foreach($region as $user_reg)
				<tr>
					<th scope="row">{{$user_reg->id}}</th>
					<td>{{$user_reg->surname}} {{$user_reg->name}} {{$user_reg->middlename}}</td>
					<th>{{$user_reg->email}}</th>
					<td class="d-flex justify-content-center hstack gap-2">
						<a
							role="button"
							href="{{route('testingadmin.edit_users', $user_reg->id)}}"
							class="btn btn-sm btn-primary"
							title="Редактировать"
						>
							<i class="fa-solid fa-pen"></i>
						</a>
						<form action="{{route('testingadmin.destroy_users', $user_reg->id)}}" method="post">
							@csrf
							@method('delete')
							<!-- Modal -->
							<div class="modal fade" id="deleteModal_{{$user_reg->id}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Удаление пользователя</h5>
											<button
												type="button"
												class="close btn btn-outline-primary"
												data-bs-dismiss="modal"
												aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Вы уверены, что хотите удалить пользователя<br/><strong>№{{$user_reg->id}} {{$user_reg->surname}} {{$user_reg->name}} {{$user_reg->middlename}}</strong>?</p>
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
								data-bs-target="#deleteModal_{{$user_reg->id}}"
								data-bs-toggle="modal"
							>
								<i class="fa-solid fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
             @endforeach
		</tbody>
	</table>
</div>
@endsection


