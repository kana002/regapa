@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">{{ __('modules.new_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_3') }}</small>
<div class="container px-5 pt-5">
	<form action="{{route('testing.new_order.store_step_3', ['test_gen' => request()->get('test_gen')])}}" method="post">
		@csrf
		{{--<div class="col d-flex justify-content-center pb-5">
            <div>
                <button
                        type="button"
                        id="add_card"
                        class="btn btn-outline-primary"
                        style=""
                    >Добавить +</button>
            </div>
        </div>--}}
		<div class="container p-5 rounded bg-light border shadow-sm hstack align-items-start justify-content-between">
            <div class="col-11">
				<div class="row pt-4">
					<div class="form-group col-4">
						<label for="exampleInputEmail1">{{ __('modules.period') }}</label>
						<div class="hstack gap-3">
							<input type="date" name="period_date_1" class="form-control" id="exampleCheck1" required>
							<span> - </span>
							<input type="date" name="period_date_2" class="form-control" id="exampleCheck1" required>
						</div>
					</div>
					<div class="form-group col-4">
						<label for="exampleInputEmail1">{{ __('modules.org') }}</label>
						<input name="exp_org" type="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.org') }}" required>
					</div>
					<div class="form-group col-4">
						<label for="exampleInputEmail1">{{ __('modules.project_name') }}</label>
						<input name="exp_project_name" type="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.project_name') }}" required>
					</div>
				</div>
				<div class="row pt-4">
					<div class="form-group col-4">
						<label for="exampleInputEmail1">{{ __('modules.project_role') }}</label>
						<input name="exp_project_role" type="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.project_role') }}" required>
					</div>
					<div class="form-group col-4">
						<label for="exampleInputEmail1">{{ __('modules.pm_staj_months') }}</label>
							<input type="number" name="exp_stazh_s_uchetom_zagruzki" class="form-control" id="exampleCheck1" min=1 required>
					</div>
				</div>
				<div class="row pt-4">
					<div class="form-group col-8">
						<label for="exampleFormControlTextarea1" class="form-label">{{ __('modules.achievements') }}</label>
						<textarea
							class="form-control"
							name="exp_achievements"
							id="exampleFormControlTextarea1"
							rows="3"
							placeholder="{{ __('modules.achievements') }}" required></textarea>
					</div>
				</div>
			</div>
            {{--<button
                type="button"
                id="delete_card"
                class="btn btn-danger"
                style="margin-top: -40px; margin-right: -40px;"
            >Удалить</button>--}}
        </div>
		<div class="col d-flex pt-5 justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary shadow-md">{{ __('modules.save') }}</button>
		</div>
	</form>
</div>
@endsection