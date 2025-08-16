<?php

namespace App\Http\Controllers;


use App\Models\Province;
use App\Models\Municipality;
use App\Models\MunicipalityGeo;
use App\Models\FormStorage;
use App\Models\ReceivedFrom;

use App\Models\FundSource;
use App\Models\FundSourceView;

use App\Models\ProgramsView;

use App\Models\GAACodeView;


use App\Models\DivisionView;
use App\Models\SectionView;



use App\Models\MFOSView;
use App\Models\MFO1View;
use App\Models\MFOView;

use App\Models\ProjectView;
use App\Models\SubProjectView;

use App\Models\OthersView;
use App\Models\Others1View;

use App\Models\RequisitionView;

use App\Models\BudgetView;


use App\Models\InchargeView;


use App\Models\ApprovalView;

use App\Models\ProgramFocalView;


use App\Models\PPMP;

use App\Models\PPMPView;








use App\Tables\FundSourceTable;
use App\Tables\PPMPTable;
use App\Tables\PPMPDetailsTable;


use App\Models\RSBSAFormStatus;
use App\Models\RSBSAFormStatusView;

use App\Models\RSBSAForm;
use App\Models\RSBSAFormView;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RSBSAFormRequest;

use App\Http\Requests\RSBSAStatusFormRequest;

use App\Models\UserView;
use App\Tables\FormTable;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Maatwebsite\Excel\Excel;

use ProtoneMedia\Splade\FileUploads\ExistingFile;

class PPMPDetailsController extends Controller
{
    //
    public function index()
    {
        

         return view('ppmpmenu.index', [
            //'fundsource' => FundSourceTable::class
            
        ]);

    }


    public function indexMenuDetails($ppmpid)
    {




     

        $data = PPMPView::where('id',$ppmpid)->first();

    
     //  dd($data);

         return view('ppmpdetails.index', [
            'data' => $data,

            //'programs_id' => $programs_id,
           // 'calendar_id' => $calendar_id,

           // 'ppmp' => (new PPMPTable($programs_id, $calendar_id))->make(),

           'ppmpdetails' => (new PPMPDetailsTable($ppmpid))->make(),
        ]);

    }

    public function createWFP($data)
    {


        $data = PPMPView::where('id',$data)->first();

        //$budget_id = BudgetView::where('Status','Active');
        

        $gaa_code = GAACodeView::where('GAA_Status','Active')
            ->orderBy('GAACode','asc')
            ->pluck('GAACode', 'id')
            ->toArray();

        //--1--//
        $mfos = MFOSView::where('CALENDARYEAR',$data->CALENDAR_YEAR1)
            ->where('PROGRAMS_ID',$data->PROGRAMS_ID)
            ->orderBy('MFOS','asc')
            ->pluck('MFOS', 'id')
            ->toArray();

        //--2--//
        $mfo1 = MFO1View::where('MFOS_ID','')
            ->orderBy('MFO1','asc')
            ->pluck('MFO1', 'id')
            ->toArray();


            $mfo = MFOView::where('MFO1_ID','')
            ->orderBy('MFO','asc')
            ->pluck('MFO', 'id')
            ->toArray();

            $project = ProjectView::where('MFO_ID','')
            ->orderBy('PROJECTS','asc')
            ->pluck('PROJECTS', 'id')
            ->toArray();

            $subproject = SubProjectView::where('PROJECT_ID','')
            ->orderBy('SUBPROJECT','asc')
            ->pluck('SUBPROJECT', 'id')
            ->toArray();

            $others = OthersView::where('SUBPROJECT_ID','')
            ->orderBy('OTHERS','asc')
            ->pluck('OTHERS', 'id')
            ->toArray();


            $others1 = Others1View::where('OTHERS_ID','')
            ->orderBy('OTHERS1','asc')
            ->pluck('OTHERS1', 'id')
            ->toArray();


        
        return view('ppmpdetails.createWFP', [

            'GAA_CODE' => $gaa_code,
            'MFOS' => $mfos,
            'MFO1' => $mfo1,
            'MFO' => $mfo,
            'PROJECT' => $project,
            'SUBPROJECT' => $subproject,
            'OTHERS' => $others,
            'OTHERS1' => $others1,

        ]);

    }


