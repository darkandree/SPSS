<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\DivisionAmountChart;
use App\Charts\IcsParChart;
use App\Models\EncoderAccomplishmentDetailsView;
use App\Models\Inventory;
use App\Models\inventoryquery;
use App\Models\Remarks;
use App\Models\Istatus;
use App\Models\Station;
use Illuminate\Support\Carbon;
use App\Tables\RecordsTable;
use App\Tables\RemarksTable;
use App\Tables\RemarksTableUser;
use App\Tables\UpdateStatusTable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class ReportsController extends Controller
{  
    /*
    public function showAccomplishmentReport(){
        return view('reports.printreports.blade');
    }
*/

public function showEncoderAccomplishmentReportModal(){
    return view('reports.printreports');
}


public function showEncoderAccomplishmentReport(EncoderAccomplishmentDetailsView $item){
        //$record = inventoryquery::findOrFail($ID);
        $inventory = $item;
       // $receivedate =  Carbon::createFromFormat('Y-m-d', $inventory->acquisitiondate);
       /// $receivedate = $receivedate->format('F d, Y');

       // if($item->output === 'ICS'){
       
            $pdf = Pdf::loadView('reports.printreports',  compact('inventory') );
     //   }else{
          //     $pdf = Pdf::loadView('reports.ics',  compact('inventory','receivedate') );
     //   }
        //$pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOption('isRemoteEnabled',false);
    
        return $pdf->stream();
    }
}
