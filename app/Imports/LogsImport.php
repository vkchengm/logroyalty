<?php

namespace App\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class LogsImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new Logs([
            'log_no'            => $row[0],
            'species_id'        => $row[1],
            'length'            => $row[2],
            'diameter_1'        => $row[3],
            'diameter_2'        => $row[5],
            'defect_symbol'     => $row[6],
            'defect_length'     => $row[7],
            'defect_diameter'   => $row[8],
        ]);
    }
}
