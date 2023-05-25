@extends('testingadmin::layouts.master', ['all_orders' => 'active bg-secondary rounded'])

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
	<table class="table text-center table-bordered table-hover" id="example">
		<thead>
			<tr>
				<th scope="col" rowspan="2">№</th>
				<th scope="col" rowspan="2">ФИО</th>
				<th scope="col" rowspan="2">Категория теста</th>
				<th scope="col" rowspan="2">Выбранная дата теста</th>
				<th scope="col" rowspan="2">Язык теста</th>
				<th scope="col" rowspan="2">Статус</th>
				<th scope="col" rowspan="2">Причина</th>
				<th scope="col" colspan="6">Файлы</th>
				<th scope="col" rowspan="2">Дата создания</th>
				<th scope="col" rowspan="2">Дата обновления</th>
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
				<th scope="row">{{$order->test_gen}}</th>
				<td>{{$order->user->surname ?? ''}} {{$order->user->name ?? ''}} {{$order->user->middlename ?? ''}}</td>
				<td>
					<?php
						$className = null;
						if (isset($order) && isset($order->test_category->name_ru))
						{
							if($order->test_category->name_ru == 'Принят') $className = 'text-success';
							if($order->test_category->name_ru == 'Отказано') $className = 'text-danger';
							if($order->test_category->name_ru == 'В обработке') $className = 'text-primary';
						}
					?>
					<span class="{{$className ?? ''}}">
						{{$order->test_category->name_ru ?? ''}}
					</span>
				</td>
				<td>{{$order->desired_test_date ?? ''}}</td>
				<td>{{$order->lang->name_ru ?? ''}}</td>
				<td class="{{
					isset($order) && $order->test_status && $order->test_status->id == 0
					? 'bg-primary text-white'
					: ($order->test_status->id == 1 ? 'bg-success text-white' :
						($order->test_status->id == 2 ? 'bg-danger text-white' : 'bg-secondary text-white')
						)
				}}">{{$order->test_status->name_ru ?? ''}}</td>
				<td>
					<textarea readonly>{{$order->reason ?? ''}}</textarea>
				</td>
				{{-- Файлы старт --}}

				<td>
					@if(isset($order->ready_order->udost) && $order->ready_order->udost != null)
					<p class="pt-2 m-0">
						<a class="text-decoration-none" href="{{route('testingadmin.download_order_udost', ['id' => $order->id])}}"
						download>скачать{{substr($order->ready_order->udost, -5, strrpos($order->ready_order->udost, '/') + 1) ?? 'Файл'}}</a>
						</p>
						@endif
					</td>

				<td>
					@if(isset($order->ready_order->education) && $order->ready_order->education != null)
					<p class="pt-2 m-0">
					<a class="text-decoration-none" href="{{route('testingadmin.download_order_education', ['id' => $order->id])}}"
					download >скачать</i>{{substr($order->ready_order->education, -5, strrpos($order->ready_order->education, '/') + 1) ?? 'Файл'}}</a>
						</p>
						@endif</td>

				<td>
					@if(isset($order->ready_order->exp_spravka_signed) && $order->ready_order->exp_spravka_signed != null)
					<p class="pt-2 m-0">
					<a class="text-decoration-none" href="{{route('testingadmin.download_order_exp_spravka', ['id' => $order->id])}}"
					download>скачать.{{substr($order->ready_order->exp_spravka_signed, -4, strrpos($order->ready_order->exp_spravka_signed, '/') + 1) ?? 'Файл'}}</a>
						</p>
						@endif</td>
				<td>
					@if(isset($order->ready_cert->certificate) && $order->ready_cert->certificate != null)
					<p class="pt-2 m-0">
						<a class="text-decoration-none" href="{{route('testingadmin.download_order_cert', ['id' => $order->id])}}"
							>скачать{{substr($order->ready_cert->certificate, -5, strrpos($order->ready_cert->certificate, '/') + 1) ?? 'Файл'}}</a>

							</p>
						@endif</td>
				<td>
						@if(isset($order->ready_order->payment_receipt) && $order->ready_order->payment_receipt != null)
					<p class="pt-2 m-0">
					<a class="text-decoration-none" href="{{route('testingadmin.download_order_payment', ['id' => $order->id])}}"
							>скачать{{substr($order->ready_order->payment_receipt, -5, strrpos($order->ready_order->payment_receipt, '/') + 1) ?? 'Файл'}}</a>

							</p>
						@endif</td>
						<td>
						@if(isset($order->ready_order->ready_order) && $order->ready_order->ready_order != null)
					<p class="pt-2 m-0">
					<a class="text-decoration-none" href="{{route('testingadmin.download_ready_order', ['id' => $order->id])}}"
							>скачать{{substr($order->ready_order->ready_order, -4, strrpos($order->ready_order->ready_order, '/') + 1) ?? 'Файл'}}</a>

							</p>
						@endif
				</td>
				{{-- Файлы финиш --}}
				<td>
					{{$order->created_at ?? ''}}
				</td>
				<td>
					{{$order->updated_at ?? ''}}
				</td>
				<td class="d-flex justify-content-center align-items-center gap-2">
						@if($order->status_id == 12)
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

						<form action="{{route('testingadmin.update_orders', $order->id)}}" method="post">
										@csrf
										@method('patch')
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Комментарии</h5>
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


						<form action="{{route('testingadmin.accept_orders', $order->id)}}" method="post">
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

						<form action="{{route('testingadmin.update_orders', $order->id)}}" method="post">
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
						@if(isset($order->ready_order->ready_order) && $order->ready_order->ready_order != null)
							<a
								role="button"
								href="{{route('testingadmin.ready_order_template', $order->id)}}"
								class="btn btn-info btn-sm"
								title="Посмотреть"
							>
							Посмотреть
							</a>
						@endif
						<form action="{{route('testingadmin.delete_order', $order->id)}}" method="post">
							@csrf
							@method('patch')
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
								href="{{ $order->id}}"
								type="submit"
								class="btn btn-secondary btn-sm"
								data-bs-target="#deleteModal{{$order->test_gen}}"
								data-bs-toggle="modal"
								title="Удалить"
							>
							Удалить
							</button>
						</form>
						{{--<a
							role="button"
							href="{{route('testingadmin.ready_order_template', $order->id)}}"
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
@section('scripts')
<script>

</script>
@endsection

