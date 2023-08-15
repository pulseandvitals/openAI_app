<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory,HasUuid;
    protected $fillable = [
        'file_url',
        'new_url',
        'user_id',
        'original_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
