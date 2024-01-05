<?php

namespace App\Http\Controllers;

use App\Models\transactional_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TransactionalUserController extends Controller
{
    public function user_login(Request $request){
        try{
            $validate = Validator::make($request->all(), [
                'mobile_number' => 'required|digits:10|numeric',
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }
            else{
                if(transactional_user::where(['mobile_number'=>$request->mobile_number])->exists()){
                    return redirect('payout/dashboard')->with("user",$request->mobile_number);
                }
                else{
                    $user_access = transactional_user::create([
                        'user_code' => "HFT".Str::random(4)."U".Str::random(4),
                        'mobile_number' => $request->mobile_number,
                        'created_by' => Auth::user()->door_code,
                        'status' => "HFY",
                    ]);
                    if($user_access){
                        return redirect('payout/dashboard')->with("user",$request->mobile_number);
                    }else{
                        return back()->with("failed","Unable to Register");
                    }
                }
            }
        }catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }
}
