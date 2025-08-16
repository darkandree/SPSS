<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundSource extends Model
{
    use HasFactory;

    protected $table = 'Fund Source Table'; 
    protected $fillable = ['FUNDSOURCE','PROGRAMS_ID','PROGRAMSNAME','FS_DESCRIPTION','FUND_CATEGORY','CALENDARYEAR_ID','CALENDARYEARNAME'];
    
}
