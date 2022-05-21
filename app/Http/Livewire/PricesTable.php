<?php

namespace App\Http\Livewire;

use App\Models\Prices;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PricesTable extends DataTableComponent
{

    // public bool $columnSelect = true;
    // public array $perPageAccepted = [100, 200, 500];
    // public bool $perPageAll = true;
    // public int $perPage = 2;

    public bool $paginationEnabled = false;

    public function getTableRowUrl($row): string
    {
        return route('prices.edit', $row);
    }

    public function columns(): array
    {
        return [
            Column::make('Market', 'market')
                // ->sortable()
                ->searchable(),
            Column::make('Species', 'species.name')
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

            Column::make('Rate', 'price')
                // ->sortable()
                ->searchable(),




                // ->format(function($value, $column, $row) {
                //     return view('prices.show2')->withUser($row);
                // }),
        ];
    }

    public function query(): Builder
    {
        return Prices::query();
    }
}

