<?php

use App\Http\Controllers\DBController;

use App\Http\Controllers\ProfileController;


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\QRScannerController;




use App\Http\Controllers\HomeController;


use App\Http\Controllers\MapController;



use App\Http\Controllers\DownloadsController;

 

use App\Http\Controllers\UserCredentialController;



use App\Http\Controllers\FundSourceMenuController;

use App\Http\Controllers\PPMPController;


use App\Http\Controllers\PPMPDetailsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();



    Route::get('/',function(){
        return view('welcome');
    });


    Route::get('/modal-content', function () {
        return view('modal-content');
    });






    //SPSS

    Route::resource('/usercredentials',UserCredentialController::class);


    Route::get('usercredentials/getUserCredential/{userlogin}/{userloginpassword}', [UserCredentialController::class, 'getUserCredential']);



    Route::resource('/fundsourcemenu',FundSourceMenuController::class);

    
    Route::resource('/ppmpmenu',PPMPController::class);

    Route::get('/ppmpmenu/indexMenu/{programs_id}/{calendar_id}', [PPMPController::class, 'indexMenu'])->name('indexMenu');


    Route::get('/ppmpmenu/createPPMP/{programs_id}/{calendar_id}', [PPMPController::class, 'createPPMP'])->name('createPPMP');



    Route::resource('/ppmpdetails',PPMPDetailsController::class);

    Route::get('/ppmpdetails/indexMenuDetails/{ppmp_id}', [PPMPDetailsController::class, 'indexMenuDetails'])->name('indexMenuDetails');


    Route::get('ppmpdetails/{data}/editPPMP',[PPMPDetailsController::class,'editPPMP'])->name('editPPMP');


    Route::get('/ppmpdetails/createWFP/{data}',[PPMPDetailsController::class,'createWFP'])->name('createWFP');





    Route::get('/daisyui', fn () => view('daisyui'))->name('daisyui');

    Route::get('/qrcScanner', [QRScannerController::class, 'index']);


    Route::middleware('auth')->group(function () {
        

       
       Route::get('/downloadGpxFile/{file_path}', [DownloadsController::class, 'downloadGpxFile'])->name('downloadGpxFile');
       Route::get('/storage/{file_path}', [DownloadsController::class, 'downloadAttachmentFile'])->name('downloadAttachmentFile');


       Route::get('/dashboard', [DBController::class,'index'])->middleware(['verified'])->name('dashboard');

        
        Route::resource('/home',HomeController::class);

       


        Route::get('/map', [MapController::class, 'showMap']);

        Route::resource('/profiling',ProfilingController::class);


        Route::resource('/roles',RoleController::class);

        Route::resource('/users',UserController::class);

        Route::resource('/permissions',PermissionController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';

});
