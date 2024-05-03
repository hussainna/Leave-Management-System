<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave;
use Carbon\Carbon; // Make sure to include this line
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaveRequestMail;
use App\Mail\LeaveResponsetMail;


class LeaveController extends Controller
{
    public function index()
    {
        $leave=Leave::all();
        return view('admin.leave.index',compact('leave'));
    }

    public function edit($id)
    {
        $leave=Leave::find($id);
        return view('admin.leave.edit',compact('leave'));
    }

    public function create(Request $request)
    {

        $current_month_leaves=DB::table('leaves')->where('user_id', Auth::id())
        ->where('status','قبول')
        ->whereMonth('updated_at', Carbon::now()->month)
        ->count();

        $user_type=DB::table('users')->where('id', Auth::id())->value('employer_type');

        $user_limit=DB::table('user_permissions')->where('name',$user_type)->value('number_leaves');

        if($current_month_leaves >=$user_limit)
        {
            return redirect('/dashboard')->with('error', 'عدد الاجازات الشهريه قد انتهت الرجاء الانتضار الشهر قادم للطلب مجددا');

        }
        else
        {
            DB::table('leaves')->insert([
                'user_id'=>Auth::id(),
                'date_end'=>$request->date_end,
                'date_start'=>$request->date_start,
                'description'=>$request->description,
                'leave_type'=>$request->leave_type,
            ]);

            $user=DB::table('users')->where('id', Auth::id())->first();


            $adminEmail=DB::table('settings')->where('key','contact_email')->value('value');
            $data=[
                'email'=>$user->email,
                'name'=>$user->name,
                'adminEmail'=>$adminEmail,
            ];
            Mail::to($adminEmail)->send(new LeaveRequestMail($data));

            return redirect('/dashboard')->with('success', 'تم طلب عطلة بنجاح');
        }

       


    }

    public function update(Request $request,$id)
    {

       

            Leave::find($id)->update([
                'status'=>$request->status,
            ]);
            $user_id=DB::table('leaves')->where('id',$id)->value('user_id');
            $user=DB::table('users')->where('id', $user_id)->first();


            $adminEmail=DB::table('settings')->where('key','contact_email')->value('value');
            $data=[
                'email'=>$user->email,
                'name'=>$user->name,
                'adminEmail'=>$adminEmail,
            ];
            Mail::to($user->email)->send(new LeaveResponsetMail($data));
            return redirect('/admin/leave')->with('success', 'تم تعديل الحالة بنجاح');


    }

}
