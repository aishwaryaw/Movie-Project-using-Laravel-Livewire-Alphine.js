@extends('layouts.main')

@section('content')
   <div class="bg-gray-700">
    <div class="container mx-auto">
   <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> Popular TV Shows </div>
    @livewire('t-v-shows-list-search' , ['page_accessed' => isset($page_accessed) ? $page_accessed : 1])

    {{-- For normal component without the search facility -- }}
   {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 px-2">
         
           @foreach ($tvshows as $show)
           <x-tv-show-card :show="$show" />   
           @endforeach
        
       </div> --}}

    </div>

   </div>

@section('scripts')
<livewire:scripts>
@endsection
@endsection


