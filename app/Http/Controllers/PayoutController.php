<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
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
        $response = 'Something went wrong from sending values for kyc';
        if ($err) {
            $response = $err;
        }else{
            $response = $responses;
        }
        curl_close($curl);
        return json_decode($response);    
    }

    public function activate_payout (Request $request) {
        $service = json_decode(Auth::user()->service_status);
        if(empty($service->payout)){
            $data = array(
                "url"=>'activate_service',
                "service_code"=>4
            );
            $Pan_address = $this->curl_post($data);
            if($Pan_address->status == true){
                $update_kyc = Auth::user(); 
                $update_kyc->kyc_status = "HFY";
                $update_kyc->save();
                return redirect('dashboard')->with("success",$Pan_address->message);
            }else{
                return back()->withInput()->with("failed",$Pan_address->message);
            }
        }
        else{
            return back()->withInput()->with("failed","Service already Activated and ready use");
        }
    }

    public function payout_user(Request $request) {
        try{
            $validate = Validator::make($request->all(), [
                'mobile_number' => 'required|digits:10|numeric',
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }
            else{
                return redirect('/payout/dashboard');
            }
        }
        catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }

    public function add_account(Request $request) {
        return response()->json('success');
    }
}
