<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barangay;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipality_view'; 
    protected $fillable = ['id','Province_ID','MunCityName','RcodeNum'];


    public function barangays(){
        return $this->hasMany(Barangay::class, 'MUNICIPALITY_ID', 'id');
    }
}
