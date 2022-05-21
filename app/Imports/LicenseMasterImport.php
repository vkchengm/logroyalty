<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\LicenseMaster;
use Maatwebsite\Excel\Concerns\ToModel;

class LicenseMasterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LicenseMaster([
            // 'name'     => $row[0],
            // 'email'    => $row[1], 

            // 'account_no'    => $row['acc_no'],
            // 'license_no'    => $row['license_no'],
            // 'licensee_name' => $row['licensee_name'],
            // 'coupe_no'      => $row['coupe_no'],
            // 'land_type'     => $row['land_type'],
            // 'issue_date'    => $row['issue_date'],

            'account_no'    => $row[0],
            'license_no'    => $row[1],
            'licensee_name' => $row[2],
            'coupe_no'      => $row[3],
            'land_type'     => $row[4],
            // 'issued_date'    => $row[5],
            'issued_date'    => !empty($row[5])?Carbon::createFromFormat("d/m/Y",$row[5])->format("Y-m-d"):null, 
        ]);
    }
}
