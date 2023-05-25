<?php

namespace Modules\Testing\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use App\Models\TestingOrderDoc;
use App\Models\TestingOrderCert;
use App\Models\TestingOrderExperience;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDF;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $test_steps = null;
        return view('testing::index', compact('test_steps', 'user'));
    }

    public function home()
    {
        $user = Auth::user();
        $test_steps = null;
        return view('testing::home', compact('user', 'test_steps'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('testing::create');
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
        return view('testing::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('testing::edit');
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

    public function settings()
    {
        $user = Auth::user();
        $test_steps = null;
        return view('testing::settings', compact('user', 'test_steps'));
    }

    public function settings_store(Request $request)
    {
        $user = Auth::user();
        $found_user = User::find($user->id);
        if($found_user != null)
        {
            $found_user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'middlename' => $request->middlename,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('testing.home');
    }

    public function downloadTestingOrder($id)
    {
        //$reference = TestingOrderDoc::where('testing_order_id', $id)->value('exp_spravka');
        //return \Response::download(storage_path('app/' . $reference));
    }

    public function downloadUdost($id)
    {
        $doc = TestingOrderDoc::where('testing_order_id', $id)->value('udost');
        return \Response::download(storage_path('app/' . $doc));
    }

    public function downloadEdu($id)
    {
        $doc = TestingOrderDoc::where('testing_order_id', $id)->value('education');
        return \Response::download(storage_path('app/' . $doc));
    }

    public function downloadExpReference($id)
    {
        $user = Auth::user();
        $reference = TestingOrderDoc::where('testing_order_id', $id)->value('exp_spravka');
        //return \Response::download(storage_path('app/' . $reference));
        /*$file = Storage::get($reference);
        $type = Storage::mimeType($reference);
        $response = Response::make($file, 200)->header("Content-Type", $type);*/
        if($reference  != null)
        {
            $experience = TestingOrderExperience::where('testing_order_id', $id)->first();
            $pdf = PDF::loadView('testing::order.experience_spravka',compact('user', 'experience'))
                ->setOptions(['defaultFont' => 'arial'])
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Spravka.pdf');
        }
        return $response;
    }

    public function downloadExpReferenceSigned($id)
    {
        $reference = TestingOrderDoc::where('testing_order_id', $id)->value('exp_spravka_signed');
        return \Response::download(storage_path('app/' . $reference));
    }

    public function downloadPaymentReceipt($id)
    {
        $doc = TestingOrderDoc::where('testing_order_id', $id)->value('payment_receipt');
        return \Response::download(storage_path('app/' . $doc));
    }

    /**
     * TODO: скачать несколько сертификатов
     */
    public function downloadCertificate($id)
    {
        $reference = TestingOrderCert::where('testing_order_id', $id)->value('certificate');
        return \Response::download(storage_path('app/' . $reference));
    }
}
