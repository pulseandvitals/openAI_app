<?php

namespace App\Models;

use app\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingInformation extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'heading_id',
        'additional_information',
    ];
    public function headings()
    {
        return $this->hasMany(Heading::class,'heading_id');
    }

}
