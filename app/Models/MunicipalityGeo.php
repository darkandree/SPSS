<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangayGeo;

class MunicipalityGeo extends Model
{
    use HasFactory;

    protected $table = 'municipality_geo_view'; 
    protected $fillable = ['id','province_id','municipality'];


    public function barangaygeo(){
        return $this->hasMany(BarangayGeo::class, 'municipality_id', 'id')->orderBy('barangay');
    }
}
