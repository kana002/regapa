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
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<!-- Scripts -->
		<script
		src="https://code.jquery.com/jquery-3.6.4.js"
		integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
		crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
			.has-action {
				position: relative;
			}

			.has-action:before {
				width: 10px;
				height: 10px;
				border-radius: 50%;
				background-color: red;
				content: "";
				position: absolute;
				bottom: 0;
				left: 50%;
				margin-left: -5px;
			}
		</style>
    </head>
    <body class="antialiased font-sans text-gray-900 bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-md" style="background-color: #223A6D;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/testingadmin">
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
                            <a class="nav-link {{ $home ?? '' }}" target="_blank" aria-current="page" href="{{route('testingadmin.home')}}">{{ __('modules.main_page') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $all_orders ?? '' }}" target="_blank" href="{{route('testingadmin.all_orders')}}">{{ __('modules.all_orders') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $all_tests ?? '' }}" target="_blank" href="{{route('testingadmin.all_tests')}}">{{ __('modules.all_testings') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $all_groups ?? '' }}" target="_blank" href="{{route('testingadmin.all_groups')}}">{{ __('modules.groups') }}</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link {{ $all_users ?? '' }}" target="_blank" href="{{route('testingadmin.all_users')}}">{{ __('modules.users') }}</a>
                        </li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							{{$user->email}}
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
								<li>
									<a class="dropdown-item {{ $settings ?? '' }}" target="_blank" href="{{route('testingadmin.settings', $user->id)}}">{{ __('modules.settings') }}</a>
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
										{{ __('modules.log_out') }}
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
            <div class="container-fluid px-5 py-5 bg-white rounded">
            @yield('content')
            </div>
            @yield('scripts')
	</body>
</html>
