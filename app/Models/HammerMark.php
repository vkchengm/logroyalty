<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HammerMark extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id',
        'employee_name',
        'position',
        'district_id',
        'folio_borang',
        'status',
        'deactivate_date',
        'deactivate_reason',
        'folio_surat',
    ];   

    public function district()
    {
        return $this->belongsTo( District::class, 'district_id');
    }

}
