@extends('admin::layouts.master', ['all_groups' => 'active bg-secondary rounded'])

@section('content')
<h2>Все группы</h2>
<div class="row my-3">
    <div class="col-1">
        <a
            href="{{route('admin.group.create')}}"
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
				<th scope="col">Название группы</th>
				<th scope="col">Название темы</th>
                <th scope="col">Количество заявок в группе</th>
				<th scope="col">Действия</th>
			</tr>
		</thead>
		<tbody>
            @if(count($groups)>0)
                @foreach($groups as $key=>$group)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$group->group_name}}</td>
                        <td>{{$group->theme->tema_kz ?? ''}}</td>
                        <td>{{$group->group_orders->count() ?? ''}}</td>
                        <td class="d-flex justify-content-center hstack gap-2">
                                <a
                                    role="button"
                                    href="{{route('admin.group.edit', $group->id)}}"
                                    class="btn btn-primary btn-sm"
                                    title="Редактировать"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{route('admin.group.delete', $group->id)}}" method="post">
                                    @csrf
                                    <button
                                        type="submit"
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


