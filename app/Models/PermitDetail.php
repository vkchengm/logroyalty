<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_no',
        'length',
        'diameter_1',
        'diameter_2',
        'mean',
        'vol',
        'royalty',
        'premium',
        'amount',
        'defect_symbol',
        'defect_length',
        'defect_diameter',
        'permit_id',
        'species_id',
    ];

    public function permit()
    {
        return $this->belongsTo( Permit::class);
    }

    public function species()
    {
        return $this->belongsTo( Species::class, 'species_id');
    }
}
