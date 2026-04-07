<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
     protected $fillable = [
        'package_name',
        'package_duration',
        'package_cost',
        'package_covered',
        'package_description',
        'from_date',
        'to_date',
        'plane_type',
        'couple_price',
        'image'
    ];
}
