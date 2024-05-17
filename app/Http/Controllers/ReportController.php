<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\sand;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function search_report(Request $request){
        // return $request->all();
        // return $request->from_date."00:00:00 - ".$request->to_date."23:59:59";
        // $d = DB::table('doors')->orderBy('created_at','DESC')->get();
        // $c = DB::table('sands')->where(['created_by'=>Auth::user()->door_code])->orderBy('created_at','DESC')->get();
        // $m = $c->merge($d);
        // $s = $m->sortByDesc('created_at');
        // $r = $s->take(5);
        // return $c;
        $reports = sand::where(['created_by'=>Auth::user()->door_code])->whereBetween('created_at', [$request->from_date." 00:00:00",$request->to_date." 23:59:59"])->orderBy('created_at','DESC')->get();
        return view('report')->with("data",$reports);
        // return $reports;
    }

    public function report (Request $request) {
        try{
            $reports = sand::where(['created_by'=>Auth::user()->door_code])->whereDate('created_at', date('Y-m-d'))->orderBy('created_at','DESC')->get();
            return view('report')->with("data",$reports);
        }
        catch(\Throwable $e){
            return response()->json(['status'=>false,'message'=>$e->getmessage()]);
        }
    }

    public function print(Request $request) {
        try{
            $validate = Validator::make($request->all(), [
                'transaction_id_print' => 'required|string|max:20',
            ],);
            if($validate->fails()){
                return response()->json(['status'=>false,'message'=>$validate->errors()->toArray()[array_keys($validate->errors()->toArray())[0]][0]]);
            }
            else{
                if(sand::where(['sandt_Hid'=>$request->transaction_id_print])->exists()){
                    $print = sand::where(['sandt_Hid'=>$request->transaction_id_print])->first();
                    return redirect('print')->with("success",$print);
                }
                else{
                    return response()->json(['status'=>false,'message'=>"Transaction detail not found"()]);
                }
            }
        }
        catch(\Throwable $e){
            return response()->json(['status'=>false,'message'=>$e->getmessage()]);
        }
    }
}
