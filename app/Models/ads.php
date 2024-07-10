<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'href',
        'imageUrl',
        'title',
        'price',
        'location',
        'rooms',
        'size',
        'type',
        'endDate',
        'detailUrl',
        'description',
        'conditions',
        'features',
        'prices',
        'rules',
    ];

    public function images()
    {
        return $this->hasMany(images::class);
    }
}
