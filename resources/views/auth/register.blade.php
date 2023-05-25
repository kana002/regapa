<x-guest-layout>
	<x-auth-card>

		<!-- Validation Errors -->
		<x-auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('register') }}">
			@csrf
			<div class="form-group">

				<!-- Confirm Password -->
				<div class="mt-4">
					<x-label for="profile_type" :value="__('Зарегистрироваться как')" />

					<select
						class="form-select mb-3 mt-2"
						name="profile_type"
						required
					>
					<option value="7">Заявитель на тестирование</option>
					{{--<option value="4">Физ. лицо</option>
						<option value="3">Государственный служащий</option>
						<option value="6">Избирательная комиссия</option>
						<option value="5">Квазисектор и другие</option>
						<option value="8">Тестирование админ</option>
						<option value="2">админ</option>
						<option value="1">суперадмин</option>--}}
					</select>
				</div>

				<div>
					<x-label for="region" :value="__('Область / город')" />

					<select
						class="form-select mb-3 mt-2"
						name="region"
						required
					>
					@foreach($regions as $region)
						<option value="{{$region->id}}">{{$region->name_ru}}</option>
					@endforeach
					</select>
				</div>

				<!-- Name -->
				<div class="mt-4">
					<x-label for="surname" :value="__('Фамилия')" />

					<x-input id="name" class="block mt-1 w-full form-control" type="text" name="surname" :value="old('surname')" required autofocus />
				</div>

				<!-- Surname -->
				<div class="mt-4">
					<x-label for="name" :value="__('Имя')" />

					<x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
				</div>

				<!-- Middlename -->
				<div class="mt-4">
					<x-label for="middlename" :value="__('Отчество')" />

					<x-input id="name" class="block mt-1 w-full form-control" type="text" name="middlename" :value="old('middlename')" autofocus />
				</div>

				<!-- Email Address -->
				<div class="mt-4">
					<x-label for="email" :value="__('Email')" />

					<x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
				</div>

				<!-- Password -->
				<div class="mt-4">
					<x-label for="password" :value="__('Пароль')" />

					<x-input id="password" class="block mt-1 w-full form-control"
									type="password"
									name="password"
									required autocomplete="new-password" />
				</div>

				<!-- Confirm Password -->
				<div class="mt-4">
					<x-label for="password_confirmation" :value="__('Подтвердить пароль')" />

					<x-input id="password_confirmation" class="block mt-1 w-full form-control"
									type="password"
									name="password_confirmation" required />
				</div>

				<div class="d-flex items-center justify-content-center mt-4">
					<x-button class="ml-4 btn btn-sm  btn-danger">
						{{ __('Зарегистрироваться') }}
					</x-button>
				</div>
			</div>
		</form>
	</x-auth-card>
</x-guest-layout>
