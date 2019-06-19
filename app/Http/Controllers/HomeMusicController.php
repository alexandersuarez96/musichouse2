<?php

namespace App\Http\Controllers;

use App\Models\HomeMusic;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class HomeMusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_musics=HomeMusic::orderBy('id','ASC')->paginate(6);
        return view('home_music.index',compact('home_musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $home_musics=HomeMusic::orderBy('id','ASC')->get();
       return view('home_music.create',compact('home_musics'));
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
           
            ],
            [
            'nombre.required'=>'El campo nombre es obligatorio',
            
            ]);
        HomeMusic::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('home_music.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeMusic  $homeMusic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home_musics=HomeMusic::find($id);
        return  view('home_music.show',compact('home_musics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeMusic  $homeMusic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home_music=HomeMusic::find($id);
        return view('home_music.edit',compact('home_music'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeMusic  $homeMusic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            ]);
           HomeMusic::find($id)->update($request->all());
           return redirect()->route('home_music.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeMusic  $homeMusic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       HomeMusic::find($id)->delete();
      
        return redirect()->route('home_music.index')->with('success','Registro eliminado satisfactoriamente');
    }
    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
       $home_musics= HomeMusic::all(); 
       
       $pdf =PDF::loadView('home_music.pdf',compact('home_musics'));
       return $pdf->download('listado casa musicales.pdf');
    }
}
