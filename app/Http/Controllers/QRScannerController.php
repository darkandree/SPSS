<?php

namespace App\Http\Controllers;




use App\Models\Province;
use App\Models\Municipality;
use App\Models\FormStorage;
use App\Models\ReceivedFrom;

use App\Models\RSBSAFormStatus;
use App\Models\RSBSAFormStatusView;

use App\Models\EncoderAccomplishmentView;




use App\Models\RSBSAForm;
use App\Models\RSBSAFormView;
use App\Models\EncoderAccomplishment;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;


use App\Http\Requests\RSBSAStatusFormRequest;

use App\Http\Requests\EncoderAccomplishmentRequest;
use App\Models\AccomplishmentExport;
use App\Models\MonthView;
use App\Models\YearView;
use App\Tables\EncoderAccomplishmentTable;

use App\Tables\EncoderAccomplishmentDetailsTable;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
//use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\AttachmentImport;
use App\Models\EncoderAccomplishmentDetailsView;
use ProtoneMedia\Splade\FileUploads\ExistingFile;


class QRScannerController extends Controller
{
    //
    public function index()
    {

         return view('qrcScanner');

    }

    public function create()
    {
        
        $upload_month = MonthView::pluck('month', 'month')->toArray();
        $upload_year = YearView::pluck('year', 'year')->toArray();

        return view('erfaccomplishments.create', [
           'upload_month' => $upload_month,
           'upload_year' => $upload_year
        ]);
       
    }

    public function store(EncoderAccomplishmentRequest $request)
    {

        $upload_id = ($request->upload_year .'-'. $request->upload_month .'-'. Auth::user()->emp_id);

        $request->validated();

        EncoderAccomplishment::create([
            'upload_id' => $upload_id,
            'upload_year' => $request->upload_year,
            'upload_month' => $request->upload_month,
            'uploader_id' => Auth::user()->emp_id,
            'vstatus_id' => 2,
        ]);

        Excel::import(new AttachmentImport($upload_id), $request->file('attachment_file'));

        Toast::title('Record Saved!')->autoDismiss(2);
        return back();
    }

    public function dl()
    {
        //Storage::deleteDirectory(public_path('uploads/'.$tempProvName .'/'. $tempMunName  .'/'.  $tempDocumentId));

       // return Storage::disk('public')->download($file->path);
       response()->download('da_templates/rsbsa_encoder_validator.xlsx');

      //  Storage::download('da_templates/rsbsa_encoder_validator.xlsx');

    }

    public function edits(RSBSAFormStatusView $document)
    {

    }


    public function editAccomplishments(EncoderAccomplishmentView $document)
    {
        $upload_id = $document->upload_id;

        //dd($upload_id);

        return view('erfaccomplishments.editAccomplishments', [
            'frms' => EncoderAccomplishmentDetailsTable::build($upload_id)]);
    }


    public function update(RSBSAStatusFormRequest $request, RSBSAForm $rform){

    }


    public function show(Request $id){
    }



    public function destroy(EncoderAccomplishment $accomplishment)
    {   
        //dd($accomplishment);
        $accomplishment->delete();
        Toast::title('Record Deleted')->autoDismiss(2);
        return back();
    }

    public function showEncoderAccomplishmentReportModal(EncoderAccomplishmentView $item){
        $upload_id = ($item->upload_id);
        $upload_year = ($item->upload_year);
        $upload_month = ($item->upload_month);

        //dd($upload_id);
        return view('reports.printreports',compact('upload_id'));
    }
    
    public function showEncoderAccomplishmentReport($item){


       // dd($item2);
         $EncoderAccomplishmentDetailsView = EncoderAccomplishmentDetailsView::where('upload_id',$item)->get();


//dd($EncoderAccomplishmentDetailsView);
       //  dd($EncoderAccomplishmentDetailsView);

            //$record = inventoryquery::findOrFail($ID);
            $accomplishment = $EncoderAccomplishmentDetailsView;
            //$receivedate =  Carbon::createFromFormat('Y-m-d', $inventory->acquisitiondate);
           // $receivedate = $receivedate->format('F d, Y');
    
           // if($item->output === 'ICS'){
           
                $pdf = Pdf::loadView('reports.encoder_accomplishment',compact('accomplishment'));
         //   }else{
              //     $pdf = Pdf::loadView('reports.ics',  compact('inventory','receivedate') );
         //   }
            //$pdf->loadHtml($html);
           
            $pdf->setPaper('A4', 'portrait');
            $pdf->setOption('isRemoteEnabled',false);
        
            return $pdf->stream();
        }


}
