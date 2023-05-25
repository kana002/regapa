@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">{{ __('modules.new_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_4') }}</small>
<div class="container px-5 pt-5">
    <form action="{{route('testing.new_order.store_step_4', ['test_gen' => request()->get('test_gen')])}}"
        method="post"
        enctype="multipart/form-data"
    >
		@csrf
		<div class="row pt-4">
			<div class="form-group col-3">
				<label for="exampleInputEmail1">{{ __('modules.id_card') }}</label>
                <input class="form-control" type="file" id="formFile" name="udost">
			</div>
            <div class="form-group col-3">
				<label for="exampleInputEmail1">{{ __('modules.edu_doc') }}</label>
                <input class="form-control" type="file" id="formFile" name="education">
			</div>
            <div class="form-group col-3">
                <label for="exampleInputEmail1">{{ __('modules.payment_method') }}</label>
                <input type="hidden" id="payment_type" name="payment_type" value="1"/>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="dogovor" checked onchange="show_receipt(this)">
                    <label class="form-check-label" for="flexRadioDefault1">
                    {{ __('modules.payment_contract') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="individual" onchange="show_receipt(this)">
                    <label class="form-check-label" for="flexRadioDefault2">
                    {{ __('modules.payment_self') }}
                    </label>
                </div>
            </div>
            <div class="form-group col-3">
                <div id="my_receipt" style="display: none">
                    <label for="exampleInputEmail1">{{ __('modules.payment_receipt') }}</label>
                    <input class="form-control" type="file" id="formFile" name="payment_receipt">
                </div>
            </div>
		</div>
        <div class="row pt-4">
            <div class="form-group col-4">
                <label for="exampleInputEmail1">{{ __('modules.pm_doc') }}</label>
                @if(isset($docs) && $docs->exp_spravka != null)
                    <div class="bg-warning mb-2 p-2 rounded shadow-md row gx-0 align-items-center">
                        <i class="fa-sharp fa-solid fa-circle-exclamation me-2 col-1 text-center"></i>
                        <p class="col-10 m-0">
                            <a target="_blank" class="text-decoration-none" href="{{route('testing.downloadExpReference', ['id'=>$docs->testing_order_id])}}"
                            >{{ __('modules.download_this_file') }}</a>, {{ __('modules.sign_and_upload_scan') }}</p>
                    </div>
                @endif
                <input class="form-control" type="file" id="formFile" name="spravka">
            </div>
        </div>
        <div class="row pt-4">
            <div class="form-group col-4">
                <div class="col mb-3">
                    <label for="exampleInputEmail1">{{ __('modules.cert_s') }}</label>
                    <a
                        class="add_form_field btn btn-sm btn-primary py-1 px-3 fs-5"
                        role="button"
                        style="margin-left:10px; font-size: 18px !important; cursor: pointer;"
                        >+</a>
                    </div>
                    <div class="container1">
                        <input class="form-control" type="file" id="formFile" name="certs[]">
                    </div>
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
    document.addEventListener("DOMContentLoaded", () => {
        var max_fields = 10;
        var wrapper =  document.getElementsByClassName("container1")[0];
        var add_button = document.getElementsByClassName("add_form_field")[0];

        var x = 1;
        console.log(add_button)
        add_button.onclick = ((e) => {
            console.log('lol')
            e.preventDefault();
            if (x < max_fields)
            {
                x++;
                wrapper.insertAdjacentHTML('beforeend', '<div class="hstack gap-3"><input class="form-control mt-2" name="certs[]" style="margin-bottom: 10px;" required type="file" accept= "application/msword,.docx,.txt,.html,htm,.pdf,.odt,.rtf,.pptx, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"/> <button onclick="delete_cert(this)" class="delete btn btn-sm btn-danger py-1 px-3">x</button></div>');
                var delete_button = document.getElementsByClassName("delete")[0];
            }
            else alert('Вы достигли лимита.')
        });

    });

    function delete_cert(btn)
    {
        btn.parentNode.remove()
    }

    function show_receipt(el)
    {
        let receipt = document.getElementById('my_receipt')
        let payment_type = document.getElementById('payment_type')
        if(el.id == 'individual')
        {
            receipt.style.display = 'block'
            payment_type.value = '2'
        }
        else if(el.id == 'dogovor')
        {
            receipt.style.display = 'none'
            payment_type.value = '1'
        }
    }
</script>
@endsection