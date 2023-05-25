@extends('testingadmin::layouts.master', ['all_orders' => 'active bg-secondary rounded'])

@section('content')

<form method="post" action="{{route('testingadmin.update_orders', $user->id)}}" >
    @csrf
    @method('patch')
@foreach($all_orders as $orders )
<div class="form-group">
    <label for="id" class="text-primary">id</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->id}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Имя</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->name}}"> 
    </div>
  <div class="form-group">
    <label for="id" class="text-primary">Фамилия</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->surname}}"> 
    </div>
  <div class="form-group">
    <label for="id" class="text-primary">Отчество</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->middlename}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">ИИН</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->iin}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Вакцина</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->vaccine}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Дата рождения</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->birth_date}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Тип курса</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->course_type_id}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">курс начал</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->study_start_date}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">курс закончен</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->study_end_date}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">студент контакт</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_tel_self}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">студ конт раб</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_tel_job}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">email</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_email}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">контакт руководителя</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_boss_tel_self}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">раб конт контакт руковод</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_boss_tel_job}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">email руковод</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_boss_email}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">ФИО руковод</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->student_boss_full_name}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">контакт отдел кадра</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->kadr_tel}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">email отдел кадра</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->kard_email}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">ФИО отдел кадра</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$orders->kard_full_name}}"> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">причина</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$orders->reason}} </textarea>
  </div>
  @endforeach
  <div class="form-group">
  <a class="btn btn-primary" href="{{route('testingadmin.update_orders', $orders->id)}}" role="button">Сохранить</a>
  <button type="submit" class="btn btn-primary">Удалить</button>
  </div>
 
</form>

@endsection