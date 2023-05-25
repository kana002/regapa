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
        Форма заявления <br/>для физических лиц
        </p>
        <div class="head">
            <div style=" max-width: 330px;">
                <p class="parag1">
                    <span>Ф. 02-08-02-2</span><br/>
                    <span style="font-weight: bold">РГКП «Академия государственного управления при Президенте Республики Казахстан»</span><br/>
                    <span>БИН   090240000429</span><br/>
                    <span>ИИК  KZ666017111000000349</span><br/>
                    <span>КБЕ 16</span><br/>
                    <span>БИК   HSBKKZKX</span><br/>
                    <span>АО "Народный Банк Казахстана"</span><br/>
                    <span>юрид. адрес: г. Нур-Султан, ул. Абая 33 «а»</span><br/>
                    <span>тел.: 8(7172) 75-34-87</span><br/>
                    <span>ОПС ОП</span><br/>
                    <span>«Центр развития проектного менеджмента в государственном управлении»</span><br/>
                    от  <span class="answer">{{$all_orders->surname}} {{$all_orders->name}} {{$all_orders->middlename}}</span><br>
                    <span>(Ф.И.О. заявителя)</span>
                    <br>
                    <span class="answer">{{$all_orders->details->job_org}} {{$all_orders->details->job_position}}</span><br>
                    <span>(наименование организации (места работы), должность)</span>
                    <br>
                    <span class="answer">{{$all_orders->details->living_address}}</span><br>
                    <span>(адрес места жительства)</span>
                    <br>
                    <span class="answer">{{$all_orders->details->iin}}</span><br>
                    <span>(ИИН)</span>
                    <br>
                    <span class="answer">{{$all_orders->details->email}}, {{$all_orders->details->mobile_phone}}</span><br>
                    <span> (e-mail, телефон)</span>
                </p>

            </div>
        </div>
    <div>
        <br/>
        <br/>
        <div class=" statement">
            <span style="font-weight: bold; text-align: center">
                Заявление<br/>
                о присоединении<br/>
                к Договору об оказании услуг по организации и проведению сертификации для физических лиц<br/>
                (заявление об оказании услуг по организации и проведению сертификации)
            </span>
        </div>
    </div>
    <h3 class="mbot-20 center"></h3>
    <p>Представляю документы для проведения сертификации на соответствие требованиям профессионального стандарта СТ РК ISO 21500-2014 по категории (заявляемую область сертификации – отметить галочкой):</p>
    <ul style="margin-top: -2px; margin-bottom: -5px">
        <li>
            «Руководитель проекта» (схема 1) @if($all_orders->category_id=='1')<span class="checkmark">&#x2713;</span>@endif
        </li>
        <li>
            «Руководитель программы» (схема 2) @if($all_orders->category_id=='2')<span class="checkmark">&#x2713;</span>@endif
        </li>
        <li>
            «Руководитель портфелем» (схема 3) @if($all_orders->category_id=='3')<span class="checkmark">&#x2713;</span>@endif
        </li>
        <li>
            «Тренер-консультант» (схема 4) @if($all_orders->category_id=='4')<span class="checkmark">&#x2713;</span>@endif
        </li>
    </ul>
    <p>Стаж практической работы в области проектного менеджмента: <span class="answer">{{$all_orders->details->stazh_project_man}}</span> лет,
    в государственном секторе - <span class="answer">{{$all_orders->details->stazh_gos}}</span> лет
    </p>
    <p>Желаемая дата прохождения сертификации: <span class="answer">{{$all_orders->desired_test_date}}</span></p>
    <p>Язык прохождения сертификации: <span class="answer">{{$all_orders->lang->name_ru}}</span></p>
    <br/>
    <br/>
    <p style="font-weight: bold">Прилагаемые документы:</p>
    <p>Копия документа, удостоверяющего личность</p>
    <p>Копия документа об образовании</p>
    <p>Справка о стаже практической деятельности в данной области</p>
    <p>Копии документов о повышении квалификации (сертификаты) либо транскрипт</p>
    <br/>
    <br/>
    <table>
        <tr>
            <td>&#x2713;</td>
            <td>Обязуюсь соблюдать требования по сертификации и предоставлять любую информацию необходимую для проведения процедуры сертификации.</td>
        </tr>
        <tr>
            <td>&#x2713;</td>
            <td>Даю согласие на сбор, обработку, хранение персональных данных в соответствии с Законами РК «О персональных данных и их защите», «Об информатизации».</td>
        </tr>
        <tr>
            <td>&#x2713;</td>
            <td>Сведения, которые я сообщил(а) достоверны, обязуюсь в дальнейшем сообщать в ОПС ОП «Центр развития проектного менеджмента в государственном управлении» о всех изменения в моих личных данных, необходимых для процедуры сертификации.</td>
        </tr>
        <tr>
            <td>&#x2713;</td>
            <td> В соответствии со статьей 389 Гражданского кодекса Республики Казахстан, настоящим Заявлением о присоединении, которое признается и Заявлением об оказании услуг по организации и проведению сертификации (далее – Заявление), Заказчик/поверенный принимает условия Договора оказания услуг по организации и проведению сертификации (далее – Договор), в редакции, размещенной на официальном интернет-ресурсе РГКП «Академия государственного управления при Президенте Республики Казахстан» по состоянию на день его подписания, и подтверждает, что:

                <br/>1) Договор прочитан, принят Заказчиком/поверенным в полном объеме, без каких-либо замечаний и возражений, не содержит каких-либо обременительных для Заказчика/поверенного условий, которые, исходя из разумно понимаемых интересов Заказчика, не были бы приняты;

                <br/>2) настоящее Заявление в совокупности с Договором является Договором оказания услуг по организации и проведению сертификации;

                <br/>3) согласен на изменение и дополнение Академией Договора в одностороннем порядке путем размещения Договора в новой редакции, с учетом внесенных изменений и/или дополнений, на официальном интернет-ресурсе Академии;

                <br/>4) не вправе ссылаться на отсутствие подписи на Договоре, как доказательство того, что Договор не был Заказчиком/поверенным прочитан/принят, если у Академии имеется настоящее Заявление;

                <br/>5) Академией была предоставлена исчерпывающая информация об условиях предоставления услуг по организации и проведению сертификации по Договору, об ответственности и возможных рисках в случае невыполнения обязательств по Договору.
            </td>
        </tr>
    </table>
    <br>
    <br>
    <p>Примечание:</p>
    <p>- ОПС ОП уведомляет одним из возможных способов (лично, по телефону, почте, электронному адресу) заявителей о допуске, времени и месте проведения экзамена.</p>
    <p>- ОПС ОП может запросить любую информацию, которая необходима для проверки данных, требуемых для сертификации.</p>
    <p>- Оплата расходов на сертификацию осуществляется заявителем после проверки документов Центром и его соответствия установленным требованиям до начала проведения экзамена.</p>
    <br/>
    <br/>
    <br/>
    <div class="podp">
        <div class="podp_data">(Дата)</div>
        <div class="podp_podp">(Подпись)</div>
    </div>
</body>
</html>