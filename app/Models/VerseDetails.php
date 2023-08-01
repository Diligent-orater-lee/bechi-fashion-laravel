<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerseDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'verse_name',
        'verse_description',
        'is_ar_available',
        'verse_handle',
        'ar_project_url',
        'verse_audio_url'
    ];
}
