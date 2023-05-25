@extends('tik::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">Редактирование заявки на курс/семинар</h3>
<small class="text-center">Шаг 1</small>
<div class="container px-5 pt-5">
	<form action="{{route('tik.edit_order.update_step_1',  ['gen' => $order->gen])}}" method="post" enctype="multipart/form-data">
	@csrf
		<div class="row">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Фамилия</label>
				<input name="surname" type="text" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваша фамилия"
					value="{{$order->surname}}" required
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Имя</label>
				<input name="name" type="text" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше имя"
					value="{{$order->name}}"
					required
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Отчество</label>
				<input name="middlename" type="text" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше отчество"
					value="{{$order->middlename}}"
					required
				>
			</div>
		</div>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleCheck1">Дата рождения</label>
				<input type="date" class="form-control" id="exampleCheck1" name="birth_date" value="{{$order->birth_date}}" required>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputPassword1">ИИН</label>
				<input type="number" class="form-control" id="exampleInputPassword1"
					placeholder="Введите ИИН"
					name="iin"
					required
                    value="{{$order->iin}}"
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Пол</label>
				<select
                    class="form-select"
                    name="gender"
                    required
                >
                    <option @if($order->gender == 1) selected='selected' @endif value="1">Мужской</option>
                    <option @if($order->gender == 2) selected='selected' @endif value="2">Женский</option>
                </select>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleCheck1">Фото (не больше 2 мб) | .jpeg, .jpg, .png</label>
				<input class="form-control" type="file" id="order_photo" name="photo">
                @if(isset($order) && $order->photo != null)
                    <p class="pt-2 m-0">
                    Ранее загружено: <a class="text-decoration-none" href="{{route('fiz.download_order_photo', ['gen' => $order->gen])}}"
                        >{{substr($order->photo, strrpos($order->photo, '/') + 1) ?? 'Файл'}}</a>
                    </p>
                    @endif
			</div>
		</div>
		<hr/>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Место работы (Министерство, ведомство (акимат), департамент, управление, отдел)</label>
				<select
						class="form-select"
						name="job_org"
						required
					>
					{{--@foreach($job_orgs as $org)--}}
						<!-- <option {{-- @if($order->job_org_id == $org->id) selected='selected' @endif value="{{$org->id}}">{{$org->org_name}}--}}</option> -->
						<option value="Жеке тұлға">Жеке тұлға</option>
					{{--@endforeach --}}
				</select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Стаж работы в государственном секторе (включая стаж на данной позиции)</label>
					<input
						name="stazh_gos"
						type="text"
						class="form-control"
						value="{{$order->stazh_gos}}"
						aria-describedby="emailHelp"
						min="1"
						placeholder="Стаж работы в государственном секторе"
						required
					>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Должность</label>
				<input
                    name="job_position"
                    type="text"
                    class="form-control"
                    value="{{$order->job_position}}"
                    aria-describedby="emailHelp"
                    placeholder="Вашa должность"
				    required>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Категория</label>
				<select
						class="form-select"
						name="job_category"
						required
					>
					@foreach($job_categories as $cat)
						<option @if($order->job_category_id == $cat->id) selected='selected' @endif value="{{$cat->id}}">{{$cat->code}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Сведения о прививке</label>
				<select
						class="form-select"
						name="vaccine"
						required
					>
					@foreach($vaccines as $vac)
						<option @if($order->vaccine == $vac->id) selected='selected' @endif value="{{$vac->id}}">{{$vac->name_ru}}</option>
					@endforeach
				</select>
			</div>
			<!-- <div class="form-group col-4">
				<label for="exampleInputEmail1">Основные функциональности (не менее 3)</label>
				<textarea
					class="form-control"
					name="main_funcs"
					id="exampleFormControlTextarea1"
					rows="3"
					placeholder="Основные функциональности (не менее 3)"
					required>{{$order->job_main_funcs}}</textarea>
			</div> -->
		</div>
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
		</div>
	</form>
</div>
@endsection

@section('scripts')
<script>
	var uploadField = document.getElementById("order_photo");

	uploadField.onchange = function() {
		file_ext = uploadField.value.split('.').pop()
		if(file_ext != 'jpg' && file_ext != 'jpeg' && file_ext != 'png')
		{
			uploadField.style.border = '1px solid red'
			alert("Қате формат. \nНеверный формат.")
			this.value = ""
		}
		else uploadField.style.border = '1px solid green'

		if(this.files[0].size > 2097152){
			uploadField.style.border = '1px solid red'
			alert("Файл көлемі 2 МБ-тан кем болуы керек. \nРазмер файла должен быть меньше 2 МБ.")
			this.value = ""
		}
		else uploadField.style.border = '1px solid green'
	};



</script>
@endsection