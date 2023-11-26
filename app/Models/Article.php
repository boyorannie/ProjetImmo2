<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'image',
        'type',
        'statut',
        'nombreToilette',
        'nombreBalcon',
        'espaceVert ',
        'dimension',
    ];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    
    public function chambres(){
        return $this->hasMany(Chambre::class);
    }
}
