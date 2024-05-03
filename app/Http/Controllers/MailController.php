<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function createAuth($id)
    {
        DB::table('users')->where('id',$id)->update(['is_active'=>1]);
        $user=DB::table('users')->where('id',$id)->first();

      


        return redirect('/admin/users')->with('success', 'تم توثيق الحساب بنجاح');


    }
}
