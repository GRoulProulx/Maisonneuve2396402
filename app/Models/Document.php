<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en',
        'title_fr',
        'file_path',
        'file_name',
        'file_type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitle()
    {
        $locale = app()->getLocale();
        return $locale == 'fr' ? $this->title_fr : $this->title_en;
    }
}
