@extends('admin.template')

@section('content')



<!-- dashbox drama-->
<div class="col-12">
    <div class="dashbox">
        <div class="dashbox__title">
            <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z"/>
            </svg>Production</h3>

            
        </div>

        <div class="dashbox__table-wrap dashbox__table-wrap--2">
            <div style="color:white">
                
                <!-- Display actor names -->
                @if ($actor && $actor->isNotEmpty())
                    <p>Actors:</p>
                    <ul>
                        @foreach ($actor as $actors)
                            <li>
                                {{ $actors->actor_name }}
                                <a href="{{ route('Actor Detail', ['id' => $actors->id]) }}">See More</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No actors found for this movie.</p>
                @endif
                <br>
                <!-- Display director names -->
                @if ($director && $director->isNotEmpty())
                    <p>Directors:</p>
                    <ul>
                        @foreach ($director as $directors)
                            <li>
                                {{ $directors->director_name }}
                                <a href="{{ route('Director Detail', ['id' => $directors->id]) }}">See More</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No directors found for this movie.</p>
                @endif
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
</div>
<!-- end dashbox -->
    



@endsection