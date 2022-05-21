<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fo_id',
        'ppw_id',
        'tppw_id',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function fo()
    {
        return $this->belongsTo( User::class, 'fo_id');
    }    

    public function ppw()
    {
        return $this->belongsTo( User::class, 'ppw_id');
    }    

    public function tppw()
    {
        return $this->belongsTo( User::class, 'tppw_id');
    }    

}

