<!doctype html>
<html lang="ru"><head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF отчет</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    @font-face {
        font-family: "DejaVu Sans";
        font-style: normal;
        font-weight: 400;
        font-size: 11px;
        src: url("/fonts/TimesNewRoman/times_new_roman.ttf");
        /* IE9 Compat Modes */
        src:
        local("DejaVu Sans"),
        local("DejaVu Sans"),
        url("/fonts/TimesNewRoman/times_new_roman.ttf") format("truetype");
    }
    body {
      font-family: "DejaVu Sans";
      font-size: 11px;
    }
    table, tr, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
    }
   .flex-center{
       display: flex;
       justify-content: center;
       align-items: center;
   }
    .main{
        /*width: 595px;*/
    }
    .underline{
        text-decoration: underline;
    }
    .head{
        margin-left: 350px;
        /*font-family: 'Times New Roman ';*/

    }
    .text{
        font-size: 11px;
        margin-left: 111px;
    }
    .form-text{
        font-size: 11px;
        margin-left: 100px;
    }
    .form_parag{
        font-size: 14px;
        /*font-family: 'Times New Roman';*/
        /*margin-left: -60px;*/
        font-weight: bold;
        text-align: center;
    }
    .parag1{
        font-size: 11px;
        margin-left: 58px;

    }
    .parag1 span{
        font-size: 11px;

    }
    .answer{
        text-decoration: underline;
        font-size: 11px !important;
        /*font-family: 'Times New Roman bold';*/


    }
    .statement{
        font-size: 11px !important;
        /*margin-left: 322px;*/
        text-align: center;
        /*font-family: 'Times New Roman bold';*/

    }
    p{
        font-size: 11px;
        margin-bottom: 0.00005rem !important;
    }
    .podp {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: evenly;
    }
    .podp_podp{
        text-decoration: overline;
        margin-left: 623px;
        margin-top: -14px;
    }
    .podp_data{
        text-decoration: overline;
        margin-right: 523px;
        margin-top: -14px;
    }
    .qr_code{
        position:absolute;
        left:20px;
        right:20px;
        padding:10px 0 -5px 0;
        text-align:right;
    }
    .qr_code img{
        width:150px;
        height:150px;
        /*border:1px solid rgba(0,0,0,0.12)*/
    }
    .checkmark {
        font-size: 16px;
    }
