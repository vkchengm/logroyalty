<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'description',
        'amount',
        'total',
        'permit_id',
    ];

    public function permit()
    {
        return $this->belongsTo( Permit::class);
    }

}
