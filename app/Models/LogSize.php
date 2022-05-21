<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fr_size',
        'to_size',
        'unit',
    ];   

}
