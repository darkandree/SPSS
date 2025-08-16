<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RSBSAFormRequest;




use Illuminate\Support\Str;


use App\Http\Requests\RSBSAStatusFormRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Maatwebsite\Excel\Excel;

use Illuminate\Support\Facades\Response;

//use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

use ProtoneMedia\Splade\FileUploads\ExistingFile;

class DownloadsController extends Controller
{
    public function download($file_name) {

        $file_path = public_path('storage/images/rsbsa_forms/'.$file_name);

        return response()->download($file_path);
        
      }


    public function downloadGpxFile($file_location) {



        $file_path = public_path('storage/'.$file_location);


        dd($file_path);
        return response()->download($file_path);
        
      }

      public function downloadAttachmentFile($file_location) {

        $file_path = public_path('storage/'.$file_location);

        if (!file_exists($file_path)) {
          abort(404, 'File not found.');
        }
        

      //  return Response::downloadAttachmentFile($filePath,'sadfasfasf');

       /// return Splade::redirect(Storage::url("public/{$file_path}"));


       // return Storage::disk('local')->download('public/' . $file_path);

       // return Storage::download($file_path);

      //  return Storage::download($file_path);


     return response()->download($file_path);
        //return Splade::redirectAway(route('downloadAttachmentFile', ['file' => urlencode($file_location)]));
      }
}
