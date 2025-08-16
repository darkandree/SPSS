<?php

namespace App\Imports;

use App\Models\GeoStubDetails;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GeoStubDetailsImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    protected $geoStubId;

    public function  __construct($geoStubId)
    {
        $this->geoStubId = $geoStubId;
    }

    public function collection(Collection $rows)
    {
       
        foreach ($rows as $row)
        {
            GeoStubDetails::create([
                'geo_stub_no' => $this->geoStubId,
                // 'encodedby_id' => Auth::user()->emp_id,
                'rsbsa_no' => $row['rsbsa_no'],
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'ext_name' => $row['ext_name'],
                'date_measured' => $row['date_measured'],
                'province' => $row['province'],
                'municipality' => $row['municipality'],
                'barangay' => $row['barangay'],
                'declared_area' => $row['declared_area'],
                'verified_area' => $row['verified_area']

            ]);
        }
    }
}
