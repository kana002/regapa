@extends('testingadmin::layouts.master', ['settings' => 'active'])

@section('content')

@if ($message = Session::get('success'))
          <div class="alert alert-success">
          <p>{{ $message }}</p>
          </div>
        @endif

<form action="{{route('update.testingadmin.settings', $user->id)}}" method="post">
    @csrf
   
    <div class="container px-5 table-responsive">
  
  <div class="form-group">
    <label for="id" class="text-primary">Фамилия</label>
    <input type="text" class="form-control" name="surname" id="" placeholder="" value="{{$user->surname}}"> 
    <p class="helper-block"> </p>
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Имя</label>
       <input type="text" class="form-control" name="name" id="" placeholder="" value="{{$user->name}}"> 
       <p class="helper-block"> </p>
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Отчество</label>
     <input type="text" class="form-control" name="middlename" id="" placeholder="" value="{{$user->middlename}}"> 
     <p class="helper-block"> </p>
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Email</label>
     <input type="text" class="form-control" name="email" id="" placeholder="" value="{{$user->email}}"> 
     <p class="helper-block"> </p>
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Пароль</label>
     <input type="text" class="form-control" name="password" id="" placeholder="" value=""> 
     <p class="helper-block"> </p>
  </div>
  <div class="form-group">
    
  <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>

  
</form>
</div>
@endsection