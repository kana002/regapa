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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
			body {
				font-family: 'Nunito', sans-serif;
				background: #223A6D;
			}
		</style>
    </head>
    <body class="antialiased font-sans text-gray-900">
        <div class="container pt-5">
            <div class="row text-center pb-5">
                <div class="col-8 d-flex justify-content-end">
                    <img src="{{asset ('images/logo.png')}}" alt="">
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <div class="">
                        <a
                        class="btn btn-sm btn-outline-light"
                        role="button"
                        href="/kz">kz</a>
                        <a
                        class="btn btn-sm btn-outline-light"
                        role="button"
                        href="/ru">ru</a>
                        <a
                        class="btn btn-sm btn-outline-light"
                        role="button"
                        href="/en">en</a>
                    </div>
                </div>
            </div>
            <div class="row py-5 bg-white rounded">
                <div class="hstack justify-content-center gap-3">
                        <a class="col-2 btn btn-outline-primary text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Войти') }}
                        </a>
                        <a class="col-2 btn btn-outline-primary text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Регистрация') }}
                        </a>
                </div>
                {{ $slot }}
            </div>
        </div>
	</body>
</html>
