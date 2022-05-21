<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permit;
use App\Models\License;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Licensee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'contact_no',
        'address_1',
        'address_2',
        
        // 'license_type',
        // 'license_no',
        // 'licensee_ac_no',
        // 'district_id',
    ];


    public function user()
    {
        // return $this->hasMany(User::class);
        return $this->hasOne(User::class);
    }

    public function permits()
    {
        return $this->hasManyThrough(Permit::class, User::class);
    }
    // public function permits()
    // {
    //     return $this->hasMany(Permit::class, 'user_id');
    // }

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
