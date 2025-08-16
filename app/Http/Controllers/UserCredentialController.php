<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;

use App\Models\Province;
use App\Models\Municipality;
use App\Models\RFFANotifications;




use App\Models\User;

use App\Models\UserSPSSView;



use App\Models\RffaProfilePicture;
use App\Models\RffaForms;
use App\Models\RffaAttachments;
use App\Models\RffaStatus;



use App\Models\RSBSAFormStatus;
use App\Models\RSBSAFormStatusView;

use App\Models\RSBSAForm;
use App\Models\RSBSAFormView;
use App\Models\RffaValidation;
use App\models\Georeferenced;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RSBSAFormRequest;

use App\Http\Requests\RSBSAStatusFormRequest;

use App\Tables\RffaTable;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Maatwebsite\Excel\Excel;

use ProtoneMedia\Splade\FileUploads\ExistingFile;

use Barryvdh\DomPDF\Facade\Pdf;
//use Intervention\Image\Facades\Image;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\JpegEncoder;



class UserCredentialController extends Controller
{
    public function index()
{
   


    return view('usercredentials.index');

             
}



public function getUserCredential(string $userlogin, string $userloginpassword)
{


    //dd($userlogin, $userloginpassword);

  //  $rsbsaInfo = rsbsaInfo::where('rsbsa_no', $rsbsanum)->first();

    $data = UserSPSSView::where('USERLOGIN', $userlogin)
                        ->where('PASSWORD', $userloginpassword)
                        ->first();
    
 return response()->json([
        'user_id' => $data->USER_ID,
        'username' => $data->USERNAME,
        'user_security' => $data->USER_SECURITY,
        'section_id' => $data->SECTION_ID,
        'showUserDetails' => 'true'
    ]);

  
}
      


    public function create()
    {
        /*
        return view('rforms.create', [
            'province_id' => Province::orderBy('ProvinceName','asc')->pluck('ProvinceName', 'id')->toArray(),
            'storage_id' => FormStorage::pluck('storage', 'id')->toArray(),
            'receivedfrom_id' => ReceivedFrom::pluck('received_from', 'id')->toArray()
        ]);
       */ 
    }


    public function store(Request $request)
    {

        

      //  dd($request);


     //   $tempCount = User::count()+1;
       // dd($tempCount);

       // $request->validated();
        User::create([
            'user_id' =>  $request->user_id,
            'section_id' =>  $request->section_id,
            'user_security' =>  $request->user_security,
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password'))

            //'password' => Hash::make($request->input('password'))
        ]);

        Toast::title('User Credential Migrated')->autoDismiss(4);
        return back();
    }
     
    


    //RffaProfilePicture



    public function storeProfilePicture(Request $request)
    {

    
        if($request->hasFile('file_location'))
        {         
 
            Storage::disk('public')->makeDirectory('uploads/farmer_profile/');

              $file = $request->file('file_location');


                $randomString = strtoupper(Str::random(6));
                $tempFileName = $request->rsbsa_no.'-'.$randomString.'-PROFILE';
              //  $file_location = 'uploads/geoattachments/'.$request->attachment_type_id.'/'.$tempFileName.'.pdf';

                 $file_location = 'uploads/farmer_profile/'.$tempFileName.'.'.$file->getClientOriginalExtension();
                
                $file->storeAs('uploads/farmer_profile/', $tempFileName.'.'.$file->getClientOriginalExtension());   
      

                RffaProfilePicture::create([
                    'rsbsa_no' => $request->rsbsa_no,
                    'file_location' => $file_location,
                    'file_name' => $tempFileName,
                    'file_extension' => $file->getClientOriginalExtension(),
                ]);
       
            
            Toast::title('Record Saved!')->autoDismiss(3);
            return back();

            } 
            else
            {
                dd('False');
            }       

    }


    public function storeForms(Request $request)
    {

        if($request->hasFile('file_location'))
        {         
            
            Storage::disk('public')->makeDirectory('uploads/farmer_forms/');

              foreach ($request->file('file_location') as $file) {

                $randomString = strtoupper(Str::random(6));
                $tempFileName = $request->rsbsa_no.'-'.$randomString.'-FORMS';

                $file_location = 'uploads/farmer_forms/'.$tempFileName.'.'.$file->getClientOriginalExtension();

                $file->storeAs('uploads/farmer_forms/', $tempFileName.'.'.$file->getClientOriginalExtension());   
                
      

                RffaForms::create([
                    'rsbsa_no' => $request->rsbsa_no,
                    'file_location' => $file_location,
                    'file_name' => $tempFileName,
                    'file_extension' => $file->getClientOriginalExtension(),
                ]);
       
            }
            Toast::title('Record Saved!')->autoDismiss(3);
            return back();

            } 
            else
            {
                dd('False');
            }       

    }


    public function storeAttachments(Request $request)
    {
      
 
    
        if($request->hasFile('file_location'))
        {         
            
            Storage::disk('public')->makeDirectory('uploads/farmer_attachments/');

              foreach ($request->file('file_location') as $file) {

                $randomString = strtoupper(Str::random(6));
                $tempFileName = $request->rsbsa_no.'-'.$randomString.'-ATTCH';

                $file_location = 'uploads/farmer_forms/'.$tempFileName.'.'.$file->getClientOriginalExtension();

                $file->storeAs('uploads/farmer_forms/', $tempFileName.'.'.$file->getClientOriginalExtension());   
                
      

                RffaAttachments::create([
                    'rsbsa_no' => $request->rsbsa_no,
                    'file_location' => $file_location,
                    'file_name' => $tempFileName,
                    'file_extension' => $file->getClientOriginalExtension(),
                ]);
       
            }
            Toast::title('Record Saved!')->autoDismiss(3);
            return back();

            } 
            else
            {
                dd('False');
            }       

    }



