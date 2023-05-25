@extends('testingadmin::layouts.master', ['all_tests' => 'active bg-secondary rounded'])

@section('content')
<h2>Новый тест</h2>
<div class="container px-5 pt-5">
    <form action="{{route('testingadmin.test.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Название</label>
                <input name="test_name" type="type" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название теста"
                    value="" required
                >
            </div>
            <div class="form-group col-4">
                <label for="exampleCheck1">Дата</label>
                <input type="date" class="form-control" id="exampleCheck1" name="test_date" required>
            </div>
            <div class="form-group col-4">
				<label for="exampleInputEmail1">Язык теста</label>
				<select
                    class="form-select "
                    name="test_lang"
                    required
					id="test_lang"
                >
                    @foreach($langs as $lang)
						<option value="{{$lang->id}}">{{$lang->name_ru}}</option>
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
						<option value="{{$region->id}}">{{$region->name_ru}}</option>
					@endforeach

					</select>
			</div>
            <div class="form-group col-4">
				<label for="exampleInputEmail1">Категория теста</label>
				<select
                    class="form-select "
                    name="test_category"
                    required
					id="test_category"
					onchange="docs_list(this)"
                >
                    <option value="1">Руководитель проекта</option>
                    <option value="2">Руководитель программы</option>
                    <option value="3">Руководитель портфелем</option>
                    <option value="4">Тренер-консультант</option>
                </select>
			</div>
        </div>
        <div class="col d-flex pt-5 justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
        </div>
    </form>
</div>
@endsection