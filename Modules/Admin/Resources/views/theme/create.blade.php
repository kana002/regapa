@extends('admin::layouts.master', ['create_theme' => 'active bg-secondary rounded'])

@section('content')
<h2>Новый тест</h2>
<div class="container px-5 pt-5">
    <form action="{{route('admin.theme.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="form-group col-4">
                <label for="tema_kz">Тема на казахском</label>
                <input name="tema_kz" type="type" class="form-control"
                    id="tema_kz"  placeholder="Название темы" aria-describedby="tema_kz"
                    value="" required
                >
            </div>
            <div class="form-group col-4">
                <label for="tema_ru">Тема на русском</label>
                <input name="tema_ru" type="type" class="form-control"
                    id="tema_ru"  placeholder="Название темы" aria-describedby="tema_ru"
                    value="" required
                >
            </div>
            <div class="form-group col-4">
                <label for="uroven">Уровень</label>
                <input name="uroven" type="number" class="form-control"
                    id="uroven"  placeholder="Уровень" 
                    value="" required
                >
            </div>
            <div class="form-group col-4">
                <label for="col_chas">Количество часов</label>
                <input name="col_chas" type="number" class="form-control"
                    id="col_chas" aria-describedby="col_chas" placeholder="Количество часов"
                    value="" required
                >
            </div>

              <div class="form-group col-4">
				<label for="exampleInputEmail1">Тип</label>
				<select
						class="form-select"
						name="type"
						required
					>
					@foreach($typs as $type)
						<option value="{{$type->id}}">{{$type->name_ru}}</option>
					@endforeach

					</select>
			</div>

            <div class="form-group col-4">
				<label for="date_start">Дата начала</label>
				<input type="date" class="form-control" id="exampleCheck1" name="date_start">
			</div>
            <div class="form-group col-4">
				<label for="date_end">Дата окончания</label>
				<input type="date" class="form-control" id="exampleCheck1" name="date_end">
			</div>

          </div>

        </div>
        <div class="col d-flex pt-5 justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary shadow-md">Сохранить</button>
        </div>
    </form>
</div>
@endsection