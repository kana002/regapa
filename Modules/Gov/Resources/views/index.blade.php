@extends('gov::layouts.master')

@section('content')
	<div class="row align-items-center">
		<div class="col-6">
			<div class="row mb-3">
				<a
					class="btn btn-lg btn-primary shadow"
					role="button"
					href="/login"
				>
				Войти
				</a>
			</div>
			<div class="row">
				<a
					class="btn btn-lg btn-primary shadow"
					role="button"
					href="/login"
				>
				Регистрация
				</a>
			</div>
		</div>
		<div class="col-6">
		<div class="row mb-3">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/W_utidJOvIQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="row">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/B3OvJcrwyrM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		</div>
	</div>
@endsection
