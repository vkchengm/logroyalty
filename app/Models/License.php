<?php

namespace App\Models;

use App\Models\Licensee;
use App\Models\LicenseAccCoupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'start_date',
        'expiry_date',        
    ];


    public function licensee()
    {
        return $this->belongsTo(Licensee::class);
    }

    public function licenseAccCoupes()
    {
        return $this->hasMany(LicenseAccCoupe::class);
    }

}
