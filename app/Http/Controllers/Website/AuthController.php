<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendDemoMail;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;




class AuthController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'mobile' => 'required|numeric',
                // 'terms' => 'required',
            ]); 
    
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'mobile' => $request->mobile,
                ]);
                UserDetail::create([
                    'user_id' => $user->id,
                    'first_name' => $request->name,
                    'last_name' => 1,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                ]);
                session(['user' => $user]);
            });
            return redirect()->route('website-home')->with('success', 'Registration successful');
        }
        return view('website.auth.register');
    }

    public function login(Request $request){
       if($request->isMethod('post')){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        // dd($request->password);
        if(!$user || !Hash::check($request->password, $user->password)){
            return redirect()->back()->with('error', 'Invalid credentials');
            
        }
            session(['user' => $user]);
            return redirect()->route('website-home')->with('success', 'Login successful');
        }
        return view('website.auth.login');
    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('website-home')->with('success', 'Logout successful');
    }

    public function showForgotPasswordForm()
    {
        return view('website.auth.forgot-password');
    }

    
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
        $otp = rand(100000, 999999);

        session(['otp' => $otp, 'otp_email' => $request->email]);
        $user = User::where('email', $request->email)->first();
        if(!$user)
        return redirect()->back()->with('error', 'User not found');
        // Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
        //     $message->to($request->email)->subject('Your OTP for Password Reset');
        // });


        $details = [
            'title' => 'Mail from Shree spices',
            'body' => "Your OTP for Password Reset is",
            'otp' => "$otp"
        ];


        // Mail::send('emails.otp', ['name' => $user->name, 'otp' => $otp], function ($message) use ($request) {
        //     $message->to($request->email)
        //             ->subject('Your OTP for Password Reset');
        // });

        Mail::to($request->email)->send(new SendDemoMail($details));
        return response()->json(['success' => true, 'message' => 'OTP sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);
        if ($request->otp == session('otp')) {
            return response()->json(['success' => true, 'message' => 'OTP verified.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP.']);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', session('otp_email'))->first();
        $user->password = Hash::make($request->password);
        $user->save();

        session()->forget(['otp', 'otp_email']);

        return response()->json(['success' => true, 'message' => 'Password reset successfully.']);
    }
}
