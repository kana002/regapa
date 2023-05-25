@extends('testingadmin::layouts.master', ['all_orders' => 'active bg-secondary rounded'])

@section('content')

<form action="{{route('testingadmin.store_orders')}}" method="post">
    @csrf
   <div class="form-group">
    <label for="id" class="text-primary">reg_id</label>
    <input type="text" class="form-control"  name="reg_id" id="" placeholder="" value=""> 
    </div>
  <div class="form-group">
    <label for="id" class="text-primary">Имя</label>
    <input type="text" class="form-control"  name="name" id="" placeholder="" value=""> 
    </div>
  <div class="form-group">
    <label for="id" class="text-primary">Фамилия</label>
    <input type="text" class="form-control" name="surname"  id="" placeholder="" value=""> 
    </div>
  <div class="form-group">
    <label for="id" class="text-primary">Отчество</label>
    <input type="text" class="form-control" name="middlename"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">ИИН</label>
    <input type="text" class="form-control" name="iin"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Вакцина</label>
    <input type="text" class="form-control" name="vaccine"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Дата рождения</label>
    <input type="text" class="form-control" name="birth_date"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">Тип курса</label>
    <input type="text" class="form-control" name="course_type_id"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">курс начал</label>
    <input type="text" class="form-control" name="study_start_date"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">курс закончен</label>
    <input type="text" class="form-control" name="study_end_date"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">студент контакт</label>
    <input type="text" class="form-control" name="student_tel_self"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">студ конт раб</label>
    <input type="text" class="form-control" name="student_tel_job"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">email</label>
    <input type="text" class="form-control" name="student_email"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">контакт руководителя</label>
    <input type="text" class="form-control" name="student_boss_tel_self"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">раб конт контакт руковод</label>
    <input type="text" class="form-control" name="student_boss_tel_job"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">email руковод</label>
    <input type="text" class="form-control" name="student_boss_email"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">ФИО руковод</label>
    <input type="text" class="form-control" name="student_boss_full_name"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">контакт отдел кадра</label>
    <input type="text" class="form-control" name="kadr_tel"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">email отдел кадра</label>
    <input type="text" class="form-control" name="kard_email"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">ФИО отдел кадра</label>
    <input type="text" class="form-control" name="kard_full_name"  id="" placeholder="" value=""> 
  </div>
  <div class="form-group">
    <label for="id" class="text-primary">причина</label>
    <textarea class="form-control" name="reason"  id="" rows="3" > </textarea>
  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
 
</form>

@endsection