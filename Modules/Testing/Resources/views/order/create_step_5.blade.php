@extends('testing::layouts.master', ['sidebar' => true])

@section('content')
<h3 class="text-center">{{ __('modules.new_order_for_testing') }}</h3>
<small class="text-center">{{ __('modules.step_5') }}</small>
<div class="container px-5 pt-5 text-center">
    <div class="row pt-4">
        <div class="form-group col">
            <p class="text-center">{{ __('modules.step_5_ready_order_msg') }}</p>
        </div>
    </div>
    <div class="row pt-4">
        <form action="{{route('testing.ready_order', ['id' => request()->get('test_gen')])}}" method="get">
            <div class="form-group col">
                <button type="submit" class="btn btn-primary" _target="blank">{{ __('modules.my_order') }}</a>
            </div>
        </form>
    </div>
    <div class="row pt-4">
        <div class="form-group col">
            <button id='sign_document' class="btn btn-success">{{ __('modules.sign') }}</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
    <script src="{{asset('js/libs/ncalayer.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sign_document').click(function (e) {
            e.preventDefault();
            if (webSocket.readyState === WebSocket.CLOSED) {
                //toastr["error"]('@lang('user.main.no_nca')');
                let timer = setInterval(function () {
                    console.log('timer');
                    if (webSocket.readyState === WebSocket.OPEN) {
                        $('#sign_document').attr('disabled', false);
                        clearInterval(timer);
                    }
                    webSocket = new WebSocket('wss://127.0.0.1:13579/');
                }, 3000);
            }
            var selectedStorage = "PKCS12";
            getKeyInfo(selectedStorage, "getKeyInfoBack");
            $('#sign_document').attr('disabled', true);
        });

        function getKeyInfoBack(result) {
            console.log('123456', result)
            if (result['code'] === "500") {
                alert(result['message']);
            } else if (result['code'] === "200") {
                var res = result['responseObject'];
                var subjectCn = res['subjectCn'];
                dateString = res['certNotAfter'];
                var subjectDn = res['subjectDn'];
                var subjectSn = res['subjectCn'];
                var dateString = res['certNotAfter'];
                var iin = subjectDn.replace(new RegExp('.*' + 'IIN'), '');

                date = new Date(Number(dateString));
                var now = new Date();
                var user_iin = '{{$user->details->iin}}';
                var selectedStorage = "PKCS12";
                var pdfData = new FormData;
                pdfData.append('_token', "{{csrf_token()}}");
                if (date > now) {
                    $.ajax({
                        url: '{{route('testing.ready_order.pdf', ['test_gen' => request()->get('test_gen')])}}',
                        type: "POST",
                        data: pdfData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            console.log('444', iin, data)
                            if (iin.substr(0, 12) == user_iin)
                            {
                                createCAdESFromBase64(selectedStorage, "SIGNATURE", data.pdf, true, "createCAdESFromBase64Back");
                            }
                            else
                            {
                                alert("Вы используете ключ другого пользователя");
                            }
                        },
                        error: function (data) {
                            console.log(data)
                            alert("Нет данных для подписи!");
                        }
                    });
                } else {
                    alert("Просрочен ключ эцп");
                }
            }
        }

        function createCAdESFromBase64Back(result) {
            console.log('1234567', result)
            if (result['code'] === "500") {
                alert(result['message']);
            } else if (result['code'] === "200") {
                let formData = new FormData();
                var sign = result['responseObject'];
                formData.append('sign', sign);
                formData.append('_token', "{{csrf_token()}}");
                if (sign && sign[0] == 'M' && sign[0] != "{" && sign[0] != " ") {


                    $.ajax({
                        url: '{{  route('testing.ready_order.sign', ['test_gen' => request()->get('test_gen')]) }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#sign_document').hide();
                            location.href = '/testing/all_orders';
                        },
                        error: function (error) {
                            alert('Не удалось подписать документ!');
                        }
                    });

                } else {
                    alert("Отсутствует ключи для подписи");
                }
            }
        }


    </script>
@endsection
@section('jss')
<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
    <script src="{{asset('js/libs/ncalayer.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sign_document').click(function (e) {
            e.preventDefault();
            if (webSocket.readyState === WebSocket.CLOSED) {
                toastr["error"]('@lang('user.main.no_nca')');
                let timer = setInterval(function () {ы
                    console.log('timer');
                    if (webSocket.readyState === WebSocket.OPEN) {
                        $('#sign_document').attr('disabled', false);
                        clearInterval(timer);
                    }
                    webSocket = new WebSocket('wss://127.0.0.1:13579/');
                }, 3000);
            }
            var selectedStorage = "PKCS12";
            getKeyInfo(selectedStorage, "getKeyInfoBack");
            $('#sign_document').attr('disabled', true);
        });

        function getKeyInfoBack(result) {
            if (result['code'] === "500") {
                alert(result['message']);
            } else if (result['code'] === "200") {
                var res = result['responseObject'];
                var subjectCn = res['subjectCn'];
                dateString = res['certNotAfter'];
                var subjectDn = res['subjectDn'];
                var subjectSn = res['subjectCn'];
                var dateString = res['certNotAfter'];
                var iin = subjectDn.replace(new RegExp('.*' + 'IIN'), '');

                date = new Date(Number(dateString));
                var now = new Date();
                var user_iin = '000826600317';
                var selectedStorage = "PKCS12";
                var pdfData = new FormData;
                pdfData.append('_token', "{{csrf_token()}}");
                if (date > now) {
                    $.ajax({
                        url: '{{route('testing.ready_order.pdf', ['test_gen' => request()->get('test_gen')])}}',
                        type: "POST",
                        data: pdfData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (iin.substr(0, 12) == user_iin)
                            {
                                createCAdESFromBase64(selectedStorage, "SIGNATURE", data.pdf, true, "createCAdESFromBase64Back");
                            }
                            else
                            {
                                alert("Вы используете ключ другого пользователя");
                            }
                        },
                        error: function (data) {
                            alert("Нет данных для подписи!");
                        }
                    });
                } else {
                    alert("Просрочен ключ эцп");
                }
            }
        }

        function createCAdESFromBase64Back(result) {
            if (result['code'] === "500") {
                alert(result['message']);
            } else if (result['code'] === "200") {
                let formData = new FormData();
                var sign = result['responseObject'];
                formData.append('sign', sign);
                formData.append('_token', "{{csrf_token()}}");
                if (sign && sign[0] == 'M' && sign[0] != "{" && sign[0] != " ") {


                    $.ajax({
                        url: '{{  route('testing.ready_order.sign') }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#sign_document').hide();
                            location.href = '/testing/all_orders';
                        },
                        error: function (error) {
                            alert('Не удалось подписать документ!');
                        }
                    });

                } else {
                    alert("Отсутствует ключи для подписи");
                }
            }
        }

        @if ($errors -> any())
            @foreach($errors -> all() as $error)
            toastr["error"]("{{$error}}");
        @endforeach
        @endif
    </script>
@endsection
