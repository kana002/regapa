@extends('tik::layouts.master', ['all_orders' => 'active bg-secondary rounded', 'type' => 'edit'])

@section('content')
<div class="container px-5 table-responsive">
    <h2 class="pb-4">Все заявки</h2>
	<table class="table text-center table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">№</th>
				<th scope="col">ФИО</th>
				<th scope="col">Тема</th>
				<th scope="col">Статус</th>
				<th scope="col">Причина</th>
				<th scope="col">Действия</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<th scope="row">{{$order->gen}}</th>
				<td>{{$user->surname}} {{$user->name}} {{$user->middlename}}</td>
				<td>{{$order->theme->tema_kz ?? ''}}</td>
				<td>{{$order->status->name_ru ?? ''}}</td>
				<td>{{$order->reason ?? ''}}</td>
				<td class="d-flex justify-content-center hstack gap-2">
					@if($order->status_id == '0')
						<a
							role="button"
							href="{{route('tik.edit_order.step_1', ['gen' => $order->gen])}}"
							class="btn btn-primary btn-sm"
							title="Редактировать"
						>
							<i class="fa-solid fa-pen"></i>
						</a>
					@endif
					<form action="{{route('tik.delete_order', ['gen' => $order->gen])}}" method="post">
						@csrf
						<button
							type="submit"
							class="btn btn-danger btn-sm"
							title="Удалить"
						>
							<i class="fa-solid fa-trash"></i>
						</button>
					</form>
					@if($order->status_id == '11')
						{{--<a
							role="button"
							href="{{route('tik.download_ready_order', ['gen' => $order->gen])}}"
							class="btn btn-success btn-sm"
							title="Посмотреть"
							target="_blank"
						>
						<i class="fa-solid fa-eye"></i>
						</a>--}}
						<form action="{{route('tik.ready_order', ['gen' => $order->gen])}}" method="post">
							@csrf
							<button
								type="submit"
								class="btn btn-success btn-sm"
								title="Посмотреть"
							>
								<i class="fa-solid fa-eye"></i>
							</button>
						</form>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection