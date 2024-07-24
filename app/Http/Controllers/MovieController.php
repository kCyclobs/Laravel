<?php

namespace App\Http\Controllers;
use App\Models\MovieActorWeb;
use App\Models\MovieDirectorWeb;
use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movie(){
        $movie = Movie::all(); // Assuming Actor is your model for actors

        return view('user.movie', compact('movie'));
    }
    public function movie_detail($id){

        
        $movies = Movie::with(['actor', 'director'])->findOrFail($id);

        if (!$movies) {
            abort(404, 'Movie not found');
        }

        $actor = $movies->actor;
        $director = $movies->director;
        //$director = $movies->diretor;
       
       //dd($movies);

        return view('user.movie_detail', compact('movies','actor','director'));
        
    }
}
