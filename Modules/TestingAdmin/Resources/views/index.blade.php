@extends('testingadmin::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('testingadmin.name') !!}
    </p>
@endsection
