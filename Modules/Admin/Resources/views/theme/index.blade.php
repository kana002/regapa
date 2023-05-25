@extends('admin::layouts.master', ['all_themes' => 'active bg-secondary rounded'])

@section('content')
<h2>Все темы</h2>
<div class="row my-3">
    <div class="col-1">
        <a
            href="{{route('admin.theme.create','$theme->reg_id')}}"
            role="button"
            class="btn btn-primary"
        >Создать</a>
    </div>
</div>
<div class="container px-5 table-responsive">
	<table class="table text-center table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">№</th>
				<th scope="col">Темы</th>
				<th scope="col">Дата</th>
				<th scope="col">Действия</th>
			</tr>
		</thead>
		<tbody>
            @if(count($theme)>0)
                @foreach($theme as $key=>$them)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$them->tema_kz}}</td>
                        <td>{{$them->date_start ?? ''}}</td>
                        <td class="d-flex justify-content-center hstack gap-2">
                                <a
                                    role="button"
                                    href="{{route('admin.theme.edit', $them->id)}}"
                                    class="btn btn-primary btn-sm"
                                    title="Редактировать"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                               <form action="{{route('admin.theme.destroy', $them->id)}}" method="post">
							@csrf
							@method('delete')
                                    <button
                                        type="submit"
                                        href="{{route('admin.theme.destroy', $them->id)}}"
                                        class="btn btn-danger btn-sm"
                                        title="Удалить"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            @endif
		</tbody>
	</table>
</div>
@endsection