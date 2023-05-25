@extends('admin::layouts.master', ['all_orders' => 'active bg-secondary rounded'])

@section('content')
<style>
	th, td {
		vertical-align: middle;
	}
	td {
		height: 90px;
	}
	td > a {
		height: fit-content;
	}
</style>
<h2 class="mb-5 text-center">Все заявки</h2>
<div class="container-fluid px-5 table-responsive">
	<table class="table text-center table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col" rowspan="2">№</th>
				<th scope="col" rowspan="2">ФИО</th>
				<th scope="col" rowspan="2">Название темы</th>
				<th scope="col" rowspan="2">Статус</th>
				<th scope="col" rowspan="2">Причина</th>
				<th scope="col" colspan="6">Файлы</th>
				<th scope="col" rowspan="2">Действия</th>
			</tr>
			<tr>
				<th scope="col">Удостоверение личности</th>
				<th scope="col">Документ об образовании</th>
				<th scope="col">Подписанная справка</th>
				<th scope="col">Сертификаты</th>
				<th scope="col">Чек об оплате (для самостоятельной оплаты)</th>
				<th scope="col">Сформированное заявление заявки</th>
			</tr>
		</thead>
		<tbody>
			@foreach($all_orders as $order)
			<tr>
				<th scope="row">{{$order->id}}</th>
				<td>{{$order->user->surname ?? ''}} {{$order->user->name ?? ''}} {{$order->user->middlename ?? ''}}</td>
				<td>{{$order->theme->tema_kz ?? ''}}</td>
				<td>{{$order->status->name_ru ?? ''}}</td>
				<td>{{$order->reason ?? ''}}</td>
				{{-- Файлы старт --}}
				<td>удост</td>
				<td>обр</td>
				<td>спр</td>
				<td>серт</td>
				<td>чек</td>
				<td>заявление</td>
				{{-- Файлы финиш --}}
				<td class="d-flex justify-content-center align-items-center gap-2">
						@if($order->status_id == 0)
							<a
								role="button"
								href="{{ $order->id}}"
								class="btn btn-primary btn-sm"
								title="На доработку"
								type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
							>
								На доработку
							</a>
                       <!-- Модальное окно -->

						<form action="{{route('admin.update_orders', $order->id)}}" method="post">
												@csrf
												@method('patch')
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Заголовок модального окна</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
										</div>
										<div class="modal-body">
										<div class="form-floating">
											
									<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"  name="reason"></textarea>
									<label for="floatingTextarea">Комментарии</label>
										</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<button type="submit" class="btn btn-primary">Сохранить и отправить</button>
										</div>
										</div>
									</div>
									</div>
							</form>
						

							<form action="{{route('admin.accept_orders', $order->id)}}" method="post">
								@csrf
								@method('patch')
								<button
									href="{{$order->id}}"
									type="submit"
									class="btn btn-success btn-sm"
									title="Принять"
								>
									Принять
								</button>
							</form>

							<form action="{{route('admin.update_orders', $order->id)}}" method="post">
								@csrf
								@method('patch')
								<button
									href="{{ $order->id}}"
									type="submit"
									class="btn btn-danger btn-sm"
									title="Отклонить"
								>
									Отклонить
								</button>
							</form>
						
							@endif
					
						<a
							role="button"
							href="{{route('admin.ready_order_template', $order->id)}}"
							class="btn btn-info btn-sm"
							title="Посмотреть"
						>
						Посмотреть
						</a>
						{{--<a
							role="button"
							href="{{route('admin.ready_order_template', $order->id)}}"
							class="btn btn-warning btn-sm"
							title="Файлы"
						>
						Файлы
						</a>--}}

				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>

		
@endsection

