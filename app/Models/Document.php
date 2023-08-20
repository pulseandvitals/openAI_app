<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $fillable = [
        'label',
        'file_url',
        'new_url',
        'user_id',
        'original_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function data()
    {
        return $this->hasMany(ImportData::class);
    }

}
