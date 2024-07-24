<?php

namespace App\Http\Controllers;
use App\Models\Director;
use App\Models\DirectMovie;
use App\Models\Movie;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function director($id){
       
        $director = Director::findOrFail($id);
        $movies = $director->Movies;
       $directorMovies = $director->movies;
       $movie = Movie::findOrFail($id);
       //return view('user.actor', compact('actors', 'movies','actorMovies'));

        return view('user.director', compact('director', 'movies','directorMovies','movie'));

     }
    public function director_list(){
        $directors = Director::all(); // Assuming Actor is your model for actors

        return view('user.director_list', compact('directors'));
    }
}
