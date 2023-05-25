<?php

namespace Modules\fiz\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use App\Models\ActiveYear;
use App\Models\Lang;
use App\Models\Order;
use App\Models\OrderStep;
use App\Models\Theme;
use App\Models\ThemeType;
use App\Models\JobCategory;
use App\Models\JobOrganisation;
use App\Models\Vaccine;
use App\Models\User;
use Carbon\Carbon;
use PDF;

class FizOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        //$themes = Theme::all();
        return view('fiz::order.index', compact('user', 'orders'));
    }



    // Страницы с формами для создания новой заявки

    public function create_step_1()
    {
        request()->session()->forget('cur_test_gen');
        $user = Auth::user();
        $job_categories = JobCategory::where('code', '!=', '')->get();
        $job_orgs = JobOrganisation::where('reg_id', $user->region_id)->orderBy('org_name')->get();
        $vaccines = Vaccine::all();
        return view('fiz::order.create_step_1', compact('user', 'job_categories', 'job_orgs', 'vaccines'));
    }



    public function create_step_2(Request $request)
    {
        $user = Auth::user();
        $langs = Lang::all();
        $order = Order::where('gen', $request->gen)->first();
        $theme_types = ThemeType::whereIn('code', ['pkp','pkv'])->get();
        $themes = Theme::where('reg_id', $user->region_id)->get();        

        $order_step_2 = OrderStep::where('order_id', $order->id)->value('step_2');
        if($order_step_2)
        {
            // return Redirect::route('fiz.edit_order.step_2', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 2');
        }
        return view('fiz::order.create_step_2', compact('user', 'langs', 'themes', 'theme_types'));
    }



    public function create_step_3(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('gen', $request->gen)->first();

        $order_step_3 = OrderStep::where('order_id', $order->id)->value('step_3');
        if($order_step_3)
        {
            //return Redirect::route('testing.edit_order.step_2', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 2');
        }
        return view('fiz::order.create_step_3', compact('user'));
    }



    public function create_step_4(Request $request)
    {
        request()->session()->forget('cur_gen');
        request()->session()->put('cur_gen', $request->gen);

        $user = Auth::user();
        $order = Order::where('gen', $request->gen)->first();
        return view('fiz::order.create_step_4', compact('user', 'order'));
    }



    //  TODO: написать функцию
    //  Сохранение заявки
    /**
     * Шаг 1 - Личные данные
     * 1 - Обновляет ФИО пользователя
     * Таблица: users
     * -----
     * 2 - Создает заявку
     * Таблица: order
     * Принимает инфу для колонок: ???
     */
    public function store_step_1(Request $request)
    {
        //dd($request);
        $request->validate([
            'photo' => 'required',
            'stazh_gos' => 'required',
            'job_org' => 'required',
            'job_category' => 'required',
            'job_position' => 'required',
            // 'main_funcs' => 'required',
            'vaccine' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'iin' => 'required',
        ]);

        $this_year = Carbon::now()->year;
        $active_year_id = ActiveYear::where('title', $this_year)->value('id');

        $user = Auth::user();
        $order_gen_id_last = Order::orderBy('id', 'desc')->limit(1)->value('gen');
        $path = null;

        if($order_gen_id_last == null) $order_gen_id_last = 1;
        else $order_gen_id_last += 1;

        if ($request->hasFile('photo')) {
                $path = $request->file('photo')->storeAs('public/orders/photos', $request->file('photo')->getClientOriginalName());

                $exists = Storage::exists($path);
                if($exists)
                {
                    //return $request->job_org;
                    $order = Order::where('user_id', $user->id)
                    ->where('iin', $request->iin)
                    ->where('status_id', 0)
                    ->first();

                    if($order == null)
                    {
                        $new_order = Order::create([
                            'gen' => $order_gen_id_last,
                            'reg_id' => $user->region_id,
                            'iin' => $request->iin,
                            'user_id' => $user->id,
                            'status_id' => 0,
                            'surname' => $request->surname,
                            'name' => $request->name,
                            'middlename' => $request->middlename,
                            'birth_date' => $request->birth_date,
                            'gender' => $request->gender,
                            'vaccine' => $request->vaccine,
                            'active_year_id' => $active_year_id,
                            'photo' => $path,
                            // 'job_org_id' => $request->job_org,
                            'job_category_id' => $request->job_category,
                            'job_position' => $request->job_position,
                            'stazh_gos' => $request->stazh_gos,
                            'job_main_funcs' => $request->main_funcs,
                        ]);

                        OrderStep::create([
                            'user_id' => $user->id,
                            'order_id' => $new_order->id,
                            'step_1' => 1,
                        ]);
                        return Redirect::route('fiz.new_order.step_2', ['gen' => $new_order->gen])->with('message', 'Saved new');
                    }
                }
                else return 'Не удалось загрузить фото';
        }
        else return 'Прикрепите фото';
    }



    public function store_step_2(Request $request, $gen)
    {
   //dd($request);
        $request->validate([
            'theme_type' => 'required',
            'theme' => 'required',
            'period_date_1' => 'required',
            'period_date_2' => 'required',
            'lang' => 'required',
            
        ]);
        //dd($request);
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)
            ->where('gen', $gen)
            ->first();

        if($order->status_id == '0')
        {
            $order->update([
                'theme_type_id' => $request->theme_type,
                'theme_id' => $request->theme,
                'lang_id' => $request->lang,
                'study_start_date' => $request->period_date_1,
                'study_end_date' => $request->period_date_2,
                
            ]);

            if($request->has('study_in_capital'))
            {
                $order->update([
                    'reg_id' => 1,
                ]);
            }

            OrderStep::where('order_id', $order->id)->update([
                'step_2' => 1,
            ]);

            /*$referer_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
            if($referer_route == 'testing.edit_order.step_2') return Redirect::route('testing.edit_order.step_3', ['test_gen' => $test_gen])->with('message', 'Saved existing');*/
            //else return Redirect::route('testing.new_order.step_3', ['test_gen' => $test_gen])->with('message', 'Saved existing');
            return Redirect::route('fiz.new_order.step_3', ['gen' => $gen])->with('message', 'Saved new');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    public function store_step_3(Request $request, $gen)
    {
        $request->validate([
            'student_email' => 'required',
            'student_tel_job' => 'required',
            'student_tel_mob' => 'required',
            'org_who_sent' => 'required',
        ]);

        $user = Auth::user();
        $order = Order::where('user_id', $user->id)
            ->where('gen', $gen)
            ->first();

        if($order->status_id == '0')
        {
            $order->update([
                'student_email' => $request->student_email,
                'student_tel_self' => $request->student_tel_mob,
                'student_tel_job' => $request->student_tel_job,
                'org_who_sent' => $request->org_who_sent,
            ]);

            $order_steps = OrderStep::where('order_id', $order->id)->update([
                'step_3' => 1,
            ]);
            $order_step = OrderStep::where('order_id', $order->id)->first();

            if($order_step->step_1 == 1 && $order_step->step_2 == 1 && $order_step->step_3 == 1)
            {
                $order->update([
                    'status_id' => 11
                ]);
            }

            /*$referer_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
            if($referer_route == 'testing.edit_order.step_2') return Redirect::route('testing.edit_order.step_3', ['test_gen' => $test_gen])->with('message', 'Saved existing');*/
            //else return Redirect::route('testing.new_order.step_3', ['test_gen' => $test_gen])->with('message', 'Saved existing');
            return Redirect::route('fiz.order.step_4', ['gen' => $gen])->with('message', 'Saved new');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    public function store_step_4(Request $request, $gen)
    {

    }



    // Редактирование существующей заявки
    public function edit_step_1(Request $request)
    {
        request()->session()->forget('cur_gen');
        request()->session()->put('cur_gen', $request->gen);
        //dd($request);
        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $job_categories = JobCategory::where('code', '!=', '')->get();
        $job_orgs = JobOrganisation::where('reg_id', $user->region_id)->orderBy('org_name')->get();
        $vaccines = Vaccine::all();
        $order = Order::where('gen', $request->gen)->first();
      
        return view('fiz::order.edit_step_1', compact('user', 'job_categories', 'job_orgs', 'vaccines', 'order'));
    }



    public function edit_step_2(Request $request)
    {
        request()->session()->forget('cur_gen');
        request()->session()->put('cur_gen', $request->gen);
        $user = Auth::user();
        $langs = Lang::all();
        $theme_types = ThemeType::whereIn('code',['pkp','pkv'])->get();
        $themes = Theme::where('reg_id', $user->region_id)->get();
        $order = Order::where('gen', $request->gen)->first();

        $order_step_2 = OrderStep::where('order_id', $order->id)->value('step_2');
        if($order_step_2)
        {
            //return Redirect::route('testing.edit_order.step_2', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 2');
        }
        return view('fiz::order.edit_step_2', compact('user', 'langs', 'themes', 'theme_types', 'order'));
    }



    public function edit_step_3(Request $request)
    {
        request()->session()->forget('cur_gen');
        request()->session()->put('cur_gen', $request->gen);

        $user = Auth::user();
        $order = Order::where('gen', $request->gen)->first();

        $order_step_3 = OrderStep::where('order_id', $order->id)->value('step_3');
        if($order_step_3)
        {
            //return Redirect::route('testing.edit_order.step_2', ['test_gen' => $request->test_gen])->with('message', 'Edit order step 2');
        }
        return view('fiz::order.edit_step_3', compact('user', 'order'));
    }



    public function update_step_1(Request $request, $gen)
    {
        $request->validate([
            'photo' => 'required',
            'stazh_gos' => 'required',
            'job_org' => 'required',
            'job_category' => 'required',
            'job_position' => 'required',
            'main_funcs' => 'required',
            'vaccine' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'iin' => 'required',
        ]);
        $user = Auth::user();
        if ($request->hasFile('photo'))
        {
            $path = $request->file('photo')->storeAs('public/orders/photos', $request->file('photo')->getClientOriginalName());

            $exists = Storage::exists($path);
            if($exists)
            {
                $order = Order::where('user_id', $user->id)
                ->where('gen', $request->gen)
                ->where('status_id', 0)
                ->first();

                if($order)
                {
                    $order->update([
                        'iin' => $request->iin,
                        'surname' => $request->surname,
                        'name' => $request->name,
                        'middlename' => $request->middlename,
                        'birth_date' => $request->birth_date,
                        'gender' => $request->gender,
                        'vaccine' => $request->vaccine,
                        'photo' => $path,
                        'job_org_id' => $request->job_org,
                        'job_category_id' => $request->job_category,
                        'job_position' => $request->job_position,
                        'stazh_gos' => $request->stazh_gos,
                        'job_main_funcs' => $request->main_funcs,
                    ]);
                    return Redirect::route('fiz.edit_order.step_2', ['gen' => $gen])->with('message', 'Saved new');
                }
                else return 'Не удалось найти заявку';
            }
            else return 'Не удалось загрузить фото';
        }
        else return 'Прикрепите фото';
    }



    public function update_step_2(Request $request, $gen)
    {
        $request->validate([
            'theme_type' => 'required',
            'theme' => 'required',
            'period_date_1' => 'required',
            'period_date_2' => 'required',
            'lang' => 'required',
            'expectations' => 'required',
        ]);

        $user = Auth::user();
        $order = Order::where('user_id', $user->id)
            ->where('gen', $gen)
            ->first();

        if($order->status_id == '0')
        {
            $order->update([
                'theme_type_id' => $request->theme_type,
                'theme_id' => $request->theme,
                'lang_id' => $request->lang,
                'study_start_date' => $request->period_date_1,
                'study_end_date' => $request->period_date_2,
                'expectations' => $request->expectations,
            ]);

            if($request->has('study_in_capital'))
            {
                $order->update([
                    'reg_id' => 1,
                ]);
            }

            return Redirect::route('fiz.edit_order.step_3', ['gen' => $gen])->with('message', 'Saved existing');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    public function update_step_3(Request $request, $gen)
    {
        $request->validate([
            'student_email' => 'required',
            'student_tel_job' => 'required',
            'student_tel_mob' => 'required',
            'director_name' => 'required',
            'director_email' => 'required',
            'director_tel_job' => 'required',
            'director_tel_mob' => 'required',
            'hr_name' => 'required',
            'hr_email' => 'required',
            'hr_tel_job' => 'required',
            'hr_tel_mob' => 'required',
            'org_who_sent' => 'required',
        ]);

        $user = Auth::user();
        $order = Order::where('user_id', $user->id)
            ->where('gen', $gen)
            ->first();

        if($order->status_id == '0')
        {
            $order->update([
                'student_email' => $request->student_email,
                'student_tel_self' => $request->student_tel_mob,
                'student_tel_job' => $request->student_tel_job,
                'student_boss_tel_self' => $request->director_tel_mob,
                'student_boss_tel_job' => $request->director_tel_job,
                'student_boss_email' => $request->director_email,
                'student_boss_full_name' => $request->director_name,
                'kadr_tel' => $request->hr_tel_job,
                'kadr_tel_mob' => $request->hr_tel_mob,
                'kadr_email' => $request->hr_email,
                'kadr_full_name' => $request->hr_name,
                'org_who_sent' => $request->org_who_sent,
            ]);

            $order_step = OrderStep::where('order_id', $order->id)->first();
            if($order_step != null)
            {
                $order_step->update([
                    'step_3' => 1,
                ]);
            }

            if($order_step->step_1 == 1 && $order_step->step_2 == 1 && $order_step->step_3 == 1)
            {
                $order->update([
                    'status_id' => 11
                ]);
            }

            return Redirect::route('fiz.order.step_4', ['gen' => $gen])->with('message', 'Saved existing');
        }
        else return 'Невозможно отредактировать данную заявку.';
    }



    /**
     * Удалить заявку
     */
    public function deleteOrder(Request $request, $gen)
    {
        $order = Order::where('gen', $gen)->first();
        $order->delete();
        if($order->status_id == '0') $order->delete();
        return redirect()->back();
    }



    public function getReadyOrder(Request $request, $gen)
    {
        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $order = Order::where('gen', $gen)->first();
        $pdf = PDF::loadView('fiz::order.ready_order_template', compact('user', 'order'))
        ->setOptions(['defaultFont' => 'TimesNewRoman', 'isRemoteEnabled' => TRUE]);

        //return view('gov::order.ready_order_template', compact('user', 'order'));

        $old_path_order = $order->ready_order;
        if($old_path_order!= null) Storage::delete($old_path_order);

        $new_path_order = 'orders/ready_orders/fiz/'.$user->id
        .'/'.$order->gen.'_order.pdf';

        Storage::put($new_path_order, $pdf->output());

        $exists = Storage::exists($new_path_order);
        if($exists)
        {
            $order->update([
                'ready_order' => $new_path_order,
            ]);
        }
        else return 'Не удалось загрузить файл заявки.';

        return $pdf->stream($order->gen.'_order.pdf');
        /*return view('fiz::order.ready_order_template', compact('user', 'order'));
        return response()->file(
            storage_path('app/' . $new_path_order)
        );*/
    }
}
