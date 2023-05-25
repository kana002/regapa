@extends('testing::layouts.master', ['new_order' => 'active bg-secondary rounded'])

@section('content')
<h3 class="text-center">Новая заявка на тестирование</h3>
<div class="container px-5 pt-5">
	<form action="">
		<div class="row">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Фамилия</label>
				<input name="surname" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваша фамилия"
					value="{{$user->surname}}"
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Имя</label>
				<input name="name" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше имя"
					value="{{$user->name}}"
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Отчество</label>
				<input name="middlename" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше отчество"
					value="{{$user->middlename}}"
				>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleCheck1">Дата рождения</label>
				<input type="date" class="form-control" id="exampleCheck1" name="date_birth">
			</div>
			<div class="form-group col-4">
				<label for="exampleInputPassword1">ИИН</label>
				<input type="number" class="form-control" id="exampleInputPassword1"
					placeholder="Введите ИИН"
					name="iin"
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Адрес места жительства</label>
				<input name="living_address" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш адрес места жительства"
				>
			</div>
		</div>
		<hr/>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Место работы</label>
				<input name="job_org" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше место работы"
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Должность</label>
				<input name="job_position" type="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Вашa должность">
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Стаж работы в государственном секторе</label>
				<input name="stazh_gos" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Стаж работы в государственном секторе">
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Стаж работы в проектном менеджменте</label>
				<input name="stazh_project_man" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Стаж работы в проектном менеджменте">
			</div>
		</div>
		<hr/>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Категория теста</label>
				<select
                    class="form-select "
                    name="category_test"
                    required
                >
                    <option value="1">Руководитель проекта</option>
                    <option value="2">Руководитель программы</option>
                    <option value="3">Руководитель портфелем</option>
                    <option value="4">Тренер-консультант</option>
                </select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Место прохождения теста</label>
				<select
                    class="form-select "
                    name="profile_type"
                    required
                >
                    <option value="1">г. Астана</option>
                    <option value="2">Филиал 1</option>
                    <option value="3">Филиал 2</option>
                    <option value="4">Филиал 3</option>
                </select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Желаемая дата прохождения теста</label>
				<input type="date" class="form-control" id="exampleCheck1">
			</div>
		</div>
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-danger shadow-md">Отправить</button>
		</div>
	</form>
</div>
@endsection