<?php

namespace App\Http\Controllers;

use App\Models\identity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class IdentityController extends Controller
{
    public function kyc_pan_address_verify(Request $request) {
        try{
            return "working";
            $validate = Validator::make($request->all(), [
                'mobile_number' => 'required|digits:10|numeric',
                'password' => 'required|string|max:40',
            ],);
            if($validate->fails()){
                return back()->withInput()->withErrors($validate);
            }else{
                return back()->with("success",'successfully verified');
            }
        }
        catch(\Throwable $e){
            return back()->with("failed",$e->getmessage());
        }
    }
}
