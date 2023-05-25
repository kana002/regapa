<?php

namespace Modules\TestingAdmin\Http\Controllers;

use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Lang;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class TestingAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $langs = Lang::all();
        $region = User::where('region_id', $user->region_id)
        ->get();

        //dd($region);
        return view('testingadmin::user.index',  compact('user','region', 'langs'));
    }

    public function home()
    {
        return view('testingadmin::home');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user = Auth::user();

        return view('testingadmin::user.create',  compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
            
        $user = Auth::user();

        $role_us = RoleUser::all();
        //dd($r);  
        // $request->validate([
        //     'surname' => 'required',
        //     'nsame' => 'required',
        // ]);

            $us =User::create([
                'region_id' => $user->region_id,
                'surname' => $request->surname,
                'name' => $request->name,
                'middlename' => $request->middlename,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $role = Role::where('id', '8')->first();

            RoleUser::create([
                'user_id'=> $us->id,
                'role_id'=> $role->id
            ]);
   
        // dd($user);
        return redirect()->route('testingadmin.all_users')->with('success','success');
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
        $user = Auth::user();
        $reg_user = User::where('id', $id)->first();
        //dd($reg_user);
        return view('testingadmin::user.edit', compact('user', 'reg_user'))->with('success','success');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */


    public function update(Request $request)
    {

        $user = Auth::user();
         
      $rr =  User::where('id', $request->id)->update([
            'surname' => $request->surname,
            'name' => $request->name,
            'middlename' => $request->middlename,
            'password' => Hash::make($request->password)
        ]);
    // dd($request);
        return redirect()->route('testingadmin.all_users');
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

       $user = Auth::user();

       DB::statement('SET FOREIGN_KEY_CHECKS=0;');

       $users = User::where('id', $id)->with('userRole')->first();
        
       //dd($users);
       $users->delete();

       DB::statement('SET FOREIGN_KEY_CHECKS=1;');
       
        return redirect()->route('testingadmin.all_users');
    }
}


