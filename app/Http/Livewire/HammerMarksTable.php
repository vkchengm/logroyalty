<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HammerMark;
use Livewire\WithPagination;

class HammerMarksTable extends Component

{
    use WithPagination;

    public $search;

    // public function mount()
    // public $hammermarks = HammerMark::search('name', $this->search)->paginate(2);

    public function render()
    {

        // return view('livewire.hammermarks');

        return view('livewire.hammermarks', [
            'hammermarks' => HammerMark::search('name', 'employee_name', $this->search)->paginate(2),
        ]);

    }


}