<?php

namespace App\Http\Controllers;


use App\Models\Province;
use App\Models\Municipality;
use App\Models\MunicipalityGeo;
use App\Models\FormStorage;
use App\Models\ReceivedFrom;

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

class HomeController extends Controller
{
    //
    public function index()
    {
        
         return view('home.index');

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


    public function store(RSBSAFormRequest $request)
    {
     
        $tempCount = RSBSAFormView::count()+1;

        $tempMonth = date('m');
        $tempDay = date('d');
        $tempYear = date('Y');
        
        $tempDocumentId = $tempYear . $tempMonth . $tempDay . '_' . $tempCount;

        $tempReceivedBy = Auth::user()->emp_id;


        $request->validated();

        $tempProvName = Province::where('id',$request->province_id)->value('id');
        $tempMunName = Municipality::where('id',$request->municipality_id)->value('id');

        //Storage::disk('public')->makeDirectory('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId);
        Storage::disk('public')->makeDirectory('uploads/'.$tempProvName .'/'. $tempMunName);
    
        if($request->hasFile('file_location'))
        {

                //dd($file->getClientOriginalName());
                //$request->file('file_location')->storeAs('uploads/'. $tempProvName  .'/'. $tempMunName .'/'. $tempDocumentId,  $request->file('file_location')->getClientOriginalName());
            
                $request->file('file_location')->storeAs('uploads/'. $tempProvName  .'/'. $tempMunName , $tempDocumentId.'.'.$request->file('file_location')->getClientOriginalExtension());
            
        }

        RSBSAForm::create([
            'document_id' => $tempDocumentId,
            'province_id' => $request->province_id,
            'municipality_id' => $request->municipality_id,
            'storage_id' => $request->storage_id,
            'file_location' => 'uploads/'. $tempProvName  .'/'. $tempMunName.'/'.$tempDocumentId.'.'.$request->file('file_location')->getClientOriginalExtension(),
        ]);


        RSBSAFormStatus::create([
            'document_id' => $tempDocumentId,
            'no_forms' => $request->no_forms,
            'receivedfrom_id' => $request->receivedfrom_id,
            'receivedby_id' => $tempReceivedBy,
            'date_received' => date('Y-m-d'),

        ]);



        Toast::title('Record Saved!')->autoDismiss(2);
        //return redirect()->route('forms.index');
        return back();


    }

    public function view($file_location){


        $Doc = RSBSAForm::find($file_location);
        return view('rforms.view',compact('Doc'));
    
    }


    public function edits(RSBSAFormStatusView $document)
    {

        $province_id = Province::orderBy('ProvinceName','asc')->pluck('ProvinceName', 'id')->toArray();
        $municipality_id = Municipality::orderBy('MunCityName','asc')->pluck('MunCityName', 'id')->toArray();
        $storage_id = FormStorage::pluck('storage', 'id')->toArray();
        $receivedfrom_id = ReceivedFrom::pluck('received_from', 'id')->toArray();

        $receivedby_id = UserView::pluck('name', 'emp_id')->toArray();
        $distributedby_id = UserView::pluck('name', 'emp_id')->toArray(); 
        $encodedby_id = UserView::pluck('name', 'emp_id')->toArray();
        $returnedto_id = UserView::pluck('name', 'emp_id')->toArray();

        return view('rforms.edit', [
            'document' => $document,
            'province_id' => $province_id,
            'municipality_id' => $municipality_id,
            'storage_id' => $storage_id,
            'receivedfrom_id' => $receivedfrom_id,
            'receivedby_id' => $receivedby_id,
            'distributedby_id' => $distributedby_id,
            'date_distributed' => $document->date_distributed,
            'encodedby_id' => $encodedby_id,
            'returnedto_id' => $returnedto_id,
            'date_returned' => $document->date_returned,
            'file_location' => $document->file_location

        ]);   
    }

    public function update(RSBSAStatusFormRequest $request, RSBSAForm $rform){

        $tempDocumentId = $request->document_id;
        $tempProvName = Province::where('id',$request->province_id)->value('id');
        $tempMunName = Municipality::where('id',$request->municipality_id)->value('id');

        
        $request->validated();

        $rform->update([
            'document_id' => $request->document_id,
            'province_id' => $request->province_id,
            'municipality_id' => $request->municipality_id,
            'storage_id' => $request->storage_id
            /*'attachments' => $fileName*/
        ]);


        if($request->hasFile('file_location'))
        {

                $request->file('file_location')->storeAs('uploads/'. $tempProvName  .'/'. $tempMunName , $tempDocumentId.'.'.$request->file('file_location')->getClientOriginalExtension());
            
        }


        RSBSAFormStatus::where('document_id',$request->document_id)->update([
            'no_forms' => $request->no_forms,
            'receivedfrom_id' => $request->receivedfrom_id,
            'receivedby_id' => $request->receivedby_id,
            'distributedby_id' => $request->distributedby_id,
            'date_distributed' => $request->date_distributed,
            'encodedby_id' => $request->encodedby_id,
            'date_returned' => $request->date_returned,
            'returnedto_id' => $request->returnedto_id,

       ]);

        Toast::title('Record Saved!')->autoDismiss(2);
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
