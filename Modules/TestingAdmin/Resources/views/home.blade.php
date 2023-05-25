@extends('testingadmin::layouts.master', ['home' => 'active bg-secondary rounded'])

@section('content')

<div class="container-fluid p-5">
    <div class="col pb-5">
        <h1>Добро пожаловать, {{$user->name}}</h1>
        <p>
            Профиль: Тестирование (Администратор)
        </p>
    </div>
    <div class="col d-flex flex-row flex-wrap justify-content-center text-center mb-5 mt-5 gap-5">
        <div class="col-3 d-flex">
            <a class="shadow p-5 btn btn-lg btn-success flex-fill" target="_blank" href="{{route('testingadmin.all_groups')}}">
                Группы
            </a>
        </div>
        <div class="col-3 d-flex">
            <a class="shadow p-5 btn btn-lg btn-info flex-fill" target="_blank" href="{{route('testingadmin.all_orders')}}">
                Заявки
            </a>
        </div>
    </div>
    <div class="col d-flex flex-row flex-wrap justify-content-center text-center mb-5 mt-5 gap-5">
        <div class="col-3 d-flex">
            <a class="shadow p-5 btn btn-lg btn-secondary flex-fill" target="_blank" href="{{route('testingadmin.all_tests')}}">
                Тесты
            </a>
        </div>
        <div class="col-3 d-flex">
            <a class="shadow p-5 btn btn-lg btn-light flex-fill" target="_blank" href="{{route('testingadmin.all_users')}}">
                Пользователи
            </a>
        </div>
    </div>
    {{--<div class="col d-flex flex-row flex-wrap justify-content-center text-center mb-3 mt-3 gap-5">
        <div class="col-3 d-flex">
            <a class="shadow p-5 btn btn-lg btn-warning flex-fill" target="_blank" href="{{route('testingadmin.settings')}}">
                Настройки аккаунта
            </a>
        </div>
        <div class="col-3 d-flex">
            <form method="POST" action="{{ route('logout') }}" class="shadow p-5 btn btn-lg btn-danger flex-fill">
                @csrf
                <a
                    href="{{route('logout')}}"
                    class="text-decoration-none text-white"
                    onclick="event.preventDefault();
                            this.closest('form').submit();"
                    tabindex="-1"
                >
                    Выйти
                </a>
            </form>
        </div>
    </div>--}}

</div>
@endsection
