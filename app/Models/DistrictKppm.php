<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictKppm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district_id',
        'kppm_id',
    ];

    public function district()
    {
        return $this->belongsTo( District::class, 'district_id');
    }

    public function kppm()
    {
        return $this->belongsTo( User::class, 'kppm_id');
    }

}
