<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactional_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'mobile_number',
        'accounts',
        'verify_otp',
        'status'
    ];
    protected $hidden = [];
    protected $casts = [];
}
