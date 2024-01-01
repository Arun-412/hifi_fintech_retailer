<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Login(Request $request) {
        try{
            $validate = Validator::make($request->all(), [
                'mobile_number' => 'required|digits:10|numeric',
                'password' => 'required|string|max:40',
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }
            else{
                if (Auth::once(['mobile_number' => $request->mobile_number, 'password' => $request->password])) {
                    if(Auth::user()->door_mode != "HF00"){
                        return back()->withInput()->with("failed","Invalid Entry");
                    }else if(Auth::user()->door_status != "HFY"){
                        return back()->withInput()->with("failed","Account Deactivated");
                    }
                    else{
                        $user = Auth::user();
                        $user->mobile_otp = 123456;
                        $user->save();
                        return redirect('verify')->with("user",Auth::user()->mobile_number);
                    }
                }else{
                    return back()->withInput()->with("failed","Invalid credentials");
                }
            }
        }
        catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }

    public function Signin(Request $request) {
        try{
            $validate = Validator::make($request->all(), [
                'mobile_otp' => 'required|digits:6|numeric',
                'mobile_number' => 'required|digits:10|numeric',
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }
            else{
                $door_touch =  User::where(['mobile_number'=>$request->mobile_number])->first();
                if($door_touch['mobile_otp'] == $request->mobile_otp){
                    if (Auth::loginUsingId($door_touch->id)) {
                        $request->session()->regenerate();
                        return redirect()->intended('dashboard');
                    }else{
                        return back()->with("failed","Unable to Login");
                    }
                }else{
                    return back()->with("otp",$request->mobile_number);
                }
            }
        }
        catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }

    public function Register(Request $request){
        try{
            $validate = Validator::make($request->all(), [
                'shop_name' => 'required|string|min:3|max:40',
                'mobile_number' => 'required|digits:10|numeric|unique:doors',
                'email' => 'required|email|max:40|unique:doors',
                'password'=>'required|string|min:8|confirmed|max:40',
                'agree'=>'required'
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }
            else{
                if(!empty($request->distributer_code)){
                    if(User::where(['door_code'=>$request->distributer_code, 'door_mode'=>'HF11'])->exists()){
                        $door_access = User::create([
                            'door_code' => "HFR".Str::random(4)."S".Str::random(4),
                            'shop_name' => $request->shop_name,
                            'mobile_number' => $request->mobile_number,
                            'mobile_otp' =>123456,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'kyc_status' => "HFN",
                            'service_status'=>"HFN",
                            'door_mode' => "HF00",
                            'door_opened_by' => $request->distributer_code,
                            'door_status' => "HFY",
                            'door_price' => "HFN",
                            'awards'=>0,
                            'door_key' => 0
                        ]);
                        if($door_access){
                            return redirect('verify')->with("user",$request->mobile_number);
                        }else{
                            return back()->with("failed","Unable to Register");
                        }
                    }else{
                        return back()->withInput()->with("failed","Invalid Distributer Code");
                    }
                }else{
                    $door_access = User::create([
                        'door_code' => "HFR".Str::random(4)."S".Str::random(4),
                        'shop_name' => $request->shop_name,
                        'mobile_number' => $request->mobile_number,
                        'mobile_otp' =>123456,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'kyc_status' => "HFN",
                        'service_status'=>"HFN",
                        'door_mode' => "HF00",
                        'door_opened_by' => "HFS",
                        'door_status' => "HFY",
                        'door_price' => "HFN",
                        'awards'=>0,
                        'door_key' => 0
                    ]);
                    if($door_access){
                        return redirect('verify')->with("user",$request->mobile_number);
                    }else{
                        return back()->with("failed","Unable to Register");
                    }
                }
            }
        }
        catch(\Throwable $e){
            return back()->withInput()->with("failed",$e->getmessage());
        }
    }

    public function Logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
}
