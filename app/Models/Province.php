<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipality;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province_view'; 
    protected $fillable = ['id','ProvinceName','Region_ID'];


    public function municipalities(){
        return $this->hasMany(Municipality::class, 'Province_ID', 'id');
    }
}
