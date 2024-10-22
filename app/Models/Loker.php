<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $fillable = [
        'bid',
        'nampe',
        'kual',
        'job',
        'dl',
    ];
    protected $hidden = [
        'remember_token',
    ];
}
