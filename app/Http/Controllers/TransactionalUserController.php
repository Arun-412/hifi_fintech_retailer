<?php

namespace App\Http\Controllers;

use App\Models\transactional_user;
use App\Models\sandstone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\stoneseeds;
use DB;

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
                    $user = transactional_user::select('user_code')->where(['mobile_number'=>$request->mobile_number])->first();
                    $accounts_list = $this->user_accounts($user_code = $user->user_code);
                    if($accounts_list){
                        return redirect('payout/dashboard')->with("success",$accounts_list);
                    }   
                    else{
                        return redirect('payout/dashboard')->with("failed",0);
                    }
                }
                else{
                    $user_access = transactional_user::create([
                        'user_code' => "HFT".Str::random(4)."U".Str::random(4),
                        'mobile_number' => $request->mobile_number,
                        'created_by' => Auth::user()->door_code,
                        'status' => "HFY",
                    ]);
                    if($user_access){
                        $accounts_list = $this->user_accounts($user_code = $user_access->user_code);
                        return view('payout/dashboard')->with("success",$accounts_list);
                    }else{
                        return back()->with("failed","Unable to Register");
                    }
                }
            }
        }catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }

    public function user_accounts($user_code) {
        try{
            if(sandstone::select('account_code')->where(['user_code'=>$user_code])->exists()){
                $accounts = sandstone::select('account_code')->where(['user_code'=>$user_code])->get();   
                $accounts_ids = [];
                foreach($accounts as $key=>$value){
                    if($value->account_code != ""){
                        array_push($accounts_ids,$value->account_code);
                        continue;
                    }
                    else{
                        break;
                    }
                }
                $accounts_list = [];
                if($accounts_ids != ''){
                    foreach($accounts_ids as $key=>$value){
                        $account = stoneseeds::where(['account_code'=>$value])->first();
                        array_push($accounts_list,$account);
                    }
                }
                return $accounts_list;    
            }
            else{
                return;
            }
        }
        catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }
}
