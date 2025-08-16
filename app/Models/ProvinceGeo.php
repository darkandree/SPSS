<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MunicipalityGeo;

class ProvinceGeo extends Model
{
    use HasFactory;

    protected $table = 'province_geo_view'; 
    protected $fillable = ['id','province'];

    public function municipalitiesgeo(){
        return $this->hasMany(MunicipalityGeo::class, 'province_id', 'id')->orderBy('municipality');
    }
}