    public function createPPMP($prog_id, $cy_id)
    {


        $tempProgId = $programs_id;
        $tempCyId = $calendar_id;




        $programs_id = ProgramsView::where('id', $programs_id)
            ->orderBy('Programs','asc')
            ->pluck('Programs', 'id')
            ->toArray();

            $division_id = DivisionView::orderBy('Division','asc')
            ->pluck('Division', 'id')
            ->toArray();


            $requisition_id = RequisitionView::orderBy('Requistion','asc')
            ->pluck('Requistion')
            ->toArray();


            $budget_id = BudgetView::where('Status','Active')
            ->orderBy('BUDGET','asc')
            ->pluck('BUDGET','id')
            ->toArray();


            $incharge_id = InchargeView::orderBy('INCHARGE','asc')
            ->pluck('INCHARGE')
            ->toArray();

            $approval_id = ApprovalView::where('Status','Active')
            ->orderBy('Approval','asc')
            ->pluck('Approval','id')
            ->toArray();



            //"Active"
            $program_focal_id = ProgramFocalView::where('FOC_STATUS','Active')
            ->orderBy('PROGRAMFOCAL','asc')
            ->pluck('PROGRAMFOCAL','id')
            ->toArray();


            // $table = SpladeTable::for(PPMPTable::where('PROGRAMS_ID', $tempProgId)
            //                       ->where('CALENDAR_YEAR1', $tempCyId));





            //                       dd($table);

// 'frms' => EncoderAccomplishmentTable::class
        
         return view('ppmpmenu.createPPMP', [

          //  'ppmp' => PPMPTable::make($tempProgId, $tempCyId),



            'PROGRAMS_ID' => $programs_id,
            'CALENDARYEAR_ID' => $calendar_id,
            'DIVISION_ID' => $division_id,
            'PREPARED' => $requisition_id,
            'VERIFIED' => $budget_id,
            'RECOMMENDED' => $incharge_id,
            'APPROVED' => $approval_id,
            'PROGRAMFOCAL' => $program_focal_id,

           // 'FUND_ID' => $programs_id,
           // 'DIVISION_ID' => $programs_id,
           // 'SECTION_ID' => $programs_id,
           // 'CALENDAR_YEAR1' => $calendar_id,
           // 'APPROVED' => $calendar_id,
           // 'PROGRAMFOCAL' => $calendar_id,
           // 'VERIFIED' => $calendar_id,
           
        ]);

    }





    public function qrcReceive()
    {
         return view('rforms.qrcReceive');
    }
    

    public function create()
    {
        return view('rforms.create', [
            'province_id' => Province::orderBy('ProvinceName','asc')->pluck('ProvinceName', 'id')->toArray(),
            'storage_id' => FormStorage::pluck('storage', 'id')->toArray(),
            'receivedfrom_id' => ReceivedFrom::pluck('received_from', 'id')->toArray()
        ]);
    }


    public function distributeForm()
    {

        return view('rforms.distributeForm', [
            'encodedby_id' => UserView::orderBy('name','asc')->pluck('name', 'emp_id')->toArray(),
            'rsbsa_forms' => RSBSAFormStatusView::where('DOCUMENTSTATUS','For Distribution')->orderBy('document_id','desc')->pluck('document_id')->toArray(),
        ]);
    }


    public function receiveForm()
    {
        return view('rforms.receiveForm', [
           // 'encodedby_id' => UserView::orderBy('name','asc')->pluck('name', 'emp_id')->toArray(),
            'rsbsa_forms' => RSBSAFormStatusView::where('DOCUMENTSTATUS','Distributed')->orderBy('document_id','desc')->pluck('document_id')->toArray(),
       
       
        ]);
    }



    public function receiveFormQr($id)
    {
        $document_id = RSBSAFormStatus::with('document_id')->find($id);

        RSBSAFormStatus::where('document_id',$id)->update([
            'date_returned' => now(),
            'returnedto_id' => Auth::user()->emp_id,
       ]);
        Toast::title('Receive Forms')->autoDismiss(2);
    }

    public function updateReceiveForm(Request $request)
    {
        $tempEncodedBy = Auth::user()->emp_id;

       foreach($request->rsbsa_forms as $rforms){

        RSBSAFormStatus::where('document_id',$rforms)->update([
            'returnedto_id' => $tempEncodedBy,
            'date_returned' => now()
        ]);
        }
        Toast::title('Record Updated')->autoDismiss(3);
        return back();
    }


