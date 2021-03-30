<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\VerifyUser;
use App\Models\PasswordResets AS PR;
// use Laravel\Socialite\Facades\Socialite;
use App\Mail\Office\WelcomeMail;
use App\Mail\Office\PasswordResetMail;
use Exception;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee')->except('do_logout');
    }
    public function index()
    {
        return view('office.auth.main');
    }
    public function do_login(Request $request)
    {
        Validator::extend('username', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        try {
            $this->validate($request, [
                'username' => 'required|username',
                'password' => 'required|min:8'
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
        if(Auth::guard('employee')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Welcome back '. Auth::guard('employee')->user()->name,
            ]);
        }
    }
    public function do_register(Request $request)
    {
        Validator::extend('username', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        try {
            $this->validate($request, [
                'fullname' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'username', 'max:25', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
        $request['name'] = $request->fullname;
        $request['roles'] = 'Employee';
        $request['password'] = Hash::make($request->password);
        $user = Employee::create($request->all());
        
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id_user,
            'token' => sha1(time())
        ]);
        Mail::to($request->email)->send(new WelcomeMail($user));
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Please check your email '. $request->email,
        ]);
    }
    public function do_forgot(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email'
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
        $user = Employee::where('email','=',$request->email)->first();
        if($user){
            PR::create([
                'email' => $user->email,
                'token' => sha1(time())
            ]);
            Mail::to($request->email)->send(new PasswordResetMail($user));
            return response()->json([
                'alert' => 'success',
                'message' => 'Please check your email '. $request->email,
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function reset($token)
    {
        $passwordReset = PR::where('token', $token)->first();
        if(isset($passwordReset)){
            $email = $passwordReset->email;
            return view('office.auth.reset',compact('email'));
        }else{
            return route('auth');
        }
    }
    public function do_reset(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $rpassword = $request->rpassword;
        if($password <> $rpassword){
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }else{
            Employee::where('email', $email)->update(['password' => Hash::make($request->password)]);
            return response()->json([
                'alert' => 'success',
                'message' => 'Congrats, you can login now',
            ]);
        }
    }
    public function do_logout()
    {
        $employee = Auth::guard('employee')->user();
        Auth::logout($employee);
        return redirect()->route('auth');
    }
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }
    // public function handleGoogleCallback()
    // {
    //     try {
  
    //         $user = Socialite::driver('google')->user();
   
    //         $finduser = Employee::where('google_id', $user->id)->first();
   
    //         if($finduser){
   
    //             Auth::guard('employee')->finduser;
  
    //             return redirect('/dashboard');
   
    //         }else{
    //             $newUser = Employee::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'google_id'=> $user->id
    //             ]);
  
    //             Auth::guard('employee')->newUser;
   
    //             return redirect()->back();
    //         }
  
    //     } catch (Exception $e) {
    //         return redirect('auth/google');
    //     }
    // }
    public function resend_verify()
    {
        $user = Auth::user();
        VerifyUser::create([
            'user_id' => $user->id_user,
            'token' => sha1(time())
        ]);
        Mail::to($user->email)->send(new WelcomeMail($user));
    }
    public function verify($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->email_verified_at = date("Y-m-d H:i:s");
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/auth')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/auth')->with('status', $status);
    }
}