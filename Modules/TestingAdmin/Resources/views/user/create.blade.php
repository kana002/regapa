@extends('testingadmin::layouts.master', ['all_users' => 'active bg-secondary rounded'])

@section('content')
All users
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
          <p>{{ $message }}</p>
          </div>
        @endif
<form action="{{route('testingadmin.store_users')}}" method="post">
    @csrf
    @method('post') 

  <div class="form-group">
    <label for="id" class="text-primary">Фамилия</label>
    <input type="text" class="form-control" name="surname" id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Имя</label>
       <input type="text" class="form-control" name="name" id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Отчество</label>
     <input type="text" class="form-control" name="middlename" id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Email</label>
     <input type="text" class="form-control" name="email" id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Пароль</label>
     <input type="text" class="form-control" name="password" id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    
  <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
</form>
@endsection