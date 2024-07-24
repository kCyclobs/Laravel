<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function director()
    {
        return $this->belongsToMany(Director::class,'movie_director_webs', 'movie_id', 'director_id');
    }
    public function movieActorWebs()
    {
        return $this->hasMany(MovieActorWeb::class);
    }
    public function movieDirectorWebs()
    {
        return $this->hasMany(MovieDirectorWeb::class);
    }
    public function actor()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor_webs', 'movie_id', 'actor_id');
    }

    
}
