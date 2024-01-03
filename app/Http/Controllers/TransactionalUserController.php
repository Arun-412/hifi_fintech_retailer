<?php

namespace App\Http\Controllers;

use App\Models\transactional_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionalUserController extends Controller
{
    public function user_login(Request $request){
        return "working";
    }
}
