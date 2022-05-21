<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region_id',
        'dfo_id',
        'adfo_id',
    ];

           
    public function region()
    {
        return $this->belongsTo( Region::class, 'region_id');
    }

    public function dfo()
    {
        return $this->hasOne( User::class, 'id', 'dfo_id');
    }

    public function adfo()
    {
        return $this->hasOne( User::class, 'id', 'adfo_id');
    }

    public function permits()
    {
        return $this->hasMany( Permit::class);
    }

    public function kppms()
    {
        return $this->hasMany( DistrictKPPM::class);
    }
}
