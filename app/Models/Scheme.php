<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;
     //protected $primaryKey = 'scheme_id';
     protected $fillable = [
        'scheme_title', 'description', 'image', 'applying_fee', 'last_date', 'url', 'status'
    ];

}
