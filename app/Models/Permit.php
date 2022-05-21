<?php

namespace App\Models;


// use Illuminate\Support\Facades\DB;


use App\Models\Role;
use App\Models\User;
use App\Models\Region;
use App\Models\District;

use Illuminate\Support\Facades\Auth;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Permit extends Model
{
    use HasFactory, Multitenantable, SoftDeletes;

    protected $fillable = [
        'license_no',
        'coupe_no',
        'logging_method',
        'market',
        'licensee_ac_no',
        'description',

        'place_of_scaling',
        'scaled_date',
        'name_of_scaler',
        'owner_of_property_hammer_mark',
        'registered_property_hammer_mark',
        'buyer',
        'status',

        'payment_date',
        'receipt_no',
        'valid_from',
        'valid_to',
        'billed_vol',
        'billed_amount',

        'user_id',
        'district_id',
        'land_type_id',
        'dfo_id',
        'kppm_id',
        'fo_id',
    ];


    public static function boot()
    {
        parent::boot();

        // $role = DB::table('role_user')
        //             ->where('user_id', auth()->id())
        //             ->first();

        
        // $myId = auth()->id();
        // dd(auth()->user());

        // $roleTitle = auth()->user()->roles()->first()->title;
        // if ($roleTitle != 'Viewer') {
        //     if ($roleTitle == 'DFO') {
        //         static::addGlobalScope('dfo_id', function(Builder $builder) {
        //             if (auth()->check()) {
        //                 return $builder->where('dfo_id', auth()->id());
        //             }
        //         });
        //     } elseif ($roleTitle == 'FO') {
        //         static::addGlobalScope('fo_id', function(Builder $builder) {
        //             if (auth()->check()) {
        //                 return $builder->where('fo_id', auth()->id());
        //             }
        //         });
        //     } elseif ($roleTitle == 'KPPM') {
        //         static::addGlobalScope('kppm_id', function(Builder $builder) {
        //             if (auth()->check()) {
        //                 return $builder->where('kppm_id', auth()->id());
        //             }
        //         });
        //     } else {
        //         static::addGlobalScope('user_id', function(Builder $builder) {
        //             if (auth()->check()) {
        //                 return $builder->where('user_id', auth()->id());
        //             }
        //         });
        //     }
        // }
    }

    public function district()
    {
        return $this->belongsTo( District::class);
    }    
    
    public function licensee()
    {
        return $this->belongsTo( Licensee::class);
    }    

    public function license()
    {
        return $this->belongsTo( License::class, 'license_no');
    }    

    public function licenseAccount()
    {
        return $this->belongsTo( LicenseAccCoupe::class, 'licensee_ac_no');
    }    

    public function licenseCoupe()
    {
        return $this->belongsTo( LicenseAccCoupe::class, 'coupe_no');
    }    

    public function landtype()
    {
        return $this->belongsTo( LandTypes::class, 'land_type_id');
    }    

    public function user()
    {
        return $this->belongsTo( User::class);
    }

    public function dfo()
    {
        return $this->belongsTo( User::class, 'dfo_id');
    }

    public function kppm()
    {
        return $this->belongsTo( User::class, 'kppm_id');
    }

    public function fo()
    {
        return $this->belongsTo( User::class, 'fo_id');
    }

    public function permitDetails()
    {
        return $this->hasMany(PermitDetail::class);
    }

    public function permitLogs()
    {
        return $this->hasMany(PermitLog::class);
    }

    public function permitCharges()
    {
        return $this->hasMany(PermitCharge::class);
    }
}
