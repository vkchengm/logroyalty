<?php

namespace App\Http\Livewire;

use App\Models\Royalties;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RoyaltiesTable extends DataTableComponent
{

    // public bool $columnSelect = true;
    public array $perPageAccepted = [100, 200, 500];
    // public array $perPageAccepted = [20, 40, 60];
    // public bool $perPageAll = true;
    // public int $perPage = 2;

    public string $defaultSortColumn = 'class';
    public string $defaultSortDirection = 'asc';
    public bool $paginationEnabled = true;

    public function getTableRowUrl($row): string
    {
        return route('royalties.edit', $row);
    }

    public function columns(): array
    {
        return [
            Column::make('Class', 'class')
                // ->sortable()
                ->searchable(),
                
            Column::make('Market', 'market')
                // ->sortable()
                ->searchable(),

            // Column::make('Species', 'species.name')
            //     ->searchable(),

            Column::make('Type', 'timber_type')
                // ->sortable()
                ->searchable(),
            
            Column::make('Land Type','landtype.name')
                // ->sortable()
                ->searchable(),

            Column::make('Method', 'method')
                // ->sortable()
                ->searchable(),

            Column::make('Size', 'logsize.name')
                // ->sortable()
                ->searchable(),

            Column::make('Amount', 'amount')
                // ->sortable()
                ->searchable(),

            Column::make('')
                ->format(function($value, $column, $row) {
                    return view('royalties.show')->withRoyalties($row);
                }),
            // ->sortable()
                // ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Royalties::query();
    }
}

