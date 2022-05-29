<?php

namespace App\Models;

use App\Models\License;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LicenseAccCoupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_no',
        'coupe_no',
        'issued_date',
        'start_date',
        'expiry_date',
        'land_type',

        // 'license_type',
        // 'license_no',
        // 'licensee_ac_no',
        // 'district_id',
    ];

    public function license()
    {
        return $this->belongsTo(License::class);
    }
}
