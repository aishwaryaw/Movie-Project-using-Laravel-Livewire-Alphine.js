{{-- <div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div> --}}



   <div class="bg-gray-700">
    <div class="container mx-auto">
   <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> 
     @if(strlen($title) == 0) 
      Popular movies
     @endif
     </div>
        <div class="overflow-hidden">
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 px-2 h-100 overflow-auto">
           @foreach ($popularMovies as $movie)
            <x-movie-card :movie="$movie"  />   
           @endforeach
       </div>
       </div>

       @if($nowPlayingMovies)
       <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> 
        @if(strlen($title) == 0) 
        Now playing movies 
       @endif  
        </div>
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 px-2">
           @foreach ($nowPlayingMovies as $movie)
            <x-movie-card :movie="$movie" />   
           @endforeach
        
       </div>

       @endif


       </div>
   </div>