</style>
<body class="flex-center">
    <div class="qr_code">
    </div>
    <div class="main">
        <p class="form_parag">
        {{ __('testing_order.title_1_1') }} <br/>{{ __('testing_order.title_1_2') }}
        </p>
        <div class="head">
            <div style=" max-width: 330px;">
                <p class="parag1">
                    <span>Ф. 02-08-02-2</span><br/>
                    <span style="font-weight: bold">{{ __('testing_order.title_2') }}</span><br/>
                    <span>{{ __('testing_order.title_3') }}</span><br/>
                    <span>{{ __('testing_order.title_4') }}</span><br/>
                    <span>{{ __('testing_order.title_5') }}</span><br/>
                    <span>{{ __('testing_order.title_6') }}</span><br/>
                    <span>{{ __('testing_order.title_7') }}</span><br/>
                    <span>{{ __('testing_order.title_8') }}</span><br/>
                    <span>{{ __('testing_order.title_9') }}</span><br/>
                    <span>{{ __('testing_order.title_10') }}</span><br/>
                    <span class="answer">{{$user->surname}} {{$user->name}} {{$user->middlename}}</span><br>
                    <span>({{ __('testing_order.title_11') }})</span>
                    <br>
                    <span class="answer">{{$user->details->job_org}} {{$user->details->job_position}}</span><br>
                    <span>({{ __('testing_order.title_12') }})</span>
                    <br>
                    <span class="answer">{{$user->details->living_address}}</span><br>
                    <span>({{ __('testing_order.title_13') }})</span>
                    <br>
                    <span class="answer">{{$user->details->iin}}</span><br>
                    <span>({{ __('testing_order.title_14') }})</span>
                    <br>
                    <span class="answer">{{$user->details->email}}, {{$user->details->mobile_phone}}</span><br>
                    <span> ({{ __('testing_order.title_15') }})</span>
                </p>

            </div>
        </div>
    <div>
        <br/>
        <br/>
        <div class=" statement">
            <span style="font-weight: bold; text-align: center">
            {{ __('testing_order.title_16') }}<br/>
            {{ __('testing_order.title_17') }}<br/>
            {{ __('testing_order.title_18') }}<br/>
            {{ __('testing_order.title_19') }}<br/>
            {{ __('testing_order.title_20') }}
            @if(Config::get('app.locale') == 'kk') <br/>{{ __('testing_order.title_20_1') }} @endif
            </span>
        </div>
    </div>
    <h3 class="mbot-20 center"></h3>
    <p>{{ __('testing_order.parag_1') }}</p>
    <ul style="margin-top: -2px; margin-bottom: -5px">
        <li>
        {{ __('testing_order.parag_2') }} @if($testing_order->category_id=='1')<span class="checkmark">&#x2713;</span>@endif
        </li>
        <li>
        {{ __('testing_order.parag_3') }} @if($testing_order->category_id=='2')<span class="checkmark">&#x2713;</span>@endif
        </li>
        <li>
        {{ __('testing_order.parag_4') }} @if($testing_order->category_id=='3')<span class="checkmark">&#x2713;</span>@endif
        </li>
        <li>
        {{ __('testing_order.parag_5') }} @if($testing_order->category_id=='4')<span class="checkmark">&#x2713;</span>@endif
        </li>
    </ul>
    <p>{{ __('testing_order.parag_6') }} <span class="answer">{{$user->details->stazh_project_man}}</span> {{ __('testing_order.parag_6_1') }},
    {{ __('testing_order.parag_7') }}<span class="answer">{{$user->details->stazh_gos}}</span> {{ __('testing_order.parag_6_1') }}
    </p>
    <p>{{ __('testing_order.parag_8') }} <span class="answer">{{$testing_order->desired_test_date}}</span></p>
    <?php
        $name = Config::get('app.locale') == 'ru' || Config::get('app.locale') == 'en'
            ? 'name_ru'
            : 'name_kk';
    ?>
    <p>{{ __('testing_order.parag_9') }} <span class="answer">{{$testing_order->lang->$name}}</span></p>
    <br/>
    <br/>
    <p style="font-weight: bold">{{ __('testing_order.parag_10') }}</p>
    <p>{{ __('testing_order.parag_11') }}</p>
    <p>{{ __('testing_order.parag_12') }}</p>
    <p>{{ __('testing_order.parag_13') }}</p>
    <p>{{ __('testing_order.parag_14') }}</p>
    <br/>
    <br/>
    <table>
        <tr>
            <td>&#x2713;</td>
            <td>{{ __('testing_order.table_row_1') }}</td>
        </tr>
        <tr>
            <td>&#x2713;</td>
            <td>{{ __('testing_order.table_row_2') }}</td>
        </tr>
        <tr>
            <td>&#x2713;</td>
            <td>{{ __('testing_order.table_row_3') }}</td>
        </tr>
        <tr>
            <td>&#x2713;</td>
            <td>
                {{ __('testing_order.table_row_4_1') }}
                <br/>{{ __('testing_order.table_row_4_2') }}
                <br/>{{ __('testing_order.table_row_4_3') }}
                <br/>{{ __('testing_order.table_row_4_4') }}
                <br/>{{ __('testing_order.table_row_4_5') }}
                <br/>{{ __('testing_order.table_row_4_6') }}
            </td>
        </tr>
    </table>
    <br>
    <br>
    <p>{{ __('testing_order.table_footer_1') }}</p>
    <p>{{ __('testing_order.table_footer_2') }}</p>
    <p>{{ __('testing_order.table_footer_3') }}</p>
    @if(Config::get('app.locale') == 'ru') <p>{{ __('testing_order.table_footer_4') }}</p> @endif

    <br/>
    <br/>
    <br/>
    <div class="podp">
        <div class="podp_data">({{ __('testing_order.date') }})</div>
        <div class="podp_podp">({{ __('testing_order.signature') }})</div>
    </div>
</body>
</html>