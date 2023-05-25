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
        /*margin-left: 250px;*/
        text-align: right;
        font-weight: bold;
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
    td {
        text-align: center;
    }
    .podp {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: evenly;
        /*margin-left: 523px;*/
    }
    .podp_name{
        margin-left: 623px;
        margin-top: -14px;
    }
    .podp_podp{
        text-decoration: overline;
        margin-left: 523px;
        margin-top: -14px;
    }
    .podp_data{
        text-decoration: overline;
        margin-left: 323px;
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
        {{ __('spravka.title_1') }}
        </p>
        <div class="head">
            <div style="">
                <p class="parag1">
                    <span>Ф. 02-08-02-2</span><br/>
                </p>

            </div>
        </div>
    <div>
        <br/>
        <br/>
        <div class=" statement">
            <span style="font-weight: bold; text-align: center">
            {{ __('spravka.title_2') }} <br/>{{ __('spravka.title_2_1') }}
            </span>
            <br/>
            <br/>
            <span style="font-weight: bold; text-align: center">
            {{$user->surname}} {{$user->name}} {{$user->middlename}}</br>
            </span>
            <small><em>({{ __('spravka.title_3') }})</em></small>
        </div>
    </div>
    <br>
    <table>
        <tr>
            <th>№</th>
            <th>{{ __('spravka.table_col_1') }}</th>
            <th>{{ __('spravka.table_col_2') }}</th>
            <th>{{ __('spravka.table_col_3') }}</th>
            <th>{{ __('spravka.table_col_4') }}</th>
            <th>{{ __('spravka.table_col_5') }}</th>
            <th>{{ __('spravka.table_col_6') }}</th>
        </tr>
        <tr>
            <td>1</td>
            <td>{{$experience->date_start}} - {{$experience->date_end}}</td>
            <td>{{$experience->org_name}}</td>
            <td>{{$experience->project_name}}</td>
            <td>{{$experience->project_role}}</td>
            <td>{{$experience->exp_stazh_s_uchetom_zagruzki}}</td>
            <td>{{$experience->achievements}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ __('spravka.table_total') }}:</td>
            <td>{{$experience->exp_stazh_s_uchetom_zagruzki}}</td>
            <td></td>
        </tr>
    </table>
    <br/>
    <br/>
    <br/>
    <p>{{ __('spravka.ruk_1') }}<br/>/{{ __('spravka.ruk_2') }}</p>
    <p>
        <div class="podp">
            <div class="podp_podp">({{ __('spravka.signature') }})</div>
            <div class="podp_data">({{ __('spravka.full_name') }})</div>
        </div>
    </p>
    <p>M.П.</p>
</body>
</html>