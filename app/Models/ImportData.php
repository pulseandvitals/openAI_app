<?php

namespace App\Models;

use app\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportData extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'document_id',
        'url',
        'position',
        'status',
        'main_topic_1',
        'sub_topic_2',
        'sub_topic_3',
        'sub_topic_4',
        'keyword',
        'seo_title',
        'serp_analysis',
        'search_content',
        'content_type',
        'search_volume',
        'cpc',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
