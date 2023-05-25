@extends('testingadmin::layouts.master', ['all_users' => 'active bg-secondary rounded'])

@section('content')

@if ($message = Session::get('success'))
		  <div class="alert alert-success">
		  <p>{{ $message }}</p>
		  </div>
		@endif
<form action="{{route('testingadmin.update_users', $reg_user->id)}}" method="post">
	@csrf
	@method('PATCH')

  <div class="form-group">

	<label for="id" class="text-primary">ID</label>
	<input type="text" class="form-control" name="id" id="" placeholder="" value="{{$reg_user->id}}" readonly>
  </div>
  <div class="form-group">
	<label for="id" class="text-primary">Фамилия</label>
	<input type="text" class="form-control" name="surname" id="" placeholder="" value="{{$reg_user->surname}}">
  </div>
  <div class="form-group">
	<label for="id" class="text-primary">Имя</label>
	   <input type="text" class="form-control" name="name" id="" placeholder="" value="{{$reg_user->name}}">
  </div>
  <div class="form-group">
	<label for="id" class="text-primary">Отчество</label>
	 <input type="text" class="form-control" name="middlename" id="" placeholder="" value="{{$reg_user->middlename}}">
  </div>
  <div class="form-group">
	<label for="id" class="text-primary">Email</label>
	 <input type="text" class="form-control" name="email" id="" placeholder="" value="{{$reg_user->email}}">
  </div>
  <div class="form-group">
	<label for="id" class="text-primary">Пароль</label>
	 <input type="text" class="form-control" name="password" id="" placeholder="" value="">
  </div>
  <div class="form-group mt-3">
	<button type="submit" class="btn btn-primary">Сохранить</button>
  </div>


</form>
@endsection