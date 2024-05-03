<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{
    public function index()
    {
        $roles=DB::table('user_permissions')->get();
        return view('admin.roles.index',compact('roles'));
    }
    public function create(Request $request)
    {
        DB::table('user_permissions')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'number_leaves'=>$request->number_leaves,

        ]);
        return redirect('/admin/permissions')->with('success', 'تم انشاء صلاحية بنجاح');
    }
    public function remove($id)
    {
        $roles=DB::table('user_permissions')->where('id',$id)->delete();
        return redirect('/admin/permissions')->with('success', 'تم حذف صلاحية بنجاح');
    }
}
