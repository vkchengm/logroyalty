<?php

namespace App\Models;

use App\Models\Licensee;
use App\Models\DistrictKppm;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use CascadeSoftDeletes;
    // use MustVerifyEmail;

    // protected $cascadeDeletes = ['permit'];
    // protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'licensee_id',
        'mobile_no',
        'ic',
        'job_title',
        'status',
        'type',
        'password',
        'is_activated',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // self::created(function (User $user) {
        //     if (!$user->roles()->get()->contains(2)) {
        //         $user->roles()->attach(2);
        //     }
        // });
    }
    
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        // return $this->email_address;
 
        // Return email address and name...
        return [$this->email => $this->name];
    }


    public function licensee()
    {
        // return $this->belongsTo(Licensee::class)->withDefault(['license_type' => '', 'license_no' => '', 'licensee_ac_no' => '']);
        return $this->belongsTo(Licensee::class);
    }

    public function roles() 
    {
        return $this->belongsToMany(Role::class);
    }

    // public function tdps()
    // {
    //     return $this->hasMany(Tdp::class);
    // }

    public function permits()
    {
        return $this->hasMany(Permit::class);
    }

    public function permitdfo()
    {
        return $this->hasMany(Permit::class, 'dfo_id');
    }

    public function permitkppm()
    {
        return $this->hasMany(Permit::class, 'kppm_id');
    }

    public function districtkppm()
    {
        return $this->hasMany(DistrictKppm::class, 'kppm_id');
    }

    public function districtdfo()
    {
        return $this->belongsTo(District::class, 'dfo_id');
    }

    public function districtadfo()
    {
        return $this->belongsTo(District::class, 'adfo_id');
    }

    public function regionfo()
    {
        return $this->belongsTo(Region::class, 'fo_id');
    }

    public function regionppw()
    {
        return $this->belongsTo(Region::class, 'ppw_id');
    }

    public function regiontppw()
    {
        return $this->belongsTo(Region::class, 'tppw_id');
    }

}
