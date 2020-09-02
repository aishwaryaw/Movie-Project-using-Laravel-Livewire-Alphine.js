<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\TVShowsModel;
use App\ViewModels\TVShowModel;


class TVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page=1)
    {
    //     $tvshows = Http::withToken(config('services.tmdb.token'))
    //     ->get('https://api.themoviedb.org/3/tv/popular')
    //     ->json()['results'];

    //     $genres = Http::withToken(config('services.tmdb.token'))
    //     ->get('https://api.themoviedb.org/3/genre/tv/list')
    //     ->json()['genres'];

    //     $genresArray = collect($genres)->mapWithKeys(function($genre){
    //         return [ $genre['id'] => $genre['name'] ];
    //     });

    
    //     //dd($genresArray);
    //    // dd($genres);

    //     $viewModel = new TVShowsModel(
    //         $tvshows,
    //         $genresArray
    //     );

        $page_accessed = $page;
       // error_log('controller');

        return view('TVShows.index', compact('page_accessed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
        ->json();

        //dd($show);

        $viewModel = new TVShowModel(
            $show
        );

       return view('TVShows.show', $viewModel);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
