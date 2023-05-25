@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">{{ __('modules.edit_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_1') }}</small>
<div class="container px-5 pt-5">
	<form action="{{route('testing.edit_order.update_step_1', ['test_gen' => request()->route('test_gen')])}}" method="post">
		@csrf
		<div class="row">
			<div class="form-group col-4">
				<label>{{ __('modules.surname') }}</label>
				<input
					name="surname"
					type="text"
					class="form-control"
					placeholder="{{ __('modules.surname') }}"
					value="{{$user->surname}}"
					required
				>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.name') }}</label>
				<input
					name="name"
					type="text"
					class="form-control"
					placeholder="{{ __('modules.name') }}"
					value="{{$user->name}}"
					required
				>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.middlename') }}</label>
				<input
					name="middlename"
					type="text"
					class="form-control"
					placeholder="{{ __('modules.middlename') }}"
					value="{{$user->middlename}}"
					required
				>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label>{{ __('modules.birthday') }}</label>
				<input
					type="date"
					class="form-control"
					value="{{$user->details->birthday}}"
					name="birth_date"
				>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.iin') }}</label>
				<input
					type="number"
					class="form-control"
					placeholder="{{ __('modules.iin') }}"
					name="iin"
                    value="{{$user->details->iin}}"
					required
				>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.living_address') }}</label>
				<input
					name="living_address"
					type="text"
					class="form-control"
					placeholder="{{ __('modules.living_address') }}"
                    value="{{$user->details->living_address}}"
					required
				>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label>Email</label>
				<input
					type="email"
					class="form-control"
					name="email"
					value="{{$user->details->email}}"
				>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.tel') }}</label>
				<input
					type="telephone"
					class="form-control"
					placeholder="{{ __('modules.tel') }}"
					name="telephone"
                    value="{{$user->details->mobile_phone}}"
					required
				>
			</div>
		</div>
		<hr/>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label>{{ __('modules.job_place') }}</label>
				<select
					class="form-select"
					name="job_org"
					required
				>
					@foreach($job_orgs as $org)
						<option
							@if($user->details->job_org == $org->id) selected='selected' @endif
							value="{{$org->id}}"
						>{{$org->org_name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.job_position') }}</label>
				<input
					name="job_position"
					type="text"
					class="form-control"
					placeholder="{{ __('modules.job_position') }}"
					value="{{$user->details->job_position}}"
					required
				>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label>{{ __('modules.gos_staj') }}</label>
					<input
						name="stazh_gos"
						type="number"
						class="form-control"
						min="1"
						placeholder="{{ __('modules.gos_staj') }}"
                        value="{{$user->details->stazh_gos}}"
					>
			</div>
			<div class="form-group col-4">
				<label>{{ __('modules.pm_staj') }}</label>
				<input
					min="0"
					name="stazh_project_man"
					type="number"
					class="form-control"
                    placeholder="{{ __('modules.pm_staj') }}"
                    value="{{$user->details->stazh_project_man}}"
                >
			</div>
		</div>
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-primary shadow-md">{{ __('modules.save') }}</button>
		</div>
	</form>
</div>
@endsection

@section('scripts')
<script>
	const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
	const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
	var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
		trigger: 'focus'
	})
	document.getElementById("popover").popover({ trigger: "hover" });
</script>
@endsection