<?php

namespace Modules\TestingAdmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\TestingOrderDoc;
use App\Models\TestingOrderCert;
use Illuminate\Support\Facades\Storage;

class TestingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $user = User::where('id', Auth::user()->id)->first();
        $region = User::where('region_id', $user->region_id)
        ->first();

        return view('testingadmin::index');
    }

    public function home()
    {
        $user = Auth::user();
        return view('testingadmin::home', compact('user'));
    }

       public function settings(Request $request)
    {
        //dd($id);
        $user = Auth::user();

        return view('testingadmin::settings', compact('user'));
    }

    public function update_settings(Request $request, $id)
    {


        $user = Auth::user();

        $reg_user = User::where('id', $id)->first();


        $rr =  User::where('id', $request->id)->update([
              'surname' => $request->surname,
              'name' => $request->name,
              'middlename' => $request->middlename,
              'password' => Hash::make($request->password)
          ]);

        return redirect()->route('testingadmin.home')->with('success','success');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('testingadmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('testingadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('testingadmin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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

    public function downloadOrderUdost($id)
    {
        $order_doc = TestingOrderDoc::where('testing_order_id', $id)->value('udost');
       // return storage_path('app/' . $order_doc);
        return \Response::download(storage_path('app/' . $order_doc));
        /*return response()->file(
            storage_path('app/' . $order_doc)
        );*/
    }

    public function downloadOrderEducation($id)
    {
        $order_doc = TestingOrderDoc::where('testing_order_id', $id)->value('education');
       // return storage_path('app/' . $order_doc);
        return \Response::download(storage_path('app/' . $order_doc));
        /*return response()->file(
            storage_path('app/' . $order_doc)
        );*/
    }

    public function downloadOrderExpSpravka($id)
    {
        $order_doc = TestingOrderDoc::where('testing_order_id', $id)->value('exp_spravka_signed');
       // return storage_path('app/' . $order_doc);
        return \Response::download(storage_path('app/' . $order_doc));
        /*return response()->file(
            storage_path('app/' . $order_doc)
        );*/
    }
    public function downloadOrderCert($id)
    {
        $order_doc = TestingOrderCert::where('testing_order_id', $id)->value('certificate');
       // return storage_path('app/' . $order_doc);
        return \Response::download(storage_path('app/' . $order_doc));
        /*return response()->file(
            storage_path('app/' . $order_doc)
        );*/
    }
    public function downloadOrderPaymentReceipt($id)
    {
        $order_doc = TestingOrderDoc::where('testing_order_id', $id)->value('payment_receipt');
       // return storage_path('app/' . $order_doc);
        return \Response::download(storage_path('app/' . $order_doc));
        /*return response()->file(
            storage_path('app/' . $order_doc)
        );*/
    }
    public function downloadReadyOrder($id)
    {
        $order_doc = TestingOrderDoc::where('testing_order_id', $id)->value('ready_order');
       // return storage_path('app/' . $order_doc);
        return \Response::download(storage_path('app/' . $order_doc));
        /*return response()->file(
            storage_path('app/' . $order_doc)
        );*/
    }

}
