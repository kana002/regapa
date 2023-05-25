<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Region;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $regions = Region::all();
        return view('auth.register', compact('regions'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //return $request->surname;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'middlename' => ['max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_type' => ['required'],
            'region' => ['required'],
        ]);

        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'middlename' => $request->middlename,
            'region_id' => $request->region,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user_role = RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $request->profile_type,
        ]);

        event(new Registered($user));

        Auth::login($user);

       return redirect('/');
    }
}
