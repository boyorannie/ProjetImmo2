<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'dimension',
        'image',
        'article_id',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_id');
    }
}
