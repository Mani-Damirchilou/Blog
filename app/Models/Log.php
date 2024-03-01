<?php

namespace App\Models;

use App\Traits\HasPersianDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory,HasPersianDateTime;
    protected $fillable = [
        'text'
    ];
}
