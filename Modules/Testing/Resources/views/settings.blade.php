@extends('testing::layouts.master', ['settings' => 'active'])

@section('content')
<h2 class="text-center">Настройки аккаунта</h2>
<div class="container px-5 pt-5">
	<form action="{{route('testing.settings.store')}}" method="post">
	@csrf
		<div class="row mb-3 justify-content-center">
			<div class="form-group col-4">
				<label for="exampleCheck1" class="text-primary">Фамилия</label>
				<input type="text" class="form-control" name="surname" id="" placeholder="" value="{{$user->surname}}" required >
			</div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="form-group col-4">
                <label for="exampleCheck1" class="text-primary">Имя</label>
                <input type="text" class="form-control" name="name" id="" placeholder="" value="{{$user->name}}" required >
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="form-group col-4">
                <label for="exampleCheck1" class="text-primary">Отчество</label>
                <input type="text" class="form-control" name="middlename" id="" placeholder="" value="{{$user->middlename}}"  >
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="form-group col-4">
                <label for="exampleCheck1" class="text-primary">Email</label>
                <input type="text" class="form-control" name="email" id="" placeholder="" value="{{$user->email}}" required >
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="form-group col-4">
                <label for="exampleCheck1" class="text-primary">Пароль</label>
                <input type="text" class="form-control" name="password" id="" placeholder="" value="" required >
            </div>
        </div>
        <div class="row">
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
	</form>
</div>
@endsection