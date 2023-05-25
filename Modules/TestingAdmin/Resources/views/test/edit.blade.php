@extends('testingadmin::layouts.master', ['all_tests' => 'active bg-secondary rounded'])

@section('content')
<h2>Редактирование теста</h2>
<div class="container px-5 pt-5">
	<form action="{{route('testingadmin.test.update', $tests->id)}}" method="post">
	@csrf
	@method('PATCH')
		<div class="row">
			<div class="form-group col-4">
				<label for="exampleCheck1" class="">Название</label>
				<input type="text" class="form-control" name="test_name" id="" placeholder="" value="{{$tests->test_name}}" required >
			</div>
			<div class="form-group col-4">
				<label for="id" class="">Дата</label>
				<input type="date" class="form-control" id="exampleCheck1" name="test_date"  value="{{$tests->test_date}}" required>
			</div>
			<div class="form-group col-4">
				<label for="id" class="">Язык теста</label>
				<select
					class="form-select"
					name="test_lang_id"
					required
				>
				@foreach($langs as $ln)
					<option
						@if($ln->id == $tests->test_lang_id) selected @endif
						value="{{$ln->id}}"
					>{{$ln->name_ru}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">Место прохождения теста</label>
				<select
						class="form-select"
						name="test_region"
						required
					>
					@foreach($regions as $region)
						<option
							@if($region->id == $tests->reg_id) selected @endif
							value="{{$region->id}}">{{$region->name_ru}}</option>
					@endforeach

					</select>
			</div>
			<div class="form-group col-3">
				<label for="exampleInputEmail1">Категория теста</label>
				<select
					class="form-select"
					name="name_ru"
					required
				>
				@foreach($categories as $cat)
					<option
						@if($cat->id == $tests->test_category_type_id) selected @endif
						value="{{$cat->id}}"
					>{{$cat->name_ru}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="col d-flex pt-5 justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
        </div>
	</form>
</div>
@endsection


