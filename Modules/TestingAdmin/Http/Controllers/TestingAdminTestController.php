<?php

namespace Modules\TestingAdmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;
use App\Models\Lang;
use App\Models\TestCategory;
use App\Models\Test;
use App\Models\User;
use App\Models\TestingGroup;


class TestingAdminTestController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $tests = Test::where('reg_id', $user->region_id)->get();

        return view('testingadmin::test.index', compact('user', 'tests'));
    }



    public function home()
    {
        return view('testingadmin::home');
    }



    public function create()
    {
        $user = Auth::user();
        $regions = Region::all();
        $langs = Lang::all();
        $test_categories = TestCategory::all();
        return view('testingadmin::test.create',  compact('user', 'regions', 'langs', 'test_categories'));
    }



    public function store(Request $request)
    {
        $test = Test::where('test_name', $request->test_name)->where('test_date', $request->test_date)->first();
        if($test == null)
        {
            $new_test = Test::create([
                'test_name' => $request->test_name,
                'reg_id' => $request->test_region,
                'test_date' => $request->test_date,
                'test_lang_id' => $request->test_lang,
                'test_category_type_id' => $request->test_category,
            ]);
        }
        else return 'Тест существует.';
        return redirect()->route('testingadmin.all_tests');
    }



    public function show($id)
    {
        return view('testingadmin::show');
    }




    public function edit($id, Request $request)
    {

        $user = User::where('id', Auth::user()->id)->first();
        $tests = Test::where('id', $id)->with('lang')->first();
        $categories = TestCategory::all();
        $langs = Lang::all();
        $regions = Region::all();
        //dd($tests);

        return view('testingadmin::test.edit', compact('tests', 'user', 'categories', 'langs', 'regions'));
    }



    public function update(Request $request, $id)
    {

        $user = Auth::user();
        $tests = Test::where('id', $id)->first();


        $tests ->update([
              'test_name' => $request->test_name,
              'test_date' => $request->test_date,
              'test_lang_id' => $request->test_lang_id,
               'test_category_type_id' => $request->name_ru
          ]);

          return redirect()->route('testingadmin.all_tests');

    }



    public function destroy($id)
    {
        $tests = Test::where('id', $id)->first();
        $tests->delete();
        return redirect()->back();
    }
}
