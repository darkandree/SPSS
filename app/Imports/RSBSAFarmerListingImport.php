<?php

namespace App\Imports;

use App\Models\FarmerListing;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RSBSAFarmerListingImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */



    public function  __construct()
    {

    }

    public function collection(Collection $rows)
    {
       
        foreach ($rows as $row)
        {
            FarmerListing::create([
                'rsbsa_no' => $row['rsbsa_no'],
                'control_no' => $row['control_no'],
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'ext_name' => $row['ext_name'],
                'farmer_address_bgy' => $row['farmer_address_bgy'],
                'farmer_address_mun' => $row['farmer_address_mun'],
                'farmer_address_prv' => $row['farmer_address_prv'],
                'birthday' => $row['birthday'],
                'gender' => $row['gender'],
                'contact_no' => $row['contact_num'],
                'cropname' => $row['cropname'],
                'crop_area' => $row['crop_area'],
                'agency' => $row['agency']

            ]);
        }
    }
}
