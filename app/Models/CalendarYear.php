<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarYear extends Model
{
    use HasFactory;

    protected $table = 'Calendar Year Code'; 
    protected $fillable = ['Calendar Year','CY_Status'];
    
}
