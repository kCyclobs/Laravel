<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieActorWeb extends Model
{
    use HasFactory;
    protected $fillable = ['actor_id', 'movie_id'];

    public function Movies()
    {
        return $this->belongsTo(Movie::class);
    }
    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }
    
}
