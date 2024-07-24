@extends('admin.template')

@section('content')

<div class="col-12">

    <div class="row">
        
            <!-- Image Section -->
        <div class="col-4">
                <div class="dashbox">
                    <div class="card-body text-center">
                        
                        <!-- Placeholder for the image -->
                        <img src="{{ asset('img/' . $actors->photo) }}" height="326x" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
        <div class="col-8">
            <div class="dashbox">
                <div class="dashbox__title" style="color:white">
                    <h2 style="margin:0%">{{ $actors->actor_name }}</h2>
                </div>
                <div class="col-12">
                    <div class="dashbox__body" style="color:white">
                        <div>
                            <p style="margin: 15px"><strong>Name:</strong> {{ $actors->actor_name }}</p>
                            <p style="margin: 15px"><strong>Occupation:</strong> {{ $actors->occupation }}</p>
                            <p style="margin: 15px"><strong>Nationality:</strong> {{ $actors->Nationality  }}</p>
                            <p style="margin: 15px"><strong>Gender:</strong> {{ $actors->gender }}</p>
                            <p style="margin: 15px"><strong>Date of Birth:</strong> {{ $actors->Date_of_Birth }}</p>
                            <p style="margin: 15px"><strong>Age:</strong> {{ $actors->age }} years old</p>
                        </div>
                    
                </div>
                </div>
                
            </div>
        </div>
    </div>

</div>

   
<!-- dashbox director-->
<div class="col-12">
    <div class="dashbox">
        <div class="dashbox__title">
            <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z"/>
            </svg>History</h3>

            
        </div>

        <div class="dashbox__table-wrap dashbox__table-wrap--2">
            <table class="main__table main__table--dash">
                <thead>
                    <tr>
                        <th>YEAR</th>
                        <th>TITLE</th>
                        <th>TYPE</th>
                        <th>See More</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actorMovies as $movie)
                    <tr>
                        <td>
                            <div class="main__table-text">{{ \Carbon\Carbon::parse($movie->release_date)->format('Y') }}</div>
                        </td>
                        <td>
                            <div class="main__table-text">{{ $movie->title }}</div>
                        </td>
                        <td>
                            <div class="main__table-text">{{ $movie->type }}</div>
                        </td>
                        <td>
                            <div class="main__table-text">
                                <a href="{{ route('Movie Detail', ['id' => $movie->id]) }}">See More</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end dashbox -->


@endsection