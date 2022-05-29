<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premiums extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_type_id',
        'log_size_id',
        'licensee_type',

        'amount',
        // hard coded exemption Macaranga
    ];


    // public function species()
    // {
    //     return $this->belongsTo( Species::class, 'species_id');
    // }

    public function landtype()
    {
        return $this->belongsTo( LandTypes::class, 'land_type_id');
    }

    public function logsize()
    {
        return $this->belongsTo( LogSize::class, 'log_size_id');
    }
}
