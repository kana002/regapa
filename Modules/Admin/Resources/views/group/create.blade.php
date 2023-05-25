@extends('admin::layouts.master', ['all_groups' => 'active bg-secondary rounded'])

@section('content')
<h2>Новая группа</h2>
<div class="container px-5 pt-5">
    <form action="{{route('admin.group.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Название группы</label>
                <input
                    name="group_name"
                    type="type"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Название группы"
                    required
                >
            </div>
            <div class="form-group col-4">
				<label for="exampleInputEmail1">Тема</label>
				<select
                    class="form-select"
                    name="theme_id"
                    required
                >
                    @foreach($themes as $theme)
						<option value="{{$theme->id}}">{{$theme->tema_kz}}</option>
					@endforeach
                </select>
			</div>

            <div class="form-group col-4">
                <label for="exampleInputEmail1">Заявки</label>
                <select
                    class="form-select js-basic-multiple"
                    name="orders[]"
                    required
                    multiple
                    data-placeholder="Выберите заявки"
                >
                @foreach($orders as $order)
                    <option value="{{$order->id}}">№ {{$order->gen}}</option>
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
@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-basic-multiple').select2();
    });
</script>
@endsection