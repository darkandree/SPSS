<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Models\Province;
use App\Models\Municipality;


use App\Models\ProvinceGeo;
use App\Models\MunicipalityGeo;


use App\Models\User;
use App\Models\UserView;


use App\Models\VerifiedParcelProvinceView;
use App\Models\VerifiedParcelMunicipalityView;
use App\Models\VerifiedParcelBarangayView;





//PPMP
use App\Models\FundSourceView;
use App\Models\DivisionView;
use App\Models\SectionView;


//PPMP
use App\Models\MFO1View;

use App\Models\MFOView;

use App\Models\ProjectView;

use App\Models\SubProjectView;


use App\Models\OthersView;

use App\Models\Others1View;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/municipalities/{province}',function($province){
    $province = Province::find($province);
    return response()->json($province->municipalities);
});



Route::get('/municipalities/{province}',function($province){
    $province = Province::find($province);
    return response()->json($province->municipalities);
});

Route::get('/municipalitiesgeo/{province}',function($province){

   
    $province = ProvinceGeo::find($province);
    return response()->json($province->municipalitiesgeo);
});


Route::get('/barangaygeo/{municipality}',function($municipality){
    $municipality = MunicipalityGeo::find($municipality);
    return response()->json($municipality->barangaygeo);
});


Route::get('/receiveRforms/{encodedby}',function($encodedby){

    //get(default_id)
    //where('define column')
    
    $encodedby = UserView::find('emp_id',$encodedby);
    return response()->json($encodedby->RSBSAFormStatusView);
});








//VerifiedParcelMunicipalityDropdownSelect
Route::get('/vpmunicipalities/{province}',function($province){

   // $province = $province ?? 'All';

   if($province === 'All' || empty($province)){
    //Filter Provinces in Region 8
    $province = VerifiedParcelMUnicipalityView::orderBy('province', 'asc')        
                       ->get();                         
                        
    }else{
    $province = VerifiedParcelMUnicipalityView::where('province',$province)
                            ->orderBy('province', 'asc')                         
                            ->get();              
}

    return response()->json($province);
});

//VerifiedParcelBarangayDropdownSelect
Route::get('/vpbarangays/{municipality}',function($municipality){

    if($municipality === 'All' || empty($municipality)){
        //Filter Provinces in Region 8
        $municipality = VerifiedParcelBarangayView::orderBy('municipality', 'asc')        
                                ->get();
                                
                                
    }else{
        $municipality = VerifiedParcelBarangayView::where('municipality',$municipality)
                                ->orderBy('municipality', 'asc')                         
                                ->get();
    }


    return response()->json($municipality);
});








Route::get('/verifiedparcelpmunicipalities/{province}',function($province){

    // $province = $province ?? 'All';
 
     if($province === 'All' || empty($province)){
         //Filter Provinces in Region 8
         $province = VerifiedParcelMUnicipalityView::orderBy('province', 'asc')        
                            ->get();                         
                             
     }else{
         $province = VerifiedParcelMUnicipalityView::where('province',$province)
                                 ->orderBy('province', 'asc')                         
                                 ->get();              
     }
 
     return response()->json($province);
 });


 Route::get('/verifiedparcelbarangays/{municipality}',function($municipality){

    // $province = $province ?? 'All';
 
     if($municipality === 'All' || empty($municipality)){
         //Filter Provinces in Region 8
         $municipality = VerifiedParcelBarangayView::orderBy('municipality', 'asc')        
                                 ->get();
                                 
                                 
     }else{
         $municipality = VerifiedParcelBarangayView::where('municipality',$municipality)
                                 ->orderBy('municipality', 'asc')                         
                                 ->get();
     }
 
 
     return response()->json($municipality);
 });







//PPMP MENU
    Route::get('/ppmpfundsource/{programs}/{calendaryear}',function($programs,$calendaryear){
         $programs = FundSourceView::where('PROGRAMS_ID',$programs)
                                ->where('CALENDARYEAR_ID',$calendaryear)
                                ->orderBy('FUNDSOURCE', 'asc')                         
                                ->get();              
     return response()->json($programs);
    });

    Route::get('/ppmpsection/{division}',function($division){
        $division = SectionView::where('Division_ID',$division)
                               ->orderBy('Section', 'asc')                         
                               ->get();              
    return response()->json($division);
   });

//PPMP DETAILS
    //ppmpdetailsmfos

Route::get('/ppmpdetailsmfos/{mfos}',function($mfos){
    $mfos = MFO1View::where('MFOS_ID',$mfos)
                           ->orderBy('MFO1', 'asc')                         
                           ->get();              
return response()->json($mfos);
});

Route::get('/ppmpdetailsmfo1/{mfo1}',function($mfo1){
    $mfo1 = MFOView::where('MFO1_ID',$mfo1)
                           ->orderBy('MFO', 'asc')                         
                           ->get();              
return response()->json($mfo1);
});

Route::get('/ppmpdetailsmfo/{mfo}',function($mfo){
    $mfo = ProjectView::where('MFO_ID',$mfo)
                           ->orderBy('PROJECTS', 'asc')                         
                           ->get();              
return response()->json($mfo);
});

Route::get('/ppmpdetailsproject/{project}',function($project){
    $project = SubProjectView::where('PROJECT_ID',$project)
                           ->orderBy('SUBPROJECT', 'asc')                         
                           ->get();              
return response()->json($project);
});

Route::get('/ppmpdetailssubproject/{subproject}',function($subproject){
    $subproject = OthersView::where('SUBPROJECT_ID',$subproject)
                           ->orderBy('OTHERS', 'asc')                         
                           ->get();              
return response()->json($subproject);
});

Route::get('/ppmpdetailsothers/{others}',function($others){
    $others = Others1View::where('OTHERS_ID',$others)
                           ->orderBy('OTHERS1', 'asc')                         
                           ->get();              
return response()->json($others);
});

