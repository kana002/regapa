<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>PDF отчет</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Заявка</title>
        <style>
            @font-face {
                font-family: "DejaVu Sans";
                font-style: normal;
                font-weight: 400;
                font-size: 12px;
                src: url("/fonts/TimesNewRoman/times_new_roman.ttf");
                /* IE9 Compat Modes */
                src:
                local("DejaVu Sans"),
                local("DejaVu Sans"),
                url("/fonts/TimesNewRoman/times_new_roman.ttf") format("truetype");
            }
            body {
                font-family: "DejaVu Sans";
                font-size: 12px;
            }
            .menu {
                position: fixed;
                left:22.5cm;
                top: 0.5cm;
                background-color: lightblue;
            }
            .menu a {
                color: darkblue;
                text-decoration: underline dotted #fff;
                padding:4px 5px 2px 9px;
            }
            .gen {
                position: absolute;
                top: 0.5cm;
                right: 3cm;
                width: 5cm;
                border: 1px solid #000;
                text-align: center;
            }
            .delete {
                position: absolute;
                left: 0;
                top: 0;
                width: 21cm;
            }
            .a4 {
                width: 21cm;
                position: relative;
            }
            .shapka {
                position: absolute;
                top: 1cm;
                width: 9.8cm;
                height: 2.2cm;
            }
            .shapka img {
                width: 100%;
            }
            .title {
                text-align: right;
                position: absolute;
                right: 3cm;
                width: 6.5cm;
                top: 1.35cm;
            }
            .adres {
                position: absolute;
                top: 3.3cm;
                width: 5cm;
                font-size: 7pt;
            }
            .foto {
                width: 3cm;
                height: 4cm;
                position: absolute;
                right: 3cm;
                top: 4cm;
            }
            .foto img {
                width: 100%;
                height: 100%;
                object-fit: fill;
                image-rendering: auto;
            }
            .vid {
                position: absolute;
                left:0.5cm;
                top: 4.5cm;
                width: 11cm;
            }
            .srok {
                position: absolute;
                left:0.5cm;
                top: 6.5cm;
                width: 11cm;
            }
            .table {
                position: absolute;
                top: 8.0cm;
                left: 0.5cm;
                width: 17.5cm;
                text-align: center;
            }
            .table table {
                border-spacing: 0;
                border-collapse: collapse;
                width: 100%;
            }
            .table table td {
                border: 1px solid #000;
                width: 1.5cm;
                text-align: center;
            }

            .bold {
                font-weight: bold;
            }
            .h1 {
                display: block;
                margin-top: 15px;
            }
            .cont {
                text-align: left !important;
            }
            .stamp td {
                border-top-width: 0px !important;
            }
            .footer {
                position: relative;
                padding: 10px;
                text-align: left;
            }
            .podpis {
                font-size: 7pt;
                display: block;
            }
            .ruk {
                position: absolute;
                right: 0;
                top: 10px;
                display: block;
            }

            .category-wrap {
                padding: 15px;
                background: white;
                width: 200px;
                box-shadow: 2px 2px 8px rgba(0,0,0,.1);
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
            .category-wrap h3 {
                font-size: 16px;
                color: rgba(0,0,0,.6);
                margin: 0 0 10px;
                padding: 0 5px;
                position: relative;
            }
            .category-wrap h3:after {
                content: "";
                width: 6px;
                height: 6px;
                background: #80C8A0;
                position: absolute;
                right: 5px;
                bottom: 2px;
                box-shadow: -8px -8px #80C8A0, 0 -8px #80C8A0, -8px 0 #80C8A0;
            }
            .category-wrap ul {
                list-style: none;
                margin: 0;
                padding: 0;
                border-top: 1px solid rgba(0,0,0,.3);
            }
            .category-wrap li {
                margin: 12px 0 0 0px;
            }
            .category-wrap a {
                text-decoration: none;
                display: block;
                font-size: 13px;
                color: rgba(0,0,0,.6);
                padding: 5px;
                position: relative;
                transition: .3s linear;
            }
            .category-wrap a:hover {
                background: #80C8A0;
                color: white;
            }
            @media print {
                .category-wrap {visibility: hidden;}
            }
        </style>
    </head>
    <body>
        <div class=a4>
            <div class=gen>{{$order->gen}}</div>
            <div class=shapka>
                <img src="{{asset('images/order_template/logo.jpg')}}" alt="">
            </div>
            <div class=title>
                <span class=bold>ҚАТЫСУҒА ӨТІНІМ</span><br>
                    {{$order->theme_type->name_kz ?? ''}}
            </div>
            <div class=adres></div>
            <div class=foto>
                <img src="{{asset('storage/'.str_replace('public/', '', $order->photo)) ?? ''}}">
                {{--<img src="{{asset('storage/public/orders/photos/1.jpg') ?? ''}}">--}}
            </div>
            <div class=vid>
                <span class=bold>КУРС/СЕМИНАР</span>
                {{$order->theme->tema_kz}}
            </div>
            <div class=srok>
                <span class=bold>МЕРЗІМІ</span>
                {{$order->study_start_date}} - {{$order->study_end_date}}</div>
            <div class=table>
                <span class='bold'>ТЫҢДАУШЫНЫҢ ЖЕКЕ ДЕРЕКТЕРІ</span>
                <table>
                    <tr>
                        <td>Аты-жөні</td>
                        <td>Туған күні</td>
                        <td>Жеке идентификациялық нөмірі</td>
                    </tr>
                    <tr>
                        <td>{{$order->surname ?? ''}} {{$order->name ?? ''}} {{$order->middlename ?? ''}}</td>
                        <td>{{$order->birth_date}}</td>
                        <td>{{$order->iin}}</td>
                    </tr>
                </table>

                <span class='bold'>ЖҰМЫС ОРНЫ ТУРАЛЫ АҚПАРАТ</span>
                <table>
                    <tr>
                        <td>Министрлік, ведомство (әкімдік), департамент, басқарма, бөлім (толығымен)</td>
                        <td>Лауазымы</td>
                        <td>Санаты</td>
                        <td>Мемлекеттік қызмет өтілі, оның ішінде лауазымы бойынша</td>
                    </tr>
                    <tr>
                        <td>Жеке тұлға</td>
                        <td>{{$order->job_position ?? ''}}</td>
                        <td>{{$order->job_cat->code ?? ''}}</td>
                        <td>{{$order->stazh_gos ?? ''}}</td>
                    </tr>
                    <tr>
                        <td colspan=4><span class=bold>ОҚУҒА ЖОЛДАҒАН МЕМЛЕКЕТТІК ОРГАН БҰЙРЫҒЫНЫҢ КҮНІ МЕН НӨМІРІ</span></td>
                    </tr>
                    <tr>
                        <td colspan=4>{{$order->org_who_sent ?? ''}}</td>
                    </tr>
                    <tr>
                        <td colspan=4><span class=bold>НЕГІЗГІ ФУНКЦИОНАЛДЫҚ МІНДЕТТЕРІ (3-тен кем емес)</span></td>
                    </tr>
                    <tr>
                        <td colspan=4>{{$order->job_main_funcs ?? ''}}</td>
                    </tr>
                    @if ($order->theme_type->code == 'pkv' || $order->theme_type->code == 'pkp')
                        <tr>
                            <td colspan=4><span class=bold>БҰРЫН ОҚЫҒАНЫ ТУРАЛЫ АҚПАРАТ</span></td>
                        </tr>
                        <tr>
                            <td  colspan=2>Соңғы өткен біліктілікті арттыру семинарының тақырыбы</td>
                            <td  colspan=2>Өту мерзімі</td>
                        </tr>
                        <tr>
                            <td colspan=2>$order->expectations</td>
                            <td colspan=2>$order->expectations</td>
                        </tr>
                    @endif
                </table>

                <span class='bold'>КӘСІБИ ҚҰЗЫРЕТТЕР МЕН ДАҒДЫЛАРДЫ ДАМЫТУ БОЙЫНША КҮТІЛЕТІН НӘТИЖЕ</span>
                <br/>
                Біз нәтижеге бағдарланған бағдарламаларды әзірлеуге барынша мән береміз, сондықтан Сіздің семинардан күтетін нәтижелеріңіз біз үшін өте маңызды
                @if ($order->theme_type->code == 'ppm' || $order->theme_type->code == 'ppb')
                    <table>
                        <tr>
                            <td>Курс бағдарламасы бойынша қандай тақырыптарды оқығыңыз келеді</td>
                            <td>Аталған курс шеңберінде қандай құзыреттерді дамытқыңыз келеді</td>
                        </tr>
                        <tr>
                            <td>{{$order->expectations}}</td>
                            <td>{{$order->expectations}}</td>
                        </tr>
                    </table>
                @else
                    <table>
                        <tr>
                            <td>Семинар барысында басты назар аударатын (ескерілуі тиіс) тақырыптар мен сұрақтар</td>
                        </tr>
                        <tr>
                            <td>{{$order->expectations}}</td>
                        </tr>
                    </table>
                @endif

                <span class='bold'>БАЙЛАНЫС ДЕРЕКТЕРІ</span>
                <table>
                    <tr>
                        <td>Тыңдаушының байланыс деректері (жұмыс және ұялы, e-mail)</td>
                       
                    </tr>
                    <tr>
                        <td class=cont>ж. {{$order->student_tel_job ?? ''}}
                            <br>м. {{$order->student_tel_self ?? ''}}
                            <br>e. {{$order->student_email ?? ''}}
                        </td>
                     </tr>
                </table>

                <table class=stamp>
                    <tr>
                        <td>
                            <div class=footer>
                                Келісілді
                                <span class=ruk>{{$order->kadr_full_name ?? ''}}</span>
                                <span class=podpis>(мемлекеттік органның кадр қызметі басшысы)</span>
                            </div>
                        </td>
                        <td>
                            <div class=footer>
                                Келісілді
                                <span class=ruk>{{$order->student_boss_full_name ?? ''}}</span>
                                <span class=podpis>(тікелей басшы)</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>