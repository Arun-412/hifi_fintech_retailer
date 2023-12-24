<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function search_report(Request $request){
        $d = DB::table('doors')->orderBy('created_at','DESC')->get();
        $c = DB::table('eko_payout_charges')->orderBy('created_at','DESC')->get();
        $m = $c->merge($d);
        $s = $m->sortByDesc('created_at');
        $r = $s->take(5);
        return $r;
    }
}
