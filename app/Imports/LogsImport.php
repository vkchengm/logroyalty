<?php

namespace App\Imports;

use Carbon\Carbon;
// use App\Models\LicenseMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class LogsImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new Logs([
            'account_no'    => $row[0],
            'license_no'    => $row[1],
            'licensee_name' => $row[2],
            'coupe_no'      => $row[3],
            'land_type'     => $row[4],
            'issued_date'   => !empty($row[5])?Carbon::createFromFormat("d/m/Y",$row[5])->format("Y-m-d"):null, 
        ]);
    }
}
