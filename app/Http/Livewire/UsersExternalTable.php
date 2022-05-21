<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersExternalTable extends DataTableComponent
{

    // public bool $columnSelect = true;
    // public array $perPageAccepted = [100, 200, 500];
    // public bool $perPageAll = true;
    // public int $perPage = 2;

    public bool $paginationEnabled = false;

    public function getTableRowUrl($row): string
    {
        return route('users.edit-external', $row);
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Licensee','licensee.name')
                ->sortable()
                ->searchable(),
            
            Column::make('Role','roles.title')
                // ->sortable()
                ->searchable()

                ->format(function($value, $column, $row) {
                    return view('users.show-external')->withUser($row);
                }),
        ];
    }

    public function query(): Builder
    {
        return User::query()
                ->where('type', 'external');
    }
}

    