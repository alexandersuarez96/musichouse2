<?php

namespace App\Http\Controllers;

use App\Models\SongType;
use Illuminate\Http\Request;

class SongTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $song_types=SongType::orderBy('id','ASC')->paginate(6);
        return view('song_type.index',compact('song_types'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $song_types=SongType::orderBy('id','ASC')->get();
       return view('song_type.create',compact('song_types'));
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
        SongType::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('song_type.create');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song_types=SongType::find($id);
        return  view('song_type.show',compact('song_types'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $song_type=SongType::find($id);
        return view('song_type.edit',compact('song_type'));
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
        $this->validate($request,[
         'nombre'=>'required',
         ]);
        SongType::find($id)->update($request->all());
        return redirect()->route('song_type.index')->with('success','Registro actualizado satisfactoriamente');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SongType::find($id)->delete();
      
        return redirect()->route('song_type.index')->with('success','Registro eliminado satisfactoriamente');
    }
 
   
 }
 