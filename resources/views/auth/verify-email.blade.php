@extends('auth.layout')

@section('main')
    <!-- registration form -->
        <form action="{{route('login')}}" class="sign__form" method="GET">
            @csrf
            <a href="index.html" class="sign__logo">
                <img src="img/logo.svg" alt="">
            </a>

            

            <div class="sign__group">
                <span>Please check your email for verificaition link</span>
            </div>

            

            
            <button class="sign__btn" >Back Login</button>

            
        </form>
    <!-- registration form -->
@endsection