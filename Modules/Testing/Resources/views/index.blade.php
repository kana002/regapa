@extends('testing::layouts.master')

@section('content')
    <p>
        This view is loaded from module: {!! config('testing.name') !!}
    </p>
@endsection
