<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'ifsc_code',
        'bank_usage'
    ];
    protected $hidden = [];
    protected $casts = [];
}