    public function updateDistributeForm(Request $request)
    {
        $tempEncodedBy = Auth::user()->emp_id;

        foreach($request->rsbsa_forms as $rforms){

        RSBSAFormStatus::where('document_id',$rforms)->update([
            'distributedby_id' => $tempEncodedBy,
            'date_distributed' => now(),
            'encodedby_id' => $request->encodedby_id
        ]);
        }
        Toast::title('Record Updated')->autoDismiss(3);
        return back();
    }


    public function store(Request $request)
    {



       // dd($request);
        // dd(date('Y-m-d H:i:s'));


        // dd(Auth::user()->user_id);


     
        // $tempCount = RSBSAFormView::count()+1;

        // $tempMonth = date('m');
        // $tempDay = date('d');
        // $tempYear = date('Y');
        
        // $tempDocumentId = $tempYear . $tempMonth . $tempDay . '_' . $tempCount;

        // $tempReceivedBy = Auth::user()->emp_id;


        // $request->validated();

        // $tempProvName = Province::where('id',$request->province_id)->value('id');
        // $tempMunName = Municipality::where('id',$request->municipality_id)->value('id');

        // //Storage::disk('public')->makeDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);
        // Storage::disk('public')->makeDirectory('uploads/'.$tempProvName .'/'. $tempMunName);
    
        // if($request->hasFile('file_location'))
        // {

        //         //dd($file->getClientOriginalName());
        //         //$request->file('file_location')->storeAs('uploads/'. $tempProvName  .'/'. $tempMunName .'/'. $tempDocumentId,  $request->file('file_location')->getClientOriginalName());
            
        //         $request->file('file_location')->storeAs('uploads/'. $tempProvName  .'/'. $tempMunName , $tempDocumentId.'.'.$request->file('file_location')->getClientOriginalExtension());
            
        

        PPMP::create([
            'PROGRAMS_ID' => $request->PROGRAMS_ID,
            'FUND_ID' => $request->FUND_ID,
            'DIVISION_ID' => $request->DIVISION_ID,
            'SECTION_ID' => $request->SECTION_ID,
            'TOTAL_ALLOCATION' => $request->TOTAL_ALLOCATION,


            'CALENDAR_YEAR1' => $request->CALENDARYEAR_ID,

            //--Varchar--//
            'PREPARED' => $request->PREPARED,

            //--Integer--//
            'VERIFIED' => $request->VERIFIED,

            //--Varchar--//
            'RECOMMENDED' => $request->RECOMMENDED,

            //--Integer--//
            'APPROVED' => $request->APPROVED,

            //--Integer--//
            'PROGRAMFOCAL' => $request->PROGRAMFOCAL,

            //--Integer--//
            'PPMP_STATUS' => 'Open',

            'USER_ID' =>  Auth::user()->user_id,

            'APP_REMARKS' => 1,

            'DATE_ENCODED' => date('Y-m-d H:i:s'),
            
             ]);

        Toast::title('Record Saved!')->autoDismiss(3);
        return back();

    }

    public function view($file_location){


        $Doc = RSBSAForm::find($file_location);
        return view('rforms.view',compact('Doc'));
    
    }


