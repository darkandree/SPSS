<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $table = 'barangay_view'; 
    protected $fillable = ['id','REGION_ID','REGION_ID','PROVINCE_ID','MUNICIPALITY_ID','BARANGAY'];

}
