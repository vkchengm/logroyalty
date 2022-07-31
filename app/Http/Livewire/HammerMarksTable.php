<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HammerMark;
use Livewire\WithPagination;

class HammerMarksTable extends Component

{
    use WithPagination;

    public $search;
    public $sortField = 'number';
    public $sortDirection = 'asc';
    public $type = '';

    // public $status = 'active';

    // public function mount()
    // public $hammermarks = HammerMark::search('name', $this->search)->paginate(2);

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {

        // return view('livewire.hammermarks');

        if ($this->type == '')
        {
            return view('livewire.hammermarks', [
                'hammermarks' => HammerMark::search('number', 'employee_name', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(20),
            ]);
        } else
        {
            return view('livewire.hammermarks', [
                'hammermarks' => HammerMark::search('number', 'employee_name', $this->search)->where('type', $this->type)->orderBy($this->sortField, $this->sortDirection)->paginate(20),
            ]);
        }
            // 'hammermarks' => HammerMark::search('number', 'employee_name', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(20),
            // 'hammermarks' => HammerMark::search('number', 'employee_name', $this->search)->where('status', $this->status)->paginate(20),

    }


}