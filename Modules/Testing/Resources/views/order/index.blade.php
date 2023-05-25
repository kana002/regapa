@extends('testing::layouts.master', ['all_orders' => 'active bg-secondary rounded', 'type' => 'edit'])

@section('content')
<div class="container px-5 table-responsive">
	@if($testing_orders && count($testing_orders) > 0)
		<table class="table text-center table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">№</th>
					<th scope="col">{{ __('main.fio') }}</th>
					<th scope="col">{{ __('main.test_category') }}</th>
					<th scope="col">{{ __('main.test_date') }}</th>
					<th scope="col">{{ __('main.test_lang') }}</th>
					<th scope="col">{{ __('main.status') }}</th>
					<th scope="col">{{ __('main.reason') }}</th>
					<th scope="col">{{ __('main.date_created') }}</th>
					<th scope="col">{{ __('main.date_updated') }}</th>
					<th scope="col">{{ __('main.actions') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach($testing_orders as $order)
				<tr>
					<th scope="row">{{$order->test_gen}}</th>
					<td>{{$user->surname}} {{$user->name}} {{$user->middlename}}</td>
					<td>{{$order->test_category->name_ru ?? ''}}</td>
					<td>{{$order->desired_test_date ?? ''}}</td>
					<td>{{$order->lang->name_ru ?? ''}}</td>
					<td class="{{
						isset($order) && $order->test_status && $order->test_status->id == 0
						? 'bg-primary text-white'
						: ($order->test_status->id == 1 ? 'bg-success text-white' :
							($order->test_status->id == 2 ? 'bg-danger text-white' : 'bg-secondary text-white')
							)
					}}">{{$order->test_status->name_ru ?? ''}}</td>
					<td>{{$order->reason ?? ''}}</td>
					<td>{{$order->created_at ?? ''}}</td>
					<td>{{$order->updated_at ?? ''}}</td>
					<td class="d-flex justify-content-center hstack gap-2">
						@if($order->status_id == '0' || ($order->status_id == 2 && $order->reason != null))
							<a
								role="button"
								href="{{route('testing.edit_order.step_1', ['test_gen' => $order->test_gen])}}"
								class="btn btn-primary btn-sm"
								title="Редактировать"
							>
								<i class="fa-solid fa-pen"></i>
							</a>
							<form action="{{route('testing.delete_order', ['test_gen' => $order->test_gen])}}" method="post">
								@csrf
								<!-- Modal -->
								<div class="modal fade" id="deleteModal{{$order->test_gen}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Удаление заявки</h5>
												<button
													type="button"
													class="close btn btn-outline-primary"
													data-bs-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>Вы уверены, что хотите удалить заявку <strong>№{{$order->test_gen}}</strong>?</p>
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
							</form>
							<button
								type="submit"
								class="btn btn-danger btn-sm"
								title="Удалить"
								data-bs-target="#deleteModal{{$order->test_gen}}"
								data-bs-toggle="modal"
							>
								<i class="fa-solid fa-trash"></i>
							</button>
						@else
							<a
								role="button"
								href="{{'/testing/testing_order/'.$order->test_gen}}"
								class="btn btn-success btn-sm"
								title="Посмотреть"
							>
							<i class="fa-solid fa-eye"></i>
							</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
	<div class="bg-light vh-100 rounded d-flex align-items-center justify-content-center">
		<p class="text-muted text-center fs-5">{{ __('main.no_applications') }}</p>
	</div>
	@endif

</div>
@endsection
@section('js')
<script>
	function deleted()
	{
		alert('Заявка удалена.')
	}
</script>
@endsection