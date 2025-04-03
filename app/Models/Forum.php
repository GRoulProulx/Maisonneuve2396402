<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'content_en',
        'title_fr',
        'content_fr',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
