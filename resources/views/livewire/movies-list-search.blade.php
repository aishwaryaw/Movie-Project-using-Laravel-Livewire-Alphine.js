{{-- <div>
    {{-- Because she competes with no one, no one can compete with her. </div> --}}


<div class="relative mt-3 md:mt-0 text-white" x-data="{ isOpen: true }">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class="bg-gray-800 text-sm rounded-full w-full px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search Movies here (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
       
    >

  
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
    @if (strlen($search) > 0)
    <button
    wire:click="clear"
    @click="isOpen = false"
    @keydown.escape.window="isOpen = false"
    @click.away="isOpen=false"
    class="absolute top-0 right-0 mr-4  hover:text-gray-300">&times;
   </button>
   @endif

    @if (strlen($search) >= 2)
    <div
        class=""
        x-show.transition.opacity="isOpen"
    >
        @if ($popularMovies->count() > 0)
        <x-movies-list  :popularMovies="$popularMovies" :nowPlayingMovies="$nowPlayingMovies" :title="$search" />
        @else
        <div class="px-3 py-3">No results for "{{ $search }}"</div>

    @endif

    </div>
    @else

    <x-movies-list  :popularMovies="$popularMovies" :nowPlayingMovies="$nowPlayingMovies" :title="$search"/>

    @endif

    
</div>
