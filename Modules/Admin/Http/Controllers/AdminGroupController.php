<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Group;
use App\Models\Theme;
use App\Models\Order;
use App\Models\GroupOrder;


class AdminGroupController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user = User::where('id', Auth::user()->id)->first();

        $groups = Group::where('reg_id', $user->region_id)->with('theme')->get();
        

        return view('admin::group.index', compact('user', 'groups'));
    }



    public function home()
    {
        return view('testingadmin::home');
    }



    public function create()
    {
        $user = Auth::user();
        $user = User::where('id', Auth::user()->id)->first();
        $groups = Group::where('reg_id', $user->region_id)->with('theme')->get();
        $themes = Theme::all();
        $orders = Order::where('reg_id', $user->region_id)->get();        


        return view('admin::group.create',  compact('user', 'groups','themes','orders'));
    }



    public function store(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
     
        $groups = Group::where('reg_id', $user->region_id)->first();

        $new_group = Group::create([
                    'group_name' => $request->group_name,
                    'theme_id' => $request->theme_id,
                    'reg_id' => $user->region_id

                ]);

        foreach($request->orders as $order)
                {
                    GroupOrder::create([
                       'group_id'  => $new_group->id,
                       'order_id' => $order
                    ]);
                }        

           

        return redirect()->route('admin.all_groups');
    }



    public function show($id)
    {
        return view('admin::show');
    }



    public function edit($id)
    {
        
        $user = User::where('id', Auth::user()->id)->first();
        $group = Group::where('id', $id)->with('group_orders')->first();
       // dd($group);
       
        $orders = Order::where('reg_id', $user->region_id)->get();      
       
        $themes = Theme::where('reg_id', $user->region_id)->get();

        return view('admin::group.edit', compact('user', 'themes','orders','group'));
    }


    public function update(Request $request, $id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $group = Group::where('id', $id)->first();
        //return $request;

        if($group != null)
        {
            
       $group ->update([
            'group_name' => $request->group_name,
            'theme_id' => $request->tema_kz,
        ]);


        GroupOrder::where('group_id', $id)->delete();

        foreach($request->orders as $order)
                {
                    GroupOrder::create([
                       'group_id'  => $group->id,
                       'order_id' => $order
                    ]);
                }        

   }
        else return 'Группы не существует.';
        
        return redirect()->route('admin.all_groups');
    }



    public function delete($id)
    {
       // dd($id);
        $user = User::where('id', Auth::user()->id)->first();
        $group_orders = Group::where('reg_id', $user->region_id)->with('group_orders')->first();
       
        $group = Group::where('id', $id)->first();
        if($group_orders != null)
        {
            $group_orders->delete();

            //GroupOrder::where('group_id', $id)->delete();
        }
        else return 'Группы не существует.';
        return redirect()->back();
    }
}


