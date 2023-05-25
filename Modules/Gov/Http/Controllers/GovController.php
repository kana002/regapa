<?php

namespace Modules\Gov\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;

class GovController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('gov');
    }*/

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //$user = Auth::user();
        return view('gov::index');
    }

    public function home()
    {
        $user = Auth::user();
        return view('gov::home', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('gov::create');
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
        return view('gov::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('gov::edit');
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

    public function settings(Request $request)
    {
        //dd($id);
        $user = Auth::user();

        return view('gov::settings', compact('user'));
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
        return redirect()->route('gov.home');
    }

    public function downloadOrder($id)
    {
        $order_doc = Order::where('gen', $id)->value('ready_order');
        return response()->file(
            storage_path('app/' . $order_doc)
        );
    }

    public function downloadOrderPhoto($id)
    {
        $order_doc = Order::where('gen', $id)->value('photo');
        //return storage_path('app/' . $order_doc);
        return response()->file(
            storage_path('app/' . $order_doc)
        );
    }
}
