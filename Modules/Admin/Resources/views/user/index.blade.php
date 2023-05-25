@extends('admin::layouts.master', ['all_users' => 'active bg-secondary rounded'])

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
		@if(count($region)>0)
                
			@foreach($region as $key=>$user_reg)
				<tr>
					<th scope="row">{{$key+1}}</th>
					<td>{{$user_reg->surname}} {{$user_reg->name}} {{$user_reg->middlename}}</td>
					<th>{{$user_reg->email}}</th>
					<td class="d-flex justify-content-center hstack gap-2">
						<a
							role="button"
							href="{{route('admin.edit_users', $user_reg->id)}}"
							class="btn btn-primary"
							title="Редактировать"
						>
							<i class="fa-solid fa-pen"></i>
						</a>
						<form action="{{route('admin.destroy_users', $user_reg->id)}}" method="post">
							@csrf
							@method('delete')
							<!-- <a
								role="button"
								type="submit"
								href="{{route('testingadmin.destroy_users', $user->id)}}"
								class="btn btn-danger btn-sm"
								title="Удалить"
							>
								<i class="fa-solid fa-trash"></i>
							</a> -->
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
						</form>
					</td>
				</tr>
             @endforeach
			 @endif
		</tbody>
	</table>
</div>
@endsection


