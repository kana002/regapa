<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Region;
use App\Models\Order;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\TestingOrder;
use PDF;
use App\Models\TestingOrderDoc;
use Illuminate\Support\Facades\Storage;
use App\Models\Theme;



class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       // $user = Auth::user();
        $user = User::where('id', Auth::user()->id)->first();
        
        $all_orders = Order::where('reg_id', $user->region_id)->with('user')->get();
 
       
        $theme = Theme::where('reg_id', $user->region_id)->with('theme_typs')->get();


         return view('admin::order.index', compact('user','all_orders','theme'));


    }

   
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user = Auth::user();
        $all_orders = Order::where('reg_id', $user->region_id)->get();

        return view('admin::order.create', compact('user','all_orders'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // $data = request()->validate([
        //     'name'=>'name',
        //     'surname'=>'surname',
        //     'middlename'=>'middlename',
        //     'iin'=>'iin',
        //     'vaccine'=>'vaccine',
        //     'birth_date'=>'birth_date'
        // ]);

       $data=Order::create([
        'id' => $request->id,
        'gen' => $request->gen,
        'reg_id' => $request->reg_id,
        'surname' => $request->surname,
        'name' => $request->name,
        'middlename' => $request->middlename,
        'gender' => $request->gender,
        'iin' => $request->iin,
        'vaccine' => $request->vaccine,
        'birth_date' => $request->birth_date,
        'course_type_id' => $request->course_type_id,
        'course_id' => $request->course_id,
        'lang_id' => $request->lang_id,
        'study_start_date' => $request->study_start_date,
        'study_end_date' => $request->study_end_date,
        'student_tel_self' => $request->student_tel_self,
        'student_tel_job' => $request->student_tel_job,
        'student_email' => $request->student_email,
        'student_boss_tel_self' => $request->student_boss_tel_self,
        'student_boss_tel_job' => $request->student_boss_tel_job,
        'student_boss_email' => $request->student_boss_email,
        'student_boss_full_name' => $request->student_boss_full_name,
        'kadr_tel' => $request->kadr_tel,
        'kard_email' => $request->kard_email,
        'kard_full_name' => $request->kard_full_name,
        'org_who_sent' => $request->org_who_sent,
        'user_id' => $request->user_id,
        'status_id' => $request->status_id,
        'active_year_id' => $request->active_year_id,
        'reason' => $request->reason
       ]);
       dd($data);
       return redirect()->route('admin::order.index');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id, Request $request)
    {
        // dd(123);
        $user = Auth::user();
        $all_orders = Order::where('reg_id', $user->region_id)->get();


        return view('admin::order.show',  compact('user','all_orders'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, Request $request)
    {
       // dd($id);

        $user = Auth::user();

        $all_orders = Order::where('id', $id)
                                ->with('user')
                                ->with('details')
                                ->first();
        //dd($all_orders);
        $pdf = PDF::loadView('testingadmin::order.ready_order_template', compact('user','all_orders'))
        ->setOptions(['defaultFont' => 'TimesNewRoman']);


        $testing_order = Order::where('gen', $id)->first();
        //dd($testing_order);

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



             return $pdf->stream($testing_order->test_gen.'_order.pdf');

            //   return view('testingadmin::order.ready_order_template', compact('user', 'all_orders'));
               
    }

 
    public function getReadyOrderPdf(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('details')->first();
        $testing_order = Order::where('gen', $request->test_gen)->with('lang')->first();

        $pdf = PDF::loadView('admin::order.ready_order_template', compact('user', 'testing_order'))
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
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $all_orders = Order::where('reg_id', $user->region_id)->get();
       //dd($id);
 
        $rr =  Order::where('id', $id)->update([
            'status_id' => 2,
            'reason' => $request->reason
        ]);
      
          return redirect()->route('admin.all_orders',  compact('all_orders'));

    }


    public function accept(Request $request, $id){

        $user = Auth::user();
        $all_orders = Order::where('reg_id', $user->region_id)->get();
       //dd($id);
 
        $rr =  Order::where('id', $id)->update([
            'status_id' => 1
        ]);


            return redirect()->route('admin.all_orders',  compact('all_orders'));
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