    public function editPPMP(PPMPView $data)
    {


    //     $TOTAL_ALLOCATION = $data->TOTAL_ALLOCATION = fmod($data->TOTAL_ALLOCATION, 1) === 0.0
    // ? number_format($data->TOTAL_ALLOCATION, 0)
    // : number_format($data->TOTAL_ALLOCATION, 2);


    $data->TOTAL_ALLOCATION = number_format((float)$data->TOTAL_ALLOCATION, 2, '.', '');



        $programs_id = ProgramsView::where('id', $data->PROGRAMS_ID)
        ->orderBy('Programs','asc')
        ->pluck('Programs', 'id')
        ->toArray();

        $division_id = DivisionView::orderBy('Division','asc')
        ->pluck('Division', 'id')
        ->toArray();


        $requisition_id = RequisitionView::orderBy('Requistion','asc')
        ->pluck('Requistion')
        ->toArray();


        $budget_id = BudgetView::where('Status','Active')
        ->orderBy('BUDGET','asc')
        ->pluck('BUDGET','id')
        ->toArray();


        $incharge_id = InchargeView::orderBy('INCHARGE','asc')
        ->pluck('INCHARGE')
        ->toArray();

        $approval_id = ApprovalView::where('Status','Active')
        ->orderBy('Approval','asc')
        ->pluck('Approval','id')
        ->toArray();

        $program_focal_id = ProgramFocalView::where('FOC_STATUS','Active')
        ->orderBy('PROGRAMFOCAL','asc')
        ->pluck('PROGRAMFOCAL','id')
        ->toArray();

    
        return view('ppmpdetails.editPPMP', [
        'PROGRAMS_ID' => $programs_id,
        'CALENDARYEAR_ID' => $data->CALENDAR_YEAR1,
        'DIVISION_ID' => $division_id,
        'PREPARED' => $requisition_id,
        'VERIFIED' => $budget_id,
        'RECOMMENDED' => $incharge_id,
        'APPROVED' => $approval_id,
        'PROGRAMFOCAL' => $program_focal_id,
        'data' => $data,
       
    ]);

    }

    public function update(Request $request, PPMP $ppmp){
        

        PPMP::where('PPMP_ID',$request->id)->update([

       // $ppmp->update([
            'PROGRAMS_ID' => $request->PROGRAMS_ID,
            'FUND_ID' => $request->FUND_ID,
            'DIVISION_ID' => $request->DIVISION_ID,
            'SECTION_ID' => $request->SECTION_ID,
            'TOTAL_ALLOCATION' => $request->TOTAL_ALLOCATION,


            'CALENDAR_YEAR1' => $request->CALENDARYEAR_ID,

            //--Varchar--//
            'PREPARED' => $request->PREPARED,

            //--Integer--//
            'VERIFIED' => $request->VERIFIED,

            //--Varchar--//
            'RECOMMENDED' => $request->RECOMMENDED,

            //--Integer--//
            'APPROVED' => $request->APPROVED,

            //--Integer--//
            'PROGRAMFOCAL' => $request->PROGRAMFOCAL,

            //--Integer--//
            //'PPMP_STATUS' => 'Open',

            //'USER_ID' =>  Auth::user()->user_id,

            //'APP_REMARKS' => 1,

            //'DATE_ENCODED' => date('Y-m-d H:i:s'),
            
             ]);



        Toast::title('Record Updated!')->autoDismiss(3);
        return back();
        
    }


    public function show(Request $id){
    }



    public function editAttachments(RSBSAFormStatusView $document)
    {

        $tempProvName = Province::where('id',$document->province_id)->value('ProvinceName');
        $tempMunName = Municipality::where('id',$document->municipality_id)->value('MunCityName');
        $tempDocumentId = RSBSAFormView::where('document_id',$document->document_id)->value('document_id');

        $images = Storage::disk('public')->files('uploads/'.$tempProvName.'/'.$tempMunName.'/'.$tempDocumentId.'/');

        $items = array();
        //dd($images);

        foreach($images as $image){
            $items[] = ExistingFile::fromDisk('public')->get($image);
        }

        return view('rforms.editAttachments',['document'=>$document,'images'=>$items]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateAttachments(request $request,RSBSAForm $document)
    {

       // dd($document);
   

        $tempProvName = Province::where('id',$document->province_id)->value('ProvinceName');
        $tempMunName = Municipality::where('id',$document->municipality_id)->value('MunCityName');
        $tempDocumentId = RSBSAFormView::where('document_id',$document->document_id)->value('document_id');

        //Storage::delete('public'('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId));
        //$testing = 'public'('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId));
        //Storage::disk('public')->deleteDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);
        //Storage::deleteDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);
        //Storage::disk('public')->deleteDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);
        //dd(public_path('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId));

       // Storage::deleteDirectory(public_path('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId));

        Storage::disk('public')->deleteDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);

        //dd(Storage::disk('public'));
        //Storage::deleteDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);

        Storage::disk('public')->makeDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);

        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $file) {
                //dd($file->getClientOriginalName());
                $file->storeAs('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId,  $file->getClientOriginalName());
            }
        }


        Toast::title('Record Saved!')->autoDismiss(2);
        //return redirect()->route('forms.index');
        return back();



       
    }


    public function destroy()
    {
        //

    
    }

}
