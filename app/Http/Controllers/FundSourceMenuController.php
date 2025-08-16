<?php

namespace App\Http\Controllers;

use App\Tables\FundSourceTable;
use App\Tables\ProgramDistinctTable;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Maatwebsite\Excel\Excel;

use ProtoneMedia\Splade\FileUploads\ExistingFile;

class FundSourceMenuController extends Controller
{
    //
    public function index()
    {


        
         return view('fundsourcemenu.index', [
            'fundsource' => ProgramDistinctTable::class]);

    }


    

    public function create()
    {

    }


    public function store(RSBSAFormRequest $request)
    {
     
    

    }


    public function update(RSBSAStatusFormRequest $request, RSBSAForm $rform){

    }


    public function show(Request $id){
    }

    public function destroy()
    {

    
    }

}
