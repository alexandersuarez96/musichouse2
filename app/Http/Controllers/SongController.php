<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Singer;
use App\Models\SongType;
use App\Models\AuthorSong;
use App\Models\AlbumSong;
use App\Models\MediaSong;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs=Song::orderBy('id','ASC')->paginate(6);
        return view('song.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs=Song::orderBy('id','ASC')->get();
        $singers=Singer::All();
        $song_types=SongType::All();
        return view('song.create',compact('songs','singers','song_types'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre'=>'required',
            'duracion'=>'required',
            'singers_id'=>'required',
            'song_types_id'=>'required',
            ],
            [
            'nombre.required'=>'El campo nombre es obligatorio',
            'duracion.required'=>'El campo duraciones obligatorio',
            'singers_id'=>'El campo singers_id es obligatorio',
            'song_types_id'=>'El campo song_types_id es obligatorio',

            ]);
        Song::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('song.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song=Song::find($id);
        $singers=Singer::All();
        $song_types=SongType::All();
        
        return view('song.edit',compact('song','singers','song_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'duracion'=>'required',
            'singers_id'=>'required',
            'song_types_id'=>'required',
            ]);
            
           Song::find($id)->update($request->all());
           return redirect()->route('song.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::find($id)->delete();
      
        return redirect()->route('song.index')->with('success','Registro eliminado satisfactoriamente');
    }
    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
       $songs= Song::all(); 
       
       $pdf =PDF::loadView('song.pdf',compact('songs'));
       return $pdf->download('listado canciones.pdf');
    }
}
