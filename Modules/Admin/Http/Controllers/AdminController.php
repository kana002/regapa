<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $user = Auth::user();
        $user = User::where('id', Auth::user()->id)->first();
        $region = User::where('region_id', $user->region_id)
        ->first();

        return view('admin::home', compact('user', 'region'));
    }

    public function settings(Request $request)
    {
        //dd($id);
        $user = Auth::user();
        
        return view('admin::settings', compact('user'));
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
            
        return redirect()->route('admin.home')->with('success','success');
    }


    public function home()
    {
        $user = Auth::user();
        return view('admin::home', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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
}
