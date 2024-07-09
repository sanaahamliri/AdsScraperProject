<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    protected $fillable = [
        'ad_id', 'url',
    ];

    public function images()
    {
        return $this->hasMany(images::class, 'ads_id');
    }
}
