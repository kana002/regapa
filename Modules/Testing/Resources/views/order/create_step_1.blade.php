@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">{{ __('modules.new_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_1') }}</small>
<div class="container px-5 pt-5">
	<form action="{{route('testing.new_order.store_step_1')}}" method="post">
	@csrf
		<div class="row">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.surname') }}</label>
				<input name="surname" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.surname') }}"
					value="{{$user->surname}}" required
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.name') }}</label>
				<input name="name" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.name') }}"
					value="{{$user->name}}"
					required
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.middlename') }}</label>
				<input name="middlename" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.middlename') }}"
					value="{{$user->middlename}}"

				>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleCheck1">{{ __('modules.birthday') }}</label>
				<input type="date" class="form-control" id="exampleCheck1" name="birth_date" required
				value="{{$user->details->birthday ?? ''}}">
			</div>
			<div class="form-group col-4">
				<label for="exampleInputPassword1">{{ __('modules.iin') }}</label>
				<input type="number" class="form-control" id="exampleInputPassword1"
					placeholder="{{ __('modules.iin') }}"
					name="iin"
					required
					value="{{$user->details->iin ?? ''}}"
				>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.living_address') }}</label>
				<input name="living_address" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.living_address') }}"
					required
					value="{{$user->details->living_address ?? ''}}"
				>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleCheck1">Email</label>
				<input type="email" class="form-control" id="exampleCheck1" name="email" value="{{$user->email}}" required>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputPassword1">{{ __('modules.tel') }}</label>
				<input type="telephone" class="form-control" id="exampleInputPassword1"
					placeholder="{{ __('modules.tel') }}"
					name="telephone" required
					value="{{$user->details->mobile_phone ?? ''}}"
				>
			</div>
		</div>
		<hr/>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.job_place') }}</label>
				<select
						class="form-select"
						name="job_org"
						required
					>
					@foreach($job_orgs as $org)
						<option @if($user->details->job_org == $org->id) selected @endif value="{{$org->id}}">{{$org->org_name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.job_position') }}</label>
				<input name="job_position" type="type" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('modules.job_position') }}"
					value="{{$user->details->job_position ?? ''}}"
					required>
			</div>
		</div>
		<div class="row py-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.gos_staj') }}</label>
					<input
						name="stazh_gos"
						type="number"
						class="form-control"
						id="exampleInputEmail1"
						aria-describedby="emailHelp"
						min="1"
						placeholder="{{ __('modules.gos_staj') }}"
						value="{{$user->details->stazh_gos ?? ''}}"
						required
					>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.pm_staj') }}</label>
				<input min="0" name="stazh_project_man" type="number" class="form-control" id="exampleInputEmail1"
					aria-describedby="emailHelp" placeholder="{{ __('modules.pm_staj') }}"
					value="{{$user->details->stazh_project_man ?? ''}}"
					required
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