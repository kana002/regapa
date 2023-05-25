<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $redirectTo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin_index()
    {
        return view('admin.index');
    }
    public function gov_index()
    {
        return view('gov.index');
    }
    public function fiz_index()
    {
        return view('fiz.index');
    }
    public function tik_index()
    {
        return view('tik.index');
    }
    public function kvz_index()
    {
        return view('kvz.index');
    }
    public function redirect()
    {
        $this->redirectTo = '/';
        //$request->session()->regenerate();

        $user = Auth::user();
        //return $user->user_role($user->id);
        if($user)
        {
            if(Auth::user()->user_role($user->id) == 'admin') $this->redirectTo = '/admin/';
            elseif(Auth::user()->user_role($user->id) == 'gov') $this->redirectTo = '/gov/home';
            elseif(Auth::user()->user_role($user->id) == 'fiz') $this->redirectTo = '/fiz/';
            elseif(Auth::user()->user_role($user->id) == 'tik') $this->redirectTo = '/tik/';
            elseif(Auth::user()->user_role($user->id) == 'kvz') $this->redirectTo = '/kvz/';
            elseif(Auth::user()->user_role($user->id) == 'testing') $this->redirectTo = '/testing/home';
            elseif(Auth::user()->user_role($user->id) == 'testing_admin') $this->redirectTo = '/testing_admin/home';

            return redirect($this->redirectTo);
        }
        else return view('welcome');
    }
}
