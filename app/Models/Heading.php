<?php

namespace App\Models;

use app\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'heading_id',
        'heading_title',
        'heading_type',
        'is_completed',
        'is_started',
    ];
}
