<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    
    
    
    public function movieActorWebs()
    {
        return $this->hasMany(MovieActorWeb::class);
    }
    public function Movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor_webs', 'actor_id', 'movie_id');
    }

    
}
