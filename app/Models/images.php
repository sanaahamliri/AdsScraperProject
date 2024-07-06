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

    public function ad()
    {
        return $this->belongsTo(ads::class);
    }
}