    public function createProfilePicture(RffaValidation $rffa)
    {

        return view('rffa.createProfilePicture', [
            'rffa' => $rffa,
            'rsbsa_no' => $rffa->rsbsa_no,
        ]);    
    }


    public function createForms(RffaValidation $rffa)
    {

        return view('rffa.createForms', [
            'rffa' => $rffa,
            'rsbsa_no' => $rffa->rsbsa_no,
        ]);    
    }


    public function createVerifyFarmer(RffaValidation $rffa)
    {

           // 'province_id' => Province::orderBy('ProvinceName','asc')->pluck('ProvinceName', 'id')->toArray(),

           
      //  $agri_verify = RffaStatus::orderBy('rffa_status','asc')->pluck('rffa_status', 'id')->toArray(),
        $rsbsa_verify = RffaStatus::orderBy('rffa_status','asc')->pluck('rffa_status', 'id')->toArray();



        return view('rffa.createVerifyFarmer', [
            'rffa' => $rffa,
            'rsbsa_no' => $rffa->rsbsa_no,
            'rsbsa_verify' => $rsbsa_verify,
            'agri_verify' => $rsbsa_verify

        ]);    
    }


    public function createAttachments(RffaValidation $rffa)
    {

        return view('rffa.createAttachments', [
            'rffa' => $rffa,
            'rsbsa_no' => $rffa->rsbsa_no,
        ]);    
    }


    public function viewForms($item)
    {


        $forms = RffaForms::find($item);


        //dd($forms);

        return view('rffa.viewForms',compact('forms'));
    }




    public function viewAttachments($item)
    {


        $attachments = RffaAttachments::find($item);


        //dd($forms);

        return view('rffa.viewAttachments',compact('attachments'));
    }


    public function updateVerifyFarmer(Request $request)
    {

     //  dd($request);


       $tempVerifiedBy = Auth::user()->emp_id;


        // $tempDocumentId = $request->document_id;
        // $tempProvName = Province::where('id',$request->province_id)->value('id');
        // $tempMunName = Municipality::where('id',$request->municipality_id)->value('id');

        

        RffaValidation::where('rsbsa_no',$request->rsbsa_no)->update([
            'agri_verify' => $request->agri_verify,
            'rsbsa_verify' => $request->rsbsa_verify,
            'remarks' => $request->remarks,
            'verified_by' => $tempVerifiedBy,

       ]);

        Toast::title('Record Updated')->autoDismiss(2);
        return back();
        
    }


    public function updateNotifications(Request $request)
    {


       $tempVerifiedBy = Auth::user()->emp_id;        

        RFFANotifications::where('rsbsa_no',$request->rsbsa_no)->update([
            'remarks' => $request->remarks,
            'notification_status' => 1,
       ]);

        Toast::title('Record Updated')->autoDismiss(2);
        return back();
        
    }







    public function rffaValidate(RffaValidation $rffa)
    {

      // dd($item);
      //$data = $rffa;
    //dd($rffa);
      // $data = RffaValidation::where('id',$rffa)

       //dd($data->rsbsa_no);


      // dd($rffa->rsbsa_no);

       $query = RffaProfilePicture::query()->where('rsbsa_no', $rffa->rsbsa_no);
       $profiles =  $query->get();


       $query1 = RffaForms::query()->where('rsbsa_no', $rffa->rsbsa_no);
       $forms =  $query1->get();



       $query2 = RffaAttachments::query()->where('rsbsa_no', $rffa->rsbsa_no);
       $attachments =  $query2->get();



      // dd($profile);

        return view('rffa.edit', [
            'rffa' => $rffa,
            'rsbsa_no' => $rffa->rsbsa_no,
            'first_name' => $rffa->first_name,
            'middle_name' => $rffa->middle_name,
            'last_name' => $rffa->last_name,
            'ext_name' => $rffa->extension_name,

            'profiles' => $profiles,
            'forms' => $forms,
            'attachments' => $attachments,

        ]);    
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

        return view('erforms.editAttachments',['document'=>$document,'images'=>$items]);
    }


    public function editNotification(RFFANotifications $data)
    {


   

   //     $tempProvName = Province::where('id',$document->province_id)->value('ProvinceName');
     //   $tempMunName = Municipality::where('id',$document->municipality_id)->value('MunCityName');
       // $tempDocumentId = RSBSAFormView::where('document_id',$document->document_id)->value('document_id');

       // $images = Storage::disk('public')->files('uploads/'.$tempProvName.'/'.$tempMunName.'/'.$tempDocumentId.'/');

       // $items = array();
        //dd($images);

      //  foreach($images as $image){
       //     $items[] = ExistingFile::fromDisk('public')->get($image);
       // }


       $notification_status = RffaStatus::orderBy('rffa_status','asc')->pluck('rffa_status', 'id')->toArray();


        return view('rffa.editNotification',[
                    'data'=>$data,
                    'notification_status'=>$notification_status
                ]);
    }


    public function update(RSBSAStatusFormRequest $request, RSBSAForm $rform){


   
    }


    public function show(Request $id){
    }



    public function destroy()
    {
        //

    
    }

}
