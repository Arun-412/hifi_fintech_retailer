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
    private $Base_URL;
    private $Access_Key;
    public function __construct() {
        if(env("API_ACCESS_MODE") == "LIVE"){
            $this->Base_URL = env("API_PRODUCTION_URL");
            $this->Access_Key = env("API_PRODUCTION_ACCESS_KEY");
        }else if(env("API_ACCESS_MODE") == "TEST"){
            $this->Base_URL = env("API_STAGING_URL");
            $this->Access_Key = env("API_STAGING_ACCESS_KEY");
        }else{
            $this->Base_URL = env("API_LOCAL_URL");
            $this->Access_Key = env("API_LOCAL_ACCESS_KEY");         
        }
    }

    public function curl_post($data) {
        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL =>  $this->Base_URL.$data['url'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_POST => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $data['data'],
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                ),
            ));
            $responses = curl_exec($curl);
            $err = curl_error($curl);
            $response = 'Something went wrong from sending values for activation';
            if ($err) {
                $response = $err;
            }else{
                $response = $responses;
            }
            curl_close($curl);
            return json_decode($response);
        }catch(\Throwable $e){
            return $e->getmessage();
        }  
    }

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
                    $data = array(
                        "user"=>$user->user_code,
                        "mobile"=>$request->mobile_number
                    );
                    if($accounts_list){
                        $data["accounts"]=$accounts_list;
                        return redirect('payout/dashboard')->with("success",$data);
                    }   
                    else{
                        return redirect('payout/dashboard')->with("failed",$data);
                    }
                }
                else{
                    $data = array(
                        "url"=>'create_customer',
                        "data"=>
                            'mobile='.$request->mobile_number
                        ,
                    );
                    $customer = $this->curl_post($data);
                    if($customer->status == true){
                        $user_access = transactional_user::create([
                            'user_code' => "HFT".Str::random(4)."U".Str::random(4),
                            'mobile_number' => $request->mobile_number,
                            'created_by' => Auth::user()->door_code,
                            'status' => "HFY",
                        ]);
                        if($user_access){
                            $accounts_list = $this->user_accounts($user_code = $user_access->user_code);
                            $data = array(
                                "mobile"=>$request->mobile_number,
                                "user"=>$user_access->user_code
                            );
                            if($accounts_list){
                                $data['accounts'] = $accounts_list;
                                return redirect('payout/dashboard')->with("success",$data);
                            }   
                            else{
                                return redirect('payout/dashboard')->with("failed",$data);
                            }
                        }else{
                            return back()->with("failed","Unable to Register");
                        }
                    }
                    else{
                        return response()->json(['status'=>false,'message'=>$customer->message]);
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
