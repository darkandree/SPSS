<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RSBSAFormStatusView;

class UserView extends Model
{
    use HasFactory;

    protected $table = 'users'; 
    protected $fillable = ['emp_id','name'];


}
