<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(\MainHelper::recaptcha($data['recaptcha'])<0.8)abort(401);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $file->move('uploads/image', $fileName);

         $user=DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'employer_type' => $request->employer_type,
            'image' => $fileName,
            'password' => Hash::make($request->password),
        ]);
     

        $adminEmail=DB::table('settings')->where('key','contact_email')->value('value');
        $data=[
            'email'=>$request->email,
            'name'=>$request->name,
            'adminEmail'=>$adminEmail,
        ];
        Mail::to($adminEmail)->send(new AuthMail($data));
        toastr()->success('تم انشاء الحساب الرجاء القيام بعملية تسجيل الاخيره','عملية ناجحة');

        return redirect('/login');

    }
}
