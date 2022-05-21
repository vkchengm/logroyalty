<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseMaster extends Model
{
    use HasFactory;

    protected $fillable = [

        'account_no',
        'license_no',
        'licensee_name',
        'coupe_no',
        'land_type',
        'issued_date',

    ];
}
