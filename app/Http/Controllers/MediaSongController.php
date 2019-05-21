<?php

namespace App\Http\Controllers;

use App\Models\MediaSong;
use Illuminate\Http\Request;

class MediaSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias=Media::orderBy('id','ASC')->paginate(6);
        return view('media.index',compact('medias'));
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
     * @param  \App\Models\MediaSong  $mediaSong
     * @return \Illuminate\Http\Response
     */
    public function show(MediaSong $mediaSong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaSong  $mediaSong
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaSong $mediaSong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaSong  $mediaSong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaSong $mediaSong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaSong  $mediaSong
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaSong $mediaSong)
    {
        //
    }
}
