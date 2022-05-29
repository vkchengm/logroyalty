<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LogsImport implements WithHeadingRow, ToCollection, SkipsEmptyRows
{
    use Importable;

    public function collection(Collection $rows)
    {
        return $rows;
    }
}
