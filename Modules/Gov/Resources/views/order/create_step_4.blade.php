@extends('gov::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">Заявка на курс/семинар</h3>
<small class="text-center">Шаг 4</small>
<div class="container px-5 pt-5 text-center">
    <div class="row pt-4">
        <div class="form-group col">
            <p class="text-center">Ваша заявка готова. Можете посмотреть, нажав на кнопку ниже.</p>
        </div>
    </div>
    <div class="row pt-4">
        <form action="{{route('gov.ready_order', ['gen' => request()->get('gen')])}}" method="post">
            @csrf
            <div class="form-group col">
                <button type="submit" class="btn btn-primary" _target="blank">Моя заявка</a>
            </div>
        </form>
    </div>
</div>
@endsection