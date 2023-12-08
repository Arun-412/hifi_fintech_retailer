<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayoutController extends Controller
{
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
