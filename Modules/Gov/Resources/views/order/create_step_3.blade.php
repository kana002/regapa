@extends('gov::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">Новая заявка на курс/семинар</h3>
<small class="text-center">Шаг 3</small>
<div class="container px-5 pt-5">
	<form action="{{route('gov.new_order.store_step_3', ['gen' => request()->get('gen')])}}" method="post">
		@csrf
		<div class="row py-4">
            <div class="card p-0">
                <h5 class="card-header text-center">Контактные данные слушателя</h5>
                <div class="card-body row">
                    <div class="form-group col-4">
                        <label for="exampleCheck1">Email</label>
                        <input type="email" class="form-control" placeholder="Введите email" name="student_email" required>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputPassword1">Рабочий телефон</label>
                        <input type="telephone" class="form-control" id="exampleInputPassword1"
                            placeholder="Введите телефон"
                            name="student_tel_job" required
                        >
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputPassword1">Мобильный телефон</label>
                        <input type="telephone" class="form-control" id="exampleInputPassword1"
                            placeholder="Введите мобильный телефон"
                            name="student_tel_mob" required
                        >
                    </div>
                </div>
            </div>
		</div>
        <div class="row py-4">
            <div class="card p-0">
                <h5 class="card-header text-center">Контактные данные руководителя слушателя</h5>
                <div class="card-body row">
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">ФИО руководителя</label>
                        <input type="text" class="form-control"
                            placeholder="Введите фио руководителя"
                            name="director_name" required
                        >
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleCheck1">Email</label>
                        <input type="email" class="form-control" placeholder="Введите email" name="director_email" required>
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">Рабочий телефон</label>
                        <input type="telephone" class="form-control" id="exampleInputPassword1"
                            placeholder="Введите телефон"
                            name="director_tel_job" required
                        >
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">Мобильный телефон</label>
                        <input type="telephone" class="form-control"
                            placeholder="Введите мобильный телефон"
                            name="director_tel_mob" required
                        >
                    </div>
                </div>
            </div>
		</div>
		<div class="row py-4">
            <div class="card p-0">
                <h5 class="card-header text-center">Контактные данные кадровой службы</h5>
                <div class="card-body row">
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">ФИО cотрудника кадровой службы</label>
                        <input type="text" class="form-control"
                            placeholder="Введите фио cотрудника кадровой службы"
                            name="hr_name" required
                        >
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleCheck1">Email</label>
                        <input type="email" class="form-control" placeholder="Введите email" name="hr_email" required>
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">Рабочий телефон</label>
                        <input type="telephone" class="form-control" id="exampleInputPassword1"
                            placeholder="Введите телефон"
                            name="hr_tel_job" required
                        >
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">Мобильный телефон</label>
                        <input type="telephone" class="form-control" id="exampleInputPassword1"
                            placeholder="Введите мобильный телефон"
                            name="hr_tel_mob" required
                        >
                    </div>
                </div>
            </div>
		</div>
        <div class="row pt-4">
            <label for="exampleFormControlTextarea1">Дата и номер приказа государственного органа, направившего на обучение</label>
			<input class="form-control" name="org_who_sent" type="text" value="-" required></input>
        </div>
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
		</div>
	</form>
</div>
@endsection
@section('scripts')

@endsection