<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedFrom extends Model
{
    use HasFactory;

    protected $table = 'rsbsa_received_from'; 
    protected $fillable = ['id','received_from'];
    
}
