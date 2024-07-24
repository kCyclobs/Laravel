<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDirectorWeb extends Model
{
    use HasFactory;
    protected $fillable = ['director_id', 'movie_id'];
    public function Movies()
    {
        return $this->belongsTo(Movie::class);
    }
    public function director()
    {
        return $this->belongsTo(Director::class);
    }
}
