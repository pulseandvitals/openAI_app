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
        'user_id',
        'file_url',
        'website_url'
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
