@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<style>
    thead > tr {
        vertical-align: middle;
    }

    th {
        width: 50px;
    }
</style>
<h3 class="text-center">{{ __('modules.edit_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_4') }}</small>
<div class="container px-5 pt-5">
    <form action="{{route('testing.edit_order.update_step_4', ['test_gen' => request()->get('test_gen')])}}"
        method="post"
        enctype="multipart/form-data"
    >
		@csrf
		<div class="row pt-4 gap-5">
			<div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.id_card') }}</label>
                <input class="form-control" type="file" id="formFile" name="udost">
			</div>
            <div class="form-group col-4">
				<label for="exampleInputEmail1">{{ __('modules.edu_doc') }}</label>
                <input class="form-control" type="file" id="formFile" name="education">
			</div>
		</div>
        <hr/>
        <div class="row pt-4 gap-5">
            <div class="form-group col-4">
                <label for="exampleInputEmail1">
                {{ __('modules.pm_doc') }}
                </label>
                @if(isset($docs->exp_spravka))
                    <div class="bg-warning mb-2 p-2 rounded shadow-md row gx-0 align-items-center">
                        <i class="fa-sharp fa-solid fa-circle-exclamation me-2 col-1 text-center"></i>
                        <p class="col-10 m-0">
                            <a class="text-decoration-none" href="{{route('testing.downloadExpReference', ['id'=>$docs->testing_order_id])}}"
                            >{{ __('modules.download_this_file') }}</a>, {{ __('modules.sign_and_upload_scan') }}</p>
                    </div>
                @endif
                <input class="form-control" type="file" id="formFile" name="spravka">
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
        <hr/>
        <div class="row py-4">
            <div class="form-group col-4">
                <div class="col mb-3">
                    <label for="exampleInputEmail1">{{ __('modules.cert_s') }}</label>
                    <a
                        class="add_form_field btn btn-sm btn-primary px-3"
                        role="button"
                        style="margin-left:10px; cursor: pointer;"
                        >
                        <small><i class="fa-solid fa-plus" style="font-size: 10px"></i></small>
                    </a>
                    </div>
                    <div class="container1">
                        <input class="form-control" type="file" id="formFile" name="certs[]">
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row pt-4">
            <p class="text-center fw-bold fs-5">{{ __('modules.previously_uploaded') }}</p>
            <table class="table border border-secondary text-center">
                <thead>
                    <tr>
                        <th scope="col">
                            {{ __('modules.id_card') }}
                        </th>
                        <th scope="col">
                            {{ __('modules.edu_doc') }}
                        </th>
                        <th scope="col">
                            {{ __('modules.pm_doc') }}
                        </th>
                        <th scope="col">
                            {{ __('modules.payment_receipt') }}
                        </th>
                        <th scope="col">
                            <?php
                                $cert_count_name = count($certs) > 1 ? 'modules.cert_s' : 'modules.cert';
                            ?>
                            {{ __($cert_count_name) }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @if(isset($docs) && $docs->udost != null)
                            <a
                                class="text-decoration-none"
                                href="{{route('testing.downloadUdost', ['id' => $docs->testing_order_id])}}"
                            >{{substr($docs->udost, strrpos($docs->udost, '/') + 1) ?? 'Файл'}}</a>
                            @endif
                        </td>
                        <td>
                            @if(isset($docs) && $docs->edu != null)
                            <a
                                class="text-decoration-none"
                                href="{{route('testing.downloadUdost', ['id' => $docs->testing_order_id])}}"
                            >{{substr($docs->edu, strrpos($docs->edu, '/') + 1) ?? 'Файл'}}</a>
                            @endif
                        </td>
                        <td>
                            @if(isset($docs) && $docs->exp_spravka_signed != null)
                            <a
                                class="text-decoration-none"
                                href="{{route('testing.downloadExpReference', ['id' => $docs->testing_order_id])}}"
                            >{{substr($docs->exp_spravka_signed, strrpos($docs->exp_spravka_signed, '/') + 1) ?? 'Файл'}}</a>
                            @endif
                        </td>
                        <td>
                            @if(isset($docs) && $docs->payment_receipt != null)
                            <a
                                class="text-decoration-none"
                                href="{{route('testing.downloadPaymentReceipt', ['id' => $docs->testing_order_id])}}"
                            >{{substr($docs->payment_receipt, strrpos($docs->payment_receipt, '/') + 1) ?? 'Файл'}}</a>
                            @endif
                        </td>
                        <td>
                            @if(isset($certs) && count($certs)>0)
                                @foreach($certs as $cert)
                                <p>
                                    <a
                                        class="text-decoration-none"
                                        href="{{route('testing.downloadCertificate', ['id' => $cert->testing_order_id])}}"
                                    >{{substr($cert->certificate, strrpos($cert->certificate, '/') + 1) ?? 'Файл'}}</a>
                                </p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
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
            e.preventDefault();
            if (x < max_fields)
            {
                x++;
                wrapper.insertAdjacentHTML('beforeend', '<div class="hstack gap-3"><input class="form-control mt-2" name="certs[]" style="" required type="file" accept= "application/msword,.docx,.txt,.html,htm,.pdf,.odt,.rtf,.pptx, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"/> <button onclick="delete_cert(this)" class="delete btn btn-sm btn-danger py-1 px-3 mt-2">x</button></div>');
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