@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">{{ __('modules.new_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_2') }}</small>
<div class="container px-5 pt-5">
	<form action="{{route('testing.new_order.store_step_2', ['test_gen' => request()->get('test_gen')])}}" method="post">
		@csrf
		<div class="row pt-4">
			<div class="form-group col-4">
			<label for="exampleInputEmail1">{{ __('modules.test_category') }}</label>
				<select
                    class="form-select "
                    name="test_category"
                    required
					id="test_category"
					onchange="get_test_date(this)"
                >
                    @foreach($test_categories as $cat)
						<option
                            @if($testing_order->category_id == $cat->id) selected @endif
                            value="{{$cat->id}}"
                            >{{$cat->$locale}}</option>
					@endforeach
                </select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.test_place') }}</label>
				<select
						class="form-select"
						name="test_region"
						id="test_region"
						onchange="get_test_date(this)"
						required
					>
					@foreach($regions as $region)
						<option value="{{$region->id}}">{{$region->$locale}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.test_desired_date') }}</label>
				<input
					name="test_desired_date"
					class="form-control flatpickr"
					type="date"
					placeholder="{{ __('modules.select_date') }}"
					id="test_chosen_date"
					onchange="choose_date_from_list(this)"
				>
			</div>
		</div>
		<div class="row pt-4">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.test_lang') }}</label>
				<select
                    class="form-select "
                    name="test_lang"
                    required
					id="test_lang"
					onchange="get_test_date(this)"
                >
                    @foreach($langs as $lang)
						<option value="{{$lang->id}}">{{$lang->$locale}}</option>
					@endforeach
                </select>
			</div>
		</div>

		<hr>
		<div class="alert alert-warning alert-dismissible fade show shadow" role="alert" style="display: none" id="my_alert_warning">
			<strong>{{ __('modules.no_tests') }}</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<div class="alert alert-danger alert-dismissible fade show shadow" role="alert" style="display: none" id="my_alert_error">
			<div>
			{{ __('modules.select_red_date') }}
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>

		<div class="row pt-4 gx-0">
			<div class="col border border-info rounded bg-light shadow p-3" id="docs_list_div">
				<p class="text-white fw-bold bg-info p-3 border rounded">
				{{ __('modules.req_docs') }}
				</p>
				<ul id="docs_list">
					<li>{{ __('modules.id_card') }}</li>
					<li>{{ __('modules.edu_doc') }}</li>
					<li>{{ __('modules.cert_pm_35_hours') }}</li>
				</ul>
			</div>
		</div>
		<div class="col d-flex pt-5 justify-content-center">
			<button type="submit" class="btn btn-lg btn-primary shadow-md">{{ __('modules.save') }}</button>
		</div>
	</form>
</div>
@endsection
@section('scripts')
	<script
	src="https://code.jquery.com/jquery-3.6.3.min.js"
	integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
	crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		config = {
			enableTime: true,
			dateFormat: 'Y-m-d H:i',
		}
		flatpickr("input[type=datetime-local]", config);

		let myDates = []
		let coolDates = []
		let docs_list_div = document.getElementById('docs_list_div')
		let docs_list_ul = document.getElementById('docs_list')
		let test_chosen_date = document.getElementById('test_chosen_date')
		let my_alert_warning = document.getElementById('my_alert_warning')
		let my_alert_error = document.getElementById('my_alert_error')

		function get_test_date(el)
		{
			if(el.id == 'test_category')
			{
				docs_list_ul.replaceChildren()

				let lis = []
				let li_1 = document.createElement("li");
				let li_2 = document.createElement("li");
				let li_3 = document.createElement("li");
				lis = [li_1, li_2, li_3]

				li_1.innerText = 'Удостоверение личности'
				li_2.innerText = 'Документ об образовании'

				if(el.value == '1') li_3.innerText = 'Сертификаты, подтверждающие обучение по проектному менеджменту не менее 35 часов'
				else if(el.value == '2') li_3.innerText = 'Сертификат по I уровню «Руководитель проекта»'
				else if(el.value == '3') li_3.innerText = 'Сертификаты I и II уровням («Руководитель проекта» и «Руководитель программы»)'
				else if(el.value == '4') li_3.innerText = 'Сертификаты по I, II и III уровням («Руководитель проекта», «Руководитель программы» и «Руководитель портфелем»)'

				lis.forEach((el) => docs_list_ul.appendChild(el))
			}
			get_all_tests_ajax();
		}

		function get_all_tests_ajax()
		{
			flatpickr('.flatpickr', function (el) {this._flatpickr.clear()})
			coolDates = []
			let my_data = new FormData;
			let test_cat = document.getElementById('test_category').value
			let test_reg = document.getElementById('test_region').value
			let test_lang = document.getElementById('test_lang').value

			my_data.append('test_cat', test_cat);
			my_data.append('test_reg', test_reg);
			my_data.append('test_lang', test_lang);

			my_alert_warning.style.display = 'none'
			my_alert_error.style.display = 'none'


			$.ajax({
				url: '{{route('testing.get_test_date')}}',
				type: "POST",
				data: my_data,
				processData: false,
				contentType: false,
				success: function (data)
				{
					if(data.length > 0)
					{
						myDates = data
						data.forEach((el) => {
							let year = parseInt(el.test_date.split('-')[0])
							let month = parseInt(el.test_date.split('-')[1])-1
							let day = parseInt(el.test_date.split('-')[2])
							coolDates.push(Date.parse(new Date(year, month, day)))
						})
						flatpickr('.flatpickr', {
							onDayCreate: function(dObj, dStr, fp, dayElem)
							{
								if (coolDates.indexOf(+dayElem.dateObj) !== -1) {
									dayElem.className += " has-action";
								}
							}
						});
						choose_date_from_list(test_chosen_date);
					}
					else
					{
						my_alert_error.style.display = 'none'
						my_alert_warning.style.display = ''

					}
				},
				error: function (data) {}
			});
		}

		function choose_date_from_list(el)
		{
			if(myDates.length != 0)
			{
				let right_date = myDates.find(el2 => {
					return el2.test_date == el.value
				})
				if(right_date == undefined) my_alert_error.style.display = ''
				else my_alert_error.style.display = 'none'
			}
		}

		$(document).ready(function()
		{
			get_all_tests_ajax();
		});
	</script>
@endsection