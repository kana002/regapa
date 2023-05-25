@extends('fiz::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">Новая заявка на курс/семинар</h3>
<small class="text-center">Шаг 2</small>
<div class="container px-5 pt-5">
	<form action="{{route('fiz.new_order.store_step_2', ['gen' => request()->get('gen')])}}" method="post">
		@csrf
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Тип обучения</label>
				<select
                    class="form-select"
                    name="theme_type"
					
                    required
					
                >
					
					@foreach($theme_types as $tt)
						<option value="{{$tt->id}}">{{$tt->name_ru}}</option>
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
						<option value="{{$theme->id}}">{{$theme->tema_kz}}</option>
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
						<option value="{{$lang->id}}">{{$lang->name_ru}}</option>
					@endforeach
                </select>
			</div>
		</div>
		<div class="row pt-4">
			<div class="form-group col-6">
				<label for="exampleInputEmail1">Период</label>
				<div class="hstack gap-3">
					<input type="date" name="period_date_1" class="form-control" id="exampleCheck1" required>
					<span> - </span>
					<input type="date" name="period_date_2" class="form-control" id="exampleCheck1" required>
				</div>
				<div class="form-group col pt-4 form-check">
					<input class="form-check-input" type="checkbox" value="" name="study_in_capital" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						Направление на обучение в г. Астана (кликать только при направлении на обучение из региона в г. Астана)
					</label>
				</div>
			</div>
		</div>
		<hr>
		
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
		</div>
	</form>
</div>
@endsection
