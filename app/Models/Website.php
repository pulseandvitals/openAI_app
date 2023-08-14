<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use HasFactory,HasUuid,SoftDeletes;

    protected $fillable = [
        'user_id',
        'url',
        'slug',
        'token'
    ];
}
