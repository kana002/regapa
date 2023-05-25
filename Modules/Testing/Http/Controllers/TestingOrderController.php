<?php

namespace Modules\Testing\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Region;
use App\Models\Lang;
use App\Models\Test;
use App\Models\TestCategory;
use App\Models\TestingOrder;
use App\Models\TestingOrderDoc;
use App\Models\TestingOrderCert;
use App\Models\TestingOrderExperience;
use App\Models\TestingOrderStep;
use App\Models\JobOrganisation;
use App\Models\UserDetail;
use App\Models\User;
use App\Models\UserSign;
use Carbon\Carbon;
use PDF;

class TestingOrderController extends Controller
{
    /**
     * Все заявки тестирования
     */
    public function index()
    {
        $user = Auth::user();
        $testing_orders = TestingOrder::where('user_id', $user->id)->get();
        $testing_categories = TestCategory::all();
        $test_steps = null;
        return view('testing::order.index', compact('user', 'testing_orders', 'testing_categories', 'test_steps'));
    }

    // Страницы с формами для создания новой заявки

    public function create_step_1(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        $user = Auth::user();
        $test_steps = null;
        $job_orgs = JobOrganisation::where('reg_id', $user->region_id)->orderBy('org_name')->get();
        $testing_order = TestingOrder::where('test_gen', request()->session()->get('cur_test_gen'))->first();
        if($testing_order != null)
        {
            $testing_order_step_1 = TestingOrderStep::where('test_gen', $testing_order->test_gen)->value('step_1');
            if($testing_order_step_1)
            {
                return Redirect::route('testing.edit_order.step_1', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 1');
            }
        }
        return view('testing::order.create_step_1', compact('user', 'job_orgs', 'test_steps'));
    }

    public function create_step_2(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        if($request->test_gen == null) return Redirect::back();
        //return request()->session()->get('cur_test_gen');
        $locale = 'name_'.app()->getLocale();
        $user = Auth::user();
        $regions = Region::all();
        $langs = Lang::all();
        $testing_order = TestingOrder::where('test_gen', request()->session()->get('cur_test_gen'))->first();
        if($testing_order != null)
        {
            $testing_order_step_2 = TestingOrderStep::where('testing_order_id', $testing_order->id)->value('step_2');
            if($testing_order_step_2)
            {
                return Redirect::route('testing.edit_order.step_2', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 2');
            }
        }
        $test_categories = TestCategory::all();
        return view('testing::order.create_step_2', compact('user', 'regions', 'langs', 'test_categories', 'locale', 'testing_order'));
    }

    public function create_step_3(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        if($request->test_gen == null) return Redirect::back();
        $user = Auth::user();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        $testing_order_step_3 = TestingOrderStep::where('testing_order_id', $testing_order->id)->value('step_3');
        if($testing_order_step_3)
        {
            return Redirect::route('testing.edit_order.step_3', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 3');
        }
        return view('testing::order.create_step_3', compact('user'));
    }

    public function create_step_4(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        if($request->test_gen == null) return Redirect::back();
        $user = Auth::user();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        $docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
        $testing_order_step_4 = TestingOrderStep::where('testing_order_id', $testing_order->id)->value('step_4');
        if($testing_order_step_4)
        {
            return Redirect::route('testing.edit_order.step_4', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 4');
        }
        return view('testing::order.create_step_4', compact('user', 'docs'));
    }

    public function create_step_5(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        if($request->test_gen == null) return Redirect::back();
        $user = Auth::user();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        $exp_spravka = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('exp_spravka');
        return view('testing::order.create_step_5', compact('user', 'exp_spravka'));
    }



    // Редактирование существующей заявки
    public function edit_step_1(Request $request, $test_gen)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $test_gen);
        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $regions = Region::all();
        $langs = Lang::all();
        $test_categories = TestCategory::all();
        $job_orgs = JobOrganisation::where('reg_id', $user->region_id)->orderBy('org_name')->get();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();

        return view('testing::order.edit_step_1', compact('user', 'regions', 'langs', 'testing_order', 'test_categories', 'job_orgs'));
    }

    public function edit_step_2(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        $locale = 'name_'.app()->getLocale();
        $user = Auth::user();
        $regions = Region::all();
        $langs = Lang::all();
        $test_categories = TestCategory::all();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        return view('testing::order.edit_step_2', compact('user', 'regions', 'langs', 'testing_order', 'test_categories', 'locale'));
    }

    public function get_test_date(Request $request)
    {
        $tests = Test::where('test_category_type_id', $request->test_cat)
        ->where('reg_id', $request->test_reg)
        ->where('test_lang_id', $request->test_lang)
        ->where('test_date', '>', Carbon::now()->toDateTimeString())
        ->get();
        return $tests;
    }

    public function edit_step_3(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        $user = Auth::user();
        $regions = Region::all();
        $langs = Lang::all();
        $testing_categories = TestCategory::all();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        $exp = TestingOrderExperience::where('testing_order_id', $testing_order->id)->first();
        if($exp == null)
        {
            return Redirect::route('testing.new_order.step_3', ['test_gen' => request()->session()->get('cur_test_gen')])->with('message', 'New order step 3');
        }

        return view('testing::order.edit_step_3', compact('user', 'regions', 'langs', 'testing_order', 'exp'));
    }

    public function edit_step_4(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        $user = Auth::user();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        $docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
        $certs = TestingOrderCert::where('testing_order_id', $testing_order->id)->get();
        if($docs == null || $certs == [])
        {
            return Redirect::route('testing.new_order.step_4', ['test_gen' => request()->session()->get('cur_test_gen')])->with('message', 'New order step 4');
        }
        return view('testing::order.edit_step_4', compact('user', 'testing_order', 'docs', 'certs'));
    }

    public function edit_step_5(Request $request)
    {
        request()->session()->forget('cur_test_gen');
        request()->session()->put('cur_test_gen', $request->test_gen);
        $empty_steps = '123';
        $steps_list = [];
        $user = Auth::user();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->first();
        $exp_spravka = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('exp_spravka');
        $testing_order_steps = TestingOrderStep::where('testing_order_id', $testing_order->id)->first();
        if($testing_order_steps->step_1 == 0
            || $testing_order_steps->step_2 == 0
            || $testing_order_steps->step_3 == 0
            || $testing_order_steps->step_4 == 0)
        {
            $empty_steps = 'Заполните недостающие шаги, пожалуйста.';
            if($testing_order_steps->step_1 == 0) $steps_list[] = 'Шаг 1';
            if($testing_order_steps->step_2 == 0) $steps_list[] = 'Шаг 2';
            if($testing_order_steps->step_3 == 0) $steps_list[] = 'Шаг 3';
            if($testing_order_steps->step_4 == 0) $steps_list[] = 'Шаг 4';
        }
        return view('testing::order.edit_step_5', compact('user', 'exp_spravka', 'empty_steps', 'steps_list'));
    }


    public function update_step_1(Request $request, $test_gen)
    {
        $user = Auth::user();

        User::where('id', $user->id)->update([
            'surname' => $request->surname,
            'name' => $request->name,
            'middlename' => $request->middlename,
        ]);

        $user_details = UserDetail::where('user_id', $user->id)->get();
        if(count($user_details) == 0)
        {
            UserDetail::create([
                'birthday' => $request->birth_date,
                'living_address' => $request->living_address,
                'iin' => $request->iin,
                'stazh_gos' => $request->stazh_gos,
                'stazh_project_man' => $request->stazh_project_man,
                'job_org' => $request->job_org,
                'job_position' => $request->job_position,
                'mobile_phone' => $request->telephone,
                'email' => $request->email,
                'user_id' => $user->id,
            ]);
        }
        else
        {
            UserDetail::where('user_id', $user->id)->update([
                'birthday' => $request->birth_date,
                'living_address' => $request->living_address,
                'iin' => $request->iin,
                'stazh_gos' => $request->stazh_gos,
                'stazh_project_man' => $request->stazh_project_man,
                'job_org' => $request->job_org,
                'job_position' => $request->job_position,
                'mobile_phone' => $request->telephone,
                'email' => $request->email,
            ]);
        }

        return Redirect::route('testing.edit_order.step_2', ['test_gen' => $request->test_gen])->with('message', 'Saved existing');
    }



    // Обновление существующей заявки
    // Обновление шага 2
    // Обновление шага 3
    public function update_step_3(Request $request, $test_gen)
    {
        $user = Auth::user();
        $testing_order = TestingOrder::where('user_id', $user->id)
            ->where('test_gen', $test_gen)
            ->first();
        if($testing_order->status_id == '0' || ($testing_order->status_id == 2 && $testing_order->reason != null))
        {
            // Удаляем существующие опыты работы
            TestingOrderExperience::where('testing_order_id', $testing_order->id)->delete();

            // Создаем новые опыты работы
            $experience = TestingOrderExperience::create([
                'user_id' => $user->id,
                'testing_order_id' => $testing_order->id,
                'date_start' => $request->period_date_1,
                'date_end' => $request->period_date_2,
                'org_name' => $request->exp_org,
                'project_name' => $request->exp_project_name,
                'project_role' => $request->exp_project_role,
                'exp_stazh_s_uchetom_zagruzki' => $request->exp_stazh_s_uchetom_zagruzki,
                'achievements' => $request->exp_achievements,
            ]);

            // Удаление существующей справки из локального пространства
            $spravka = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('exp_spravka');
            if( $spravka!= null) Storage::delete($spravka);

            // Выгрузка и сохранение в файл новой справки
            $pdf = PDF::loadView('testing::order.experience_spravka',compact('user', 'experience'))->setOptions(['defaultFont' => 'arial']);

            $path_spravka = 'public/testing/exp_spravki/'.$user->id
            .'/'.$testing_order->test_gen.'/'.$user->name.'_'.$user->surname.'_spravka.pdf';
            Storage::put($path_spravka, $pdf->output());

            $exists = Storage::exists($path_spravka);

            // Запись пути новой справки в таблицу
            if($exists)
            {
                $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
                if($testing_order_docs)
                {
                    $testing_order_docs->update([
                        'exp_spravka' => $path_spravka,
                    ]);
                }
                else
                {
                    TestingOrderDoc::create([
                        'user_id' => $user->id,
                        'testing_order_id' => $testing_order->id,
                        'exp_spravka' => $path_spravka,
                    ]);
                }
            }

            return Redirect::route('testing.edit_order.step_4', ['test_gen' => $test_gen])->with('message', 'Saved existing');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    // Обновление шага 4
    public function update_step_4(Request $request, $test_gen)
    {
        $user = Auth::user();
        $testing_order = TestingOrder::where('user_id', $user->id)
            ->where('test_gen', $test_gen)
            ->first();
        if($testing_order->status_id == '0' || ($testing_order->status_id == 2 && $testing_order->reason != null))
        {
            // 1 - Доки
            $path_udost = null;
            $path_edu = null;
            $path_exp_spravka_signed = null;
            $path_receipt = null;
            $path_cert = null;

            // Удаляем существующие доки
            //TestingOrderDoc::where('testing_order_id', $testing_order->id)->delete();

            $udost = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('udost');
            $edu = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('education');
            $spravka_signed = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('exp_spravka_signed');
            $receipt = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('payment_receipt');

            // Сохраняем файлы в локальной папке
            if($request->hasFile('udost'))
            {
                // Удаление существующих доков из локального пространства
                if($udost!= null) Storage::delete($udost);

                $originalname = $request->file('udost')->getClientOriginalName();
                $path_udost = 'public/testing/udost/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('udost')->storeAs('public/testing/udost/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            else return 'Удостоверение не загрузилось.';

            if($request->hasFile('education'))
            {
                if($edu!= null) Storage::delete($edu);

                $originalname = $request->file('education')->getClientOriginalName();
                $path_edu = 'public/testing/education/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('education')->storeAs('public/testing/education/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            else return 'Документ об образовании не загрузился.';

            if($request->hasFile('spravka'))
            {
                if($spravka_signed != null) Storage::delete($spravka_signed);

                $originalname = $request->file('spravka')->getClientOriginalName();
                $path_exp_spravka_signed = 'public/testing/exp_spravki_signed/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('spravka')->storeAs('public/testing/exp_spravki_signed/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            else return 'Подписанная справка не загрузилась.';

            if($request->hasFile('payment_receipt'))
            {
                if($receipt != null) Storage::delete($receipt);

                $originalname = $request->file('payment_receipt')->getClientOriginalName();
                $path_receipt = 'public/testing/payment_receipt/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('payment_receipt')->storeAs('public/testing/payment_receipt/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }

            // Если файлы(удост, диплом, подписанная справка) сохранились(проверка на существование файла по пути), создаем новые доки
            if(Storage::exists($path_udost) && Storage::exists($path_edu) && Storage::exists($path_exp_spravka_signed))
            {
                $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
                if($testing_order_docs)
                {
                    $testing_order_docs->update([
                        'udost' => $path_udost,
                        'exp_spravka_signed' => $path_exp_spravka_signed,
                        'education' => $path_edu,
                    ]);
                }
                else
                {
                    TestingOrderDoc::create([
                        'user_id' => $user->id,
                        'testing_order_id' => $testing_order->id,
                        'udost' => $path_udost,
                        'exp_spravka_signed' => $path_exp_spravka_signed,
                        'education' => $path_edu,
                    ]);
                }
            }
            else return 'Основные документы не загрузились.';

            // Если файл(чек об оплате) сохранился(проверка на существование файла по пути), обновляем док строку
            if(Storage::exists($path_receipt))
            {
                $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
                if($testing_order_docs)
                {
                    $testing_order_docs->update([
                        'payment_receipt' => $path_receipt,
                    ]);
                }
                else
                {
                    TestingOrderDoc::create([
                        'user_id' => $user->id,
                        'testing_order_id' => $testing_order->id,
                        'payment_receipt' => $path_receipt,
                    ]);
                }
            }

            //  2 - Сертификаты
            // Удаляем существующие сертификаты
            TestingOrderCert::where('testing_order_id', $testing_order->id)->delete();

            // Удаление существующих сертификатов из локального пространства
            $cert = TestingOrderCert::where('testing_order_id', $testing_order->id)->value('certificate');
            if($cert != null)
            {
                $cert = TestingOrderCert::where('testing_order_id', $testing_order->id)->value('certificate')->toArray();
                if(count($cert)!= 0)
                {
                    foreach($cert as $c) Storage::delete($c);
                }
            }

            if($request->hasFile('certs'))
            {
                foreach($request->file('certs') as $cert)
                {
                    $originalname = $cert->getClientOriginalName();
                    $path_cert = 'public/testing/certs/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                    $cert->move(storage_path().'/app/public/testing/certs/'.$user->id.'/'.$testing_order->test_gen.'/', $originalname);

                    if(Storage::exists($path_cert))
                    {
                        TestingOrderCert::create([
                            'user_id' => $user->id,
                            'testing_order_id' => $testing_order->id,
                            'certificate' => $path_cert,
                        ]);
                    }
                    else return 'Сертификат '.$originalname.' не загрузился. Обратитесь в службу поддержки, пожалуйста.';
                }
            }

            TestingOrderStep::where('testing_order_id', $testing_order->id)->update([
                'step_4' => 1,
            ]);

            return Redirect::route('testing.edit_order.step_5', ['test_gen' => $test_gen])->with('message', 'Saved existing step 4');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }


    //  Сохранение заявки
    /**
     * Шаг 1 - Личные данные
     * 1 - Обновляет ФИО пользователя
     * Таблица: users
     * -----
     * 2 - Создает тестовую заявку
     * Таблица: testing_order
     * Принимает инфу для колонок: birthday, living_address, iin, stazh_gos,
     * stazh_project_man, job_org, job_position, mobile_phone, email, user_id
     */
    public function store_step_1(Request $request)
    {
        $user = Auth::user();
        $testing_order_gen_id_last = TestingOrder::orderBy('id', 'desc')->limit(1)->value('test_gen');

        if($testing_order_gen_id_last == null) $testing_order_gen_id_last = 1;
        else $testing_order_gen_id_last += 1;

        User::where('id', $user->id)->update([
            'surname' => $request->surname,
            'name' => $request->name,
            'middlename' => $request->middlename,
        ]);


        $user_details = UserDetail::where('user_id', $user->id)->get();
        if(count($user_details) == 0)
        {
            UserDetail::create([
                'birthday' => $request->birth_date,
                'living_address' => $request->living_address,
                'iin' => $request->iin,
                'stazh_gos' => $request->stazh_gos,
                'stazh_project_man' => $request->stazh_project_man,
                'job_org' => $request->job_org,
                'job_position' => $request->job_position,
                'mobile_phone' => $request->telephone,
                'email' => $request->email,
                'user_id' => $user->id,
            ]);
        }
        else
        {
            UserDetail::where('user_id', $user->id)->update([
                'birthday' => $request->birth_date,
                'living_address' => $request->living_address,
                'iin' => $request->iin,
                'stazh_gos' => $request->stazh_gos,
                'stazh_project_man' => $request->stazh_project_man,
                'job_org' => $request->job_org,
                'job_position' => $request->job_position,
                'mobile_phone' => $request->telephone,
                'email' => $request->email,
            ]);
        }

        $testing_order = TestingOrder::where('user_id', $user->id)
            ->where('iin', $request->iin)
            ->where('status_id', 0)
            ->first();

        if($testing_order == null)
        {
            $new_testing_order = TestingOrder::create([
                'test_gen' => $testing_order_gen_id_last,
                'reg_id' => $user->region_id,
                'iin' => $request->iin,
                'user_id' => $user->id,
                'status_id' => 0
            ]);

            TestingOrderStep::create([
                'user_id' => $user->id,
                'testing_order_id' => $new_testing_order->id,
                'step_1' => 1,
            ]);

            return Redirect::route('testing.new_order.step_2', ['test_gen' => $new_testing_order->test_gen])->with('message', 'Saved new');
        }
        else return Redirect::route('testing.new_order.step_2', ['test_gen' => $testing_order->test_gen])->with('message', 'Saved existing');
    }



    /**
     * Шаг 2 - О тесте
     * Добавляет в / обновляет существующую редактируемую(т.е status_id=0) заявку
     * Таблица: testing_order
     * Принимает инфу для колонок: category_id, desired_test_date, reg_id, lang_id
     */
    public function store_step_2(Request $request, $test_gen)
    {
        $user = Auth::user();
        $testing_order = TestingOrder::where('user_id', $user->id)
            ->where('test_gen', $test_gen)
            ->first();
        if($testing_order->status_id == '0' || ($testing_order->status_id == 2 && $testing_order->reason != null))
        {
            $testing_order->update([
                'category_id' => $request->test_category,
                'desired_test_date' => $request->test_desired_date,
                'reg_id' => $request->test_region,
                'lang_id' => $request->test_lang,
            ]);

            TestingOrderStep::where('testing_order_id', $testing_order->id)->update([
                'step_2' => 1,
            ]);

            $referer_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
            if($referer_route == 'testing.edit_order.step_2') return Redirect::route('testing.edit_order.step_3', ['test_gen' => $test_gen])->with('message', 'Saved existing');
            else return Redirect::route('testing.new_order.step_3', ['test_gen' => $test_gen])->with('message', 'Saved existing');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    /**
     * Шаг 3 - Опыт работы в проектном менеджменте
     * Добавляет в / обновляет существующую редактируемую(т.е status_id=0) заявку
     * Таблица: testing_order_experiences
     * Принимает инфу для колонок: user_id, testing_order_id, date_start, date_end,
     * org_name, project_name, project_role, exp_stazh_s_uchetom_zagruzki, achievements
     */
    public function store_step_3(Request $request, $test_gen)
    {
        $user = Auth::user();
        $testing_order = TestingOrder::where('user_id', $user->id)
            ->where('test_gen', $test_gen)
            ->first();
        if($testing_order->status_id == '0' || ($testing_order->status_id == 2 && $testing_order->reason != null))
        {
            // Удаляем существующие опыты работы
            TestingOrderExperience::where('testing_order_id', $testing_order->id)->delete();

            // Создаем новые опыты работы
            $experience = TestingOrderExperience::create([
                'user_id' => $user->id,
                'testing_order_id' => $testing_order->id,
                'date_start' => $request->period_date_1,
                'date_end' => $request->period_date_2,
                'org_name' => $request->exp_org,
                'project_name' => $request->exp_project_name,
                'project_role' => $request->exp_project_role,
                'exp_stazh_s_uchetom_zagruzki' => $request->exp_stazh_s_uchetom_zagruzki,
                'achievements' => $request->exp_achievements,
            ]);

            // Выгрузка и сохранение в файл новой справки
            $pdf = PDF::loadView('testing::order.experience_spravka',compact('user', 'experience'))->setOptions(['defaultFont' => 'arial']);

            $path_spravka = 'public/testing/exp_spravki/'.$user->id
            .'/'.$testing_order->test_gen.'/'.$user->name.'_'.$user->surname.'_spravka.pdf';
            Storage::put($path_spravka, $pdf->output());

            $exists = Storage::exists($path_spravka);

            // Запись пути новой справки в таблицу
            if($exists)
            {
                $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
                if($testing_order_docs)
                {
                    $testing_order_docs->update(['exp_spravka' => $path_spravka]);
                }
                else
                {
                    TestingOrderDoc::create([
                        'user_id' => $user->id,
                        'testing_order_id' => $testing_order->id,
                        'exp_spravka' => $path_spravka,
                    ]);
                }

                TestingOrderStep::where('testing_order_id', $testing_order->id)->update([
                    'step_3' => 1,
                ]);
                return Redirect::route('testing.new_order.step_4', ['test_gen' => $test_gen])->with('message', 'Saved existing');
            }
            else return 'Не удалось найти файл';
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    /**
     * Шаг 4 - Документы
     * Добавляет в / обновляет существующую редактируемую(т.е status_id=0) заявку
     * 1 - Добавляет в таблицу testing_order_docs удостоверение, док. об образовании, чек об оплате
     * Принимает инфу для колонок: user_id, testing_order_id, udost, education, payment_receipt
     * -----
     * 2 - Добавляет в таблицу testing_order_certs сертификаты
     * Принимает инфу для колонок: user_id, testing_order_id, certification
     */
    public function store_step_4(Request $request, $test_gen)
    {
        $user = Auth::user();
        $testing_order = TestingOrder::where('user_id', $user->id)
            ->where('test_gen', $test_gen)
            ->first();
        if($testing_order->status_id == '0' || ($testing_order->status_id == 2 && $testing_order->reason != null))
        {
            // 1 - Доки
            $path_udost = null;
            $path_edu = null;
            $path_exp_spravka_signed = null;
            $path_receipt = null;
            $path_cert = null;

            // Удаляем существующие доки
            //TestingOrderDoc::where('testing_order_id', $testing_order->id)->delete();

            $udost = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('udost');
            $edu = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('education');
            $spravka_signed = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('exp_spravka_signed');
            $receipt = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('payment_receipt');

            // Сохраняем файлы в локальной папке
            if($request->hasFile('udost'))
            {
                // Удаление существующих доков из локального пространства
                if($udost!= null) Storage::delete($udost);

                $originalname = $request->file('udost')->getClientOriginalName();
                $path_udost = 'public/testing/udost/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('udost')->storeAs('public/testing/udost/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            else return 'Удостоверение не загрузилось.';

            if($request->hasFile('education'))
            {
                if($edu!= null) Storage::delete($edu);

                $originalname = $request->file('education')->getClientOriginalName();
                $path_edu = 'public/testing/education/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('education')->storeAs('public/testing/education/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            else return 'Документ об образовании не загрузился.';

            if($request->hasFile('spravka'))
            {
                if($spravka_signed != null) Storage::delete($spravka_signed);

                $originalname = $request->file('spravka')->getClientOriginalName();
                $path_exp_spravka_signed = 'public/testing/exp_spravki_signed/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('spravka')->storeAs('public/testing/exp_spravki_signed/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            else return 'Подписанная справка не загрузилась.';

            if($request->hasFile('payment_receipt'))
            {
                if($receipt != null) Storage::delete($receipt);

                $originalname = $request->file('payment_receipt')->getClientOriginalName();
                $path_receipt = 'public/testing/payment_receipt/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                $request->file('payment_receipt')->storeAs('public/testing/payment_receipt/'.$user->id
                .'/'.$testing_order->test_gen, $originalname, 'local');
            }
            //return Storage::exists($path_exp_spravka_signed);

            // Если файлы(удост, диплом, подписанная справка) сохранились(проверка на существование файла по пути), создаем новые доки
            if(Storage::exists($path_udost) && Storage::exists($path_edu) && Storage::exists($path_exp_spravka_signed))
            {
                $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
                if($testing_order_docs)
                {
                    $testing_order_docs->update([
                        'udost' => $path_udost,
                        'education' => $path_edu,
                        'exp_spravka_signed' => $path_exp_spravka_signed
                    ]);
                }
                else
                {
                    TestingOrderDoc::create([
                        'user_id' => $user->id,
                        'testing_order_id' => $testing_order->id,
                        'udost' => $path_udost,
                        'education' => $path_edu,
                        'exp_spravka_signed' => $path_exp_spravka_signed
                    ]);
                }
            }
            else return 'Основные документы не загрузились.';

            // Если файл(чек об оплате) сохранился(проверка на существование файла по пути), обновляем док строку
            if(Storage::exists($path_receipt))
            {
                $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
                if($testing_order_docs)
                {
                    $testing_order_docs->update([
                        'payment_receipt' => $path_receipt,
                    ]);
                }
                else
                {
                    TestingOrderDoc::create([
                        'user_id' => $user->id,
                        'testing_order_id' => $testing_order->id,
                        'payment_receipt' => $path_receipt,
                    ]);
                }
            }

            //  2 - Сертификаты
            // Удаляем существующие сертификаты
            TestingOrderCert::where('testing_order_id', $testing_order->id)->delete();

            // Удаление существующих сертификатов из локального пространства
            $cert = TestingOrderCert::where('testing_order_id', $testing_order->id)->value('certificate');
            if($cert != null)
            {
                $cert = TestingOrderCert::where('testing_order_id', $testing_order->id)->value('certificate')->toArray();
                if(count($cert)!= 0)
                {
                    foreach($cert as $c) Storage::delete($c);
                }
            }

            if($request->hasFile('certs'))
            {
                foreach($request->file('certs') as $cert)
                {
                    $originalname = $cert->getClientOriginalName();
                    $path_cert = 'public/testing/certs/'.$user->id.'/'.$testing_order->test_gen.'/'.$originalname;
                    $cert->move(storage_path().'/app/public/testing/certs/'.$user->id.'/'.$testing_order->test_gen.'/', $originalname);

                    if(Storage::exists($path_cert))
                    {
                        TestingOrderCert::create([
                            'user_id' => $user->id,
                            'testing_order_id' => $testing_order->id,
                            'certificate' => $path_cert,
                        ]);
                    }
                    else return 'Сертификат '.$originalname.' не загрузился. Обратитесь в службу поддержки, пожалуйста.';
                }
            }

            TestingOrderStep::where('testing_order_id', $testing_order->id)->update([
                'step_4' => 1,
            ]);

            return Redirect::route('testing.new_order.step_5', ['test_gen' => $test_gen])->with('message', 'Saved new step 4');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }

    /**
     * Шаг 5 - Подписать сформированную заявку
     */
    public function store_step_5(Request $request, $test_gen)
    {
        return null;
    }



    /**
     * Выгрузить готовую заявку
     */
    public function getReadyOrder(Request $request, $test_gen)
    {
        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $testing_order = TestingOrder::where('test_gen', $test_gen)->with('lang')->first();

        $pdf = PDF::loadView('testing::order.ready_order_template', compact('user', 'testing_order'))
        ->setOptions(['defaultFont' => 'TimesNewRoman']);

        $testing_order_docs = TestingOrderDoc::where('testing_order_id', $testing_order->id)->first();
        if($testing_order_docs)
        {
            $old_path_order = $testing_order_docs->value('ready_order');
            if($old_path_order!= null) Storage::delete($old_path_order);

            $new_path_order = 'public/testing/orders/'.$user->id
                .'/'.$testing_order->test_gen.'_order.pdf';

            Storage::put($new_path_order, $pdf->output());

            $exists = Storage::exists($new_path_order);
            if($exists)
            {
                $testing_order_docs->update([
                    'ready_order' => $new_path_order
                ]);
            }
            else return 'Не удалось загрузить файл заявки.';

            return $pdf->stream($testing_order->test_gen.'_order.pdf');
        }
        else return 'Необходимо заполнить все поля для формирования заявки.';
        //return view('testing::order.ready_order_template', compact('user', 'testing_order'));
    }



    /**
     * Выгрузить готовую заявку в PDF
     */
    public function getReadyOrderPdf(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->with('lang')->first();

        $pdf = PDF::loadView('testing::order.ready_order_template', compact('user', 'testing_order'))
        ->setOptions(['defaultFont' => 'arial']);

        $old_path_order = TestingOrderDoc::where('testing_order_id', $testing_order->id)->value('ready_order');
        if($old_path_order!= null) Storage::delete($old_path_order);

        $new_path_order = 'public/testing/orders/'.$user->id
            .'/'.$testing_order->test_gen.'_order.pdf';

        Storage::put($new_path_order, $pdf->output());

        $exists = Storage::exists($new_path_order);
        if($exists)
        {
            TestingOrderDoc::updateOrCreate([
                'user_id' => $user->id,
                'testing_order_id' => $testing_order->id,
                'ready_order' => $new_path_order,
            ]);
        }
        else return 'Не удалось загрузить файл заявки.';

        //$pdf = PDF::loadView('testing::order.test_pdf')->setOptions(['defaultFont' => 'arial']);
        return response()->json(['pdf' => base64_encode($pdf->output())], 200);
    }



    /**
     * Подписать готовую заявку
     */
    public function signReadyOrder(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $testing_order = TestingOrder::where('test_gen', $request->test_gen)->with('lang')->first();
        $old_sign = UserSign::where('testing_order_id', $testing_order->id)->first();

        if($old_sign != null) $old_sign->delete();

        $new_sign = UserSign::updateOrCreate([
            'user_id' => $user->id,
            'testing_order_id' => $testing_order->id,
            'sign' => $request->sign,
            'signed_at' => Carbon::now()->toDateTimeString()
        ]);

        // Статус - Подписано
        $testing_order->update([
            'status_id' => 12
        ]);
        /*$user = User::where('id', Auth::user()->id)->with('details')->first();
        $testing_order = TestingOrder::where('test_gen', $test_gen)->with('lang')->first();
        return view('testing::order.ready_order_template', compact('user', 'testing_order'));*/
        return 'Подписано';

    }



    /**
     * Удалить заявку
     */
    public function deleteOrder(Request $request, $test_gen)
    {
        $testing_order = TestingOrder::where('test_gen', $test_gen)->first();
        if($testing_order->status_id == '0' || ($testing_order->status_id == 2 && $testing_order->reason != null)) $testing_order->delete();
        return redirect()->back();
    }
}
