<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $fillable = ['director_name', 'photo'];

    

    // Define the relationship
    
    
    public function movieDirectorWebs()
    {
        return $this->hasMany(MovieDirectorWeb::class);
    }
    public function Movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_director_webs', 'director_id', 'movie_id');
    }
}
