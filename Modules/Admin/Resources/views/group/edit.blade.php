@extends('admin::layouts.master', ['all_groups' => 'active bg-secondary rounded'])

@section('content')
<h2>Редактирование группы: {{$group->group_name}}</h2>
<div class="container px-5 pt-5">
    <form action="{{route('admin.group.update', $group->id)}}" method="post">
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
                    value="{{$group->group_name}}"
                >
            </div>
            <div class="form-group col-4">
				<label for="exampleInputEmail1">Тема</label>
				<select
                    class="form-select"
                    name="tema_kz"
                    required
                >
                     @foreach($themes as $theme)
						<option
                            @if($group->theme_id == $theme->id) selected @endif
                            value="{{$theme->id}}"
                            >{{$theme->tema_kz}}</option>
					@endforeach

                </select>
			</div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Заявки</label>
                <select
                    class="form-select"
                    name="orders[]"
                    id="multiple-select-custom-field"
                    required
                    multiple
                    data-placeholder="Выберите заявки"
                >
                @foreach($orders as $order)
                    <option
                        @if($group->group_orders->contains('order_id', $order->id)) selected @endif
                        value="{{$order->id}}"
                        >№ {{$order->gen}}</option>
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
    $('#multiple-select-custom-field').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
        tags: true
    } );
</script>
@endsection

