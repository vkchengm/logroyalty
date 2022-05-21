<?php

namespace App\Http\Livewire;

use App\Models\Licensee;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LicenseesTable extends DataTableComponent
{

    // public bool $columnSelect = true;
    // public array $perPageAccepted = [100, 200, 500];
    public array $perPageAccepted = [20, 40, 60];
    // public bool $perPageAll = true;
    // public int $perPage = 2;

    // public string $defaultSortColumn = 'class';
    // public string $defaultSortDirection = 'asc';
    
    public bool $paginationEnabled = true;


    public function getTableRowUrl($row): string
    {
        return route('licensees.show', $row);
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                // ->sortable()
                ->searchable(),
                
            Column::make('Type', 'type')
                // ->sortable()
                ->searchable(),

            Column::make('Contact No.', 'contact_no')
            // ->sortable()
            ->searchable(),

            Column::make('User', 'user.name')
            // ->sortable()
            ->searchable(),

            // Column::make('License', 'licenses.name')
            //     // ->sortable()
            //     ->searchable(),
            // Column::make('Account', 'licenses.licenseAccCoupes.account_no')
            //     // ->sortable()
            //     ->searchable(),
            
            // Column::make('Land Type','landtype.name')
            //     // ->sortable()
            //     ->searchable(),

            // Column::make('Method', 'method')
            //     // ->sortable()
            //     ->searchable(),

            // Column::make('Size', 'logsize.name')
            //     // ->sortable()
            //     ->searchable(),

            // Column::make('Amount', 'amount')
            //     // ->sortable()
            //     ->searchable(),

        ];
    }

    public function query(): Builder
    {
        return Licensee::query();
    }
}

