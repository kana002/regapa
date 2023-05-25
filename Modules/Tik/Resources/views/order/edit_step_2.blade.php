@extends('tik::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">Редактирование заявки на курс/семинар</h3>
<small class="text-center">Шаг 2</small>
<div class="container px-5 pt-5">
	<form action="{{route('tik.edit_order.update_step_2', ['gen' => $order->gen])}}" method="post">
		@csrf
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Тип обучения</label>
				<select
                    class="form-select"
                    name="theme_type"
                    required
					onchange="exps_and_prev_edu(this)"
                >
					@foreach($theme_types as $tt)
						<option @if($order->theme_type_id == $tt->id) selected='selected' @endif value="{{$tt->id}}">{{$tt->name_ru}}</option>
					@endforeach
                </select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Тема обучения</label>
				<select
                    class="form-select"
                    name="theme"
                    required
                >
					@foreach($themes as $theme)
						<option @if($order->theme_id == $theme->id) selected='selected' @endif value="{{$theme->id}}">{{$theme->tema_kz}}</option>
					@endforeach
                </select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Язык теста</label>
				<select
                    class="form-select "
                    name="lang"
                    required
                >
                    @foreach($langs as $lang)
						<option @if($order->lang_id == $lang->id) selected='selected' @endif value="{{$lang->id}}">{{$lang->name_ru}}</option>
					@endforeach
                </select>
			</div>
		</div>
		<div class="row pt-4">
			<div class="form-group col-6">
				<label for="exampleInputEmail1">Период</label>
				<div class="hstack gap-3">
					<input
                        type="date"
                        name="period_date_1"
                        class="form-control"
                        id="exampleCheck1"
                        required
                        value="{{$order->study_start_date}}"
                    >
					<span> - </span>
                    <input
                        type="date"
                        name="period_date_2"
                        class="form-control"
                        id="exampleCheck1"
                        required
                        value="{{$order->study_end_date}}"
                    >
				</div>
				<div class="form-group col pt-4 form-check">
					<input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        name="study_in_capital"
                        id="flexCheckDefault"
                        @if($order->reg_id == 1) checked='checked' @endif
                    >
					<label class="form-check-label" for="flexCheckDefault">
						Направление на обучение в г. Астана (кликать только при направлении на обучение из региона в г. Астана)
					</label>
				</div>
			</div>
		</div>
		<hr>
		<div class="row pt-4">
			<div class="row" id="exps" style="display: none">
				<label for="">КӘСІБИ ҚҰЗЫРЕТТЕР МЕН ДАҒДЫЛАРДЫ ДАМЫТУ БОЙЫНША КҮТІЛЕТІН НӘТИЖЕ</label>
				<div class="form-group col-6 pt-3" id="exp_1" style="display: none">
					<label for="exampleFormControlTextarea1">Курс бағдарламасы бойынша қандай тақырыптарды оқығыңыз келеді?</label>
					<textarea class="form-control" name="expectations" id="exampleFormControlTextarea1" rows="3" placeholder="Ваши ожидания" required></textarea>
				</div>
				<div class="form-group col-6 pt-3" id="exp_2" style="display: none">
					<label for="exampleFormControlTextarea1">Аталған курс шеңберінде қандай құзыреттерді дамытқыңыз келеді?</label>
					<textarea class="form-control" name="expectations_2" id="exampleFormControlTextarea1" rows="3" placeholder="Ваши ожидания" required></textarea>
				</div>
				<div class="form-group col-6 pt-3" id="exp_1_1" style="display: none">
					<label for="exampleFormControlTextarea1">Семинар барысында басты назар аударатын (ескерілуі тиіс) тақырыптар мен сұрақтар</label>
					<textarea class="form-control" name="expectations" id="exampleFormControlTextarea1" rows="3" placeholder="Ваши ожидания" required></textarea>
				</div>
			</div>
			<div class="row" id="prev_edu" style="display: none">
				<label for="" class="pt-3">БҰРЫН ОҚЫҒАНЫ ТУРАЛЫ АҚПАРАТ</label>
				<div class="form-group col-6 pt-3" id="exp_3">
					<label for="exampleFormControlTextarea1">Соңғы өткен біліктілікті арттыру семинарының тақырыбы</label>
					<textarea class="form-control" name="prev_edu_name" id="exampleFormControlTextarea1" rows="3" placeholder="" required></textarea>
				</div>
				<label for="exampleInputEmail1">Өту мерзімі</label>
				<div class="hstack gap-3 col-6 pt-3">
					<input type="date" name="period_prev_edu_1" class="form-control" id="exampleCheck1" required>
					<span> - </span>
					<input type="date" name="period_prev_edu_2" class="form-control" id="exampleCheck1" required>
				</div>
			</div>
		</div>
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
		</div>
	</form>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	let my_el = document.getElementById('theme_type')
	let prev_edu = document.getElementById('prev_edu')
	let exps = document.getElementById('exps')
	let exp_1 = document.getElementById('exp_1')
	let exp_2 = document.getElementById('exp_2')
	let exp_1_1 = document.getElementById('exp_1_1')

	function exps_and_prev_edu(el)
	{
		// ppb or ppm or dot
		if(el.value === '1' || el.value === '2' || el.value === '5')
		{
			exps.style.display = 'block'
			exp_1.style.display = 'block'
			exp_2.style.display = 'block'
			exp_1_1.style.display = 'none'

			prev_edu.style.display = 'none'
		}
		// ppk or pkv
		if(el.value === '3' || el.value === '4')
		{
			exps.style.display = 'block'
			exp_1.style.display = 'none'
			exp_2.style.display = 'none'
			exp_1_1.style.display = 'block'

			prev_edu.style.display = 'block'
		}
	}

	window.onload = exps_and_prev_edu(my_el);
</script>
@endsection