<?php

namespace App\Imports;

use App\Models\AccomplishmentImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AttachmentImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    protected $upload_id;

    public function  __construct($upload_id)
    {
        $this->upload_id = $upload_id;
    }

    public function collection(Collection $rows)
    {
       
        foreach ($rows as $row)
        {
            AccomplishmentImport::create([
                'document_id' => $row['document_id'],
                'upload_id' => $this->upload_id,
                'encodedby_id' => Auth::user()->emp_id,
                'rsbsa_no' => $row['rsbsa_no'],
                'fullname' => $row['fullname'],
                'sex' => $row['sex'],
                'birthday' => $row['birthday'],
                'date_encoded' => $row['date_encoded'],
                'upload_type' => $row['upload_type']
            ]);
        }
    }
}
