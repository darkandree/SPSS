<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPMPDetails extends Model
{
    use HasFactory;

    protected $table = 'PPMP Table1'; 
    protected $fillable = [
                            'PROGRAMS_ID','FUND_ID','DIVISION_ID','SECTION_ID',
                            'TOTAL_ALLOCATION','CALENDAR_YEAR1',
                            'PREPARED','VERIFIED','RECOMMENDED','APPROVED',
                            'PPMP_STATUS','USER_ID',
                            'APP_Code','APP_REMARKS',
                            'DATE_ENCODED','created_at','updated_at'
                        ];
}
