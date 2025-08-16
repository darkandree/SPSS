<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayGeo extends Model
{
    use HasFactory;

    protected $table = 'barangay_geo_view'; 
    protected $fillable = ['id','province_id','municipality_id','barangay'];

}

