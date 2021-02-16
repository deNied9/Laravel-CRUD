<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'score',
        'status',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
