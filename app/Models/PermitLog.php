<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'action',
        'remark',
        'system_info',
        'permit_id',
    ];

    public function permit()
    {
        return $this->belongsTo( Permit::class);
    }

}
