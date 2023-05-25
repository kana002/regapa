<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;
use App\Models\Lang;
use App\Models\TestCategory;
use App\Models\Test;
use App\Models\User;
use App\Models\Theme;
use App\Models\ThemeType;
use App\Models\TestingGroup;



class AdminThemeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
       
        $user = User::where('id', Auth::user()->id)->first();

        $theme = Theme::where('reg_id', $user->region_id)->with('theme_typs')->get();
       // dd($themes);
       
        return view('admin::theme.index', compact('user', 'theme'));
    }





    public function create()
    {
        $user = Auth::user();

        $themes = Theme::where('reg_id', $user->region_id)->first();
        //dd($themes);

        $typs = ThemeType::all();

        
        return view('admin::theme.create',  compact('user', 'themes','typs'));
    }



    public function store(Request $request)
    {
 
            $user = User::where('id', Auth::user()->id)->first();
            //dd($user);
            $new_theme = Theme::create([
                'tema_kz' => $request->tema_kz,
                'tema_ru' => $request->tema_ru,
                'reg_id' => $user->region_id,
                'col_chas' => $request->col_chas,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'type' => $request->type,
                'uroven' => $request->uroven
            ]);
         
        return redirect()->route('admin.theme.index');
    
    }



    public function show($id)
    {
        return view('admin::show');
    }



    public function edit($id, Request $request)
    {

        $user = Auth::user();
        //dd($user);
        $user = User::where('id', Auth::user()->id)->first();
        $themes = Theme::where('id', $id)->with('theme_typs')->first();

        $typs = ThemeType::all();

        return view('admin::theme.edit', compact('user',  'themes','typs'));
    }



    public function update(Request $request, $id)
    {
        $themes = Theme::where('id', $id)->with('theme_typs')->first();
       // dd($themes);

         Theme::where('id',  $id)->update([
              'tema_kz' => $request->tema_kz,
              'tema_ru' => $request->tema_ru,
              'col_chas' => $request->col_chas,
              'date_start' => $request->date_start,
              'date_end' => $request->date_end,
              'type' => $request->type,
              'uroven' => $request->uroven
          ]);


          return redirect()->route('admin.theme.index');

    }



    public function destroy($id)
    {
        $themes = Theme::where('id', $id)->with('theme_typs')->first();

        // dd($themes);
        $themes->delete();

        return redirect()->back();
    }
}
