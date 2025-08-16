<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class MapController extends Controller
{
    public function showMap()
    {
        return Splade::render('map');
    }
}



