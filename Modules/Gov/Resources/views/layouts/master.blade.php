<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

		<!-- Styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
		<!-- Scripts -->
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>
		<style>
			body {
				font-family: 'Nunito', sans-serif;
				background: #dee2e6;
			}
			.nav-link:hover .nav-link:focus {
				color: white;
			}
		</style>
	</head>
	<body class="antialiased font-sans text-gray-900">
		<nav class="navbar navbar-expand-lg navbar-dark shadow-md position-fixed w-100" style="background-color: #223A6D;">
			<div class="container-fluid">
				<a class="navbar-brand" href="/testing">
					<img style="height: 60px" src="{{asset('images/logo.png')}}" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end me-2" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item me-5 d-flex align-items-center nav-link gap-2">
							<i class="fa-solid fa-location-dot"></i>
							<span class="">
								{{$user->region->name_ru}}
							</span>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ $home ?? '' }}" target="_blank" aria-current="page" href="{{route('gov.home')}}">Главная</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ $new_order ?? '' }}" target="_blank" href="{{route('gov.new_order.step_1')}}">Новая завка</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ $all_orders ?? '' }}" target="_blank" href="{{route('gov.all_orders')}}">Все заявки</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							{{$user->email}}
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
								<li>
									<a class="dropdown-item {{ $settings ?? '' }}" target="_blank" href="{{route('gov.settings')}}">Настройки</a>
								</li>
								<li><hr class="dropdown-divider"></li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<a
											href="{{route('logout')}}"
											class="dropdown-item"
											onclick="event.preventDefault();
													this.closest('form').submit();"
											tabindex="-1"
										>
											Выйти
										</a>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="d-flex align-items-center justify-content-end">
					<div id="langs">
						@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
							<a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
								class="btn btn-sm btn-outline-light @if(app()->getLocale()==$localeCode) active @endif"
								role="button">{{$localeCode}}</a>
						@endforeach
					</div>
				</div>
			</div>
		</nav>
		<div class="container-fluid" style="padding-top: 86px;">
			<div class="row flex-nowrap">
				<div class="{{isset($sidebar) && $sidebar == true ? 'visible' : 'invisible'}} col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light border border-right shadow min-vh-100 position-fixed">
					<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
						<a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
							<span class="fs-5 d-none d-sm-inline">Этапы регистрации</span>
						</a>
						<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
							<li class="nav-item w-100 border-bottom">
								<a href="{{Route::is('gov.edit_order.*')
										? route('gov.edit_order.step_1', ['gen'=>request()->session()->get('cur_gen')])
										: route('gov.new_order.step_1')}}"
									class="nav-link align-middle px-0">
									<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Шаг 1 - Личные данные</span>
								</a>
							</li>
							<li class="nav-item w-100 border-bottom">
							<a href="{{Route::is('gov.edit_order.*')
										? route('gov.edit_order.step_2', ['gen'=>request()->session()->get('cur_gen')])
										: route('gov.new_order.step_2')}}"
									class="nav-link align-middle px-0">
									<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Шаг 2 - Об обучении</span>
								</a>
							</li>
							<li class="nav-item w-100 border-bottom">
								<a href="{{Route::is('gov.edit_order.*')
										? route('gov.edit_order.step_3', ['gen'=>request()->session()->get('cur_gen')])
										: route('gov.new_order.step_3')}}"
									class="nav-link align-middle px-0">
									<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Шаг 3 - Контактные данные</span>
								</a>
							</li>
							<li class="nav-item w-100">
								<a href="{{request()->session()->get('cur_gen') != null
										? route('gov.order.step_4', ['gen'=>request()->session()->get('cur_gen')])
										: ''}}"
									class="nav-link align-middle px-0">
									<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Шаг 4 - Выгрузка готовой заявки</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col py-5 bg-white min-vh-100" style="{{isset($sidebar) && $sidebar == true ? 'padding-left: 400px; padding-right: 100px;' : ''}}">
					<div class="row bg-white">
						@yield('content')
						@yield('scripts')
					</div>
				</div>
		</div>

	</body>
</html>
