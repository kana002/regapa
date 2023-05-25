<?php

namespace Modules\TestingAdmin\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Test;
use App\Models\TestingOrder;
use App\Models\TestingGroup;
use App\Models\TestingGroupOrder;

class TestingAdminGroupController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $groups = TestingGroup::where('reg_id', $user->region_id)->get();
        
        return view('testingadmin::group.index', compact('user', 'groups'));
    }



    public function home()
    {
        return view('testingadmin::home');
    }



    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $tests = Test::where('reg_id', $user->region_id)->get();
        $testing_orders = TestingOrder::where('reg_id', $user->region_id)->get();
        return view('testingadmin::group.create',  compact('user', 'tests', 'testing_orders'));
    }



    public function store(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $group = TestingGroup::where('group_name', $request->group_name)->where('test_id', $request->test_name)->first();
        if($group == null)
        {
            $new_group = TestingGroup::create([
                'group_name' => $request->group_name,
                'test_id' => $request->test_name,
                'reg_id' => $user->region_id,
            ]);

            foreach($request->testing_orders as $order)
            {
                TestingGroupOrder::create([
                   'group_id'  => $new_group->id,
                   'testing_order_id' => $order
                ]);
            }
        }
        else return 'Группа существует.';
        return redirect()->route('testingadmin.all_groups');
    }



    public function show($id)
    {
        return view('testingadmin::show');
    }



    public function edit($id)
    {
        // dd($id);
        $user = User::where('id', Auth::user()->id)->first();
        $group = TestingGroup::where('id', $id)->with('order')->first();
        //dd($group);
        $tests = Test::where('reg_id', $user->region_id)->get();

        $testing_orders = TestingOrder::where('reg_id', $user->region_id)->get();
        return view('testingadmin::group.edit', compact('user', 'group', 'tests', 'testing_orders'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $group = TestingGroup::where('id', $id)->first();
        if($group != null)
        {
            $group->update([
                'group_name' => $request->group_name,
                'test_id' => $request->test_name,
            ]);

            TestingGroupOrder::where('group_id', $id)->delete();

            foreach($request->testing_orders as $order)
            {
                TestingGroupOrder::create([
                   'group_id'  => $group->id,
                   'testing_order_id' => $order
                ]);
            }
        }
        else return 'Группы не существует.';
        return redirect()->route('testingadmin.all_groups');
    }



    public function delete($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $group = TestingGroup::where('id', $id)->first();
        if($group != null)
        {
            $group->delete();

            /*TestingGroupOrder::where('group_id', $id)->delete();

            foreach($request->testing_orders as $order)
            {
                TestingGroupOrder::create([
                   'group_id'  => $group->id,
                   'testing_order_id' => $order
                ]);
            }*/
        }
        else return 'Группы не существует.';
        return redirect()->back();
    }
}
