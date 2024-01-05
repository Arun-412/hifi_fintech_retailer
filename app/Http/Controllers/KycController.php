<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class KycController extends Controller
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
            $response = 'Something went wrong from sending values for kyc';
            if ($err) {
                $response = "Something went wrong in KYC verification";
            }else{
                $response = $responses;
            }
            curl_close($curl);
            return json_decode($response);    
        }catch(\Throwable $e){
            return $e->getmessage();
        }
    }
    
    public function kyc_pan_address_verify(Request $request) {
        try{ 
            $validate = Validator::make($request->all(), [
                'pan_number' => 'required|string|min:10|max:10',
                'date_of_birth'=> 'required|string|min:10|max:10',
                'street'=>'required|string|min:10|max:40',
                'city'=>'required|string|min:5|max:20',
                'state'=>'required|string|min:5|max:20',
                'pincode'=>'required|digits:6|numeric',
                'aadhar_number'=>'required|digits:12|numeric'
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }
            else{
                if( DB::table('identities')->where(['pan_number'=>$request->pan_number])->exists()){
                    return back()->withInput()->with("failed","PAN Number already Taken use different one to complete your KYC");
                }
                elseif(DB::table('identities')->where(['aadhar_number'=>$request->aadhar_number])->exists()){
                    return back()->withInput()->with("failed","Aadhar Number already Taken use different one to complete your KYC");
                }
                else{
                    $data = array(
                        "url"=>'kyc/pan_address',
                        "data"=>
                            'token='.$this->Access_Key.
                            '&pan='.strtoupper($request->pan_number).
                            '&aadhar_number='.$request->aadhar_number.
                            '&door_code='.Auth::user()->door_code.
                            '&date_of_birth='.$request->date_of_birth.
                            '&street='.$request->street.
                            '&city='.$request->city.
                            '&state='.$request->state.
                            '&pincode='.$request->pincode
                        ,
                    );
                    $Pan_address = $this->curl_post($data);
                    if($Pan_address->status == true){
                        return redirect('dashboard')->with("success",$Pan_address->message);
                    }else{
                        return back()->withInput()->with("failed",$Pan_address);
                    }
                }
            }
        }
        catch(\Throwable $e){
            return back()->withInput()->with("failed",$e->getmessage());
        }
    }
}
