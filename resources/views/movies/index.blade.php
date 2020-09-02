@extends('layouts.main')

@section('content')
   <div class="bg-gray-700">
    <div class="container mx-auto">
   <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> Movies </div>
    @livewire('movies-list-search')
    
    {{-- For normal component without the search facility -- }}
       {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 px-2">
           @foreach ($popularMovies as $movie)
            <x-movie-card :movie="$movie" />   
           @endforeach
        
       </div>

      
       <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> Now Playing </div>
       <div class="grid grid-cols-5 gap-4">
           @foreach ($nowPlayingMovies as $movie)
            <x-movie-card :movie="$movie" />   
           @endforeach
        
       </div> --}}
       </div>
   </div>
@endsection