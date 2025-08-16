<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccomplishmentImport extends Model
{
    use HasFactory;

    protected $table ='encoder_accomplishment_details';
    protected $fillable = [
            'document_id',
            'upload_id',
            'encodedby_id',
            'rsbsa_no',
            'fullname',
            'sex',
            'birthday',
            'date_encoded',
            'upload_type'
                
    ];
}
