<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\HomeMusic;
use App\Models\AlbumSong;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums=Album::orderBy('id','ASC')->paginate(6);
        return view('album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $albums=Album::orderBy('id','ASC')->get();
        $home_musics=HomeMusic::All();
        return view('album.create',compact('albums','home_musics'));
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
            'fecha'=>'required',
            'home_musics_id'=>'required'
            ],
            [
            'nombre.required'=>'El campo URL es obligatorio',
            'fecha.required'=>'El campo Fecha es obligatorio',
            'home_musics_id'=>'El campo es obligatorio'
            ]);
        Album::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('album.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::find($id);
        $home_musics=HomeMusic::All();
        return view('album.edit',compact('album','home_musics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'fecha'=>'required',
            'home_musics_id'=>'required'
            ]);
            
           Album::find($id)->update($request->all());
           return redirect()->route('album.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Album::find($id)->delete();
      
        return redirect()->route('album.index')->with('success','Registro eliminado satisfactoriamente');
    }
    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
       $albums= Album::all(); 
       
       $pdf =PDF::loadView('album.pdf',compact('albums'));
       return $pdf->download('listado Albumes.pdf');
    }
    
}
