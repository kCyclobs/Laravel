<?php

namespace App\Http\Controllers;
use App\Models\Actor;
use App\Models\MovieActorWeb;
use App\Models\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function actor($id)
    {
        $actors = Actor::findOrFail($id);
        $movies = $actors->Movies;
        $actorMovies = $actors->movies;
        $movie = Movie::findOrFail($id);
         // Assuming the relationship is defined in the Actor model
        return view('user.actor', compact('actors', 'movies','actorMovies','movie'));

        

         
        

       
    }
    public function actor_list(){
        
        $actors = Actor::all(); // Assuming Actor is your model for actors

        return view('user.actor_list', compact('actors'));
    }
    // public function director($id){
        
    //     // $director = director::with('directors')->get();
    //     // $director_movie = directMovie::with('director_movies')->get();
    //     $director = Director::findOrFail($id);
    //     $movies = DirectMovie::where('director_id', $id)->get();
    //    //dd($movies);

    //     return view('user.director', compact('director', 'movies'));

    //  }
}
