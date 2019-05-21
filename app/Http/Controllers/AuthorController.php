<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $authors=Author::orderBy('id','ASC')->paginate(6);
        return view('author.index',compact('authors'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $authors=Author::orderBy('id','ASC')->get();
       return view('author.create',compact('authors'));
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
            'nacionalidad'=>'required',
            'sexo'=>'required',
            ],
            [
            'nombre.required'=>'El campo nombre es obligatorio',
            'fecha.required'=>'El campo Fecha es obligatorio',
            'nacionalidad.required'=>'El campo nacionalidad es obligatorio',
            'sexo.required'=>'El campo sexo es obligatorio'
            ]);
        Author::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('author.create');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors=Author::find($id);
        return  view('author.show',compact('authors'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $author=Author::find($id);
        return view('author.edit',compact('author'));
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
         'fecha'=>'required',
         'nacionalidad'=>'required',
         'sexo'=>'required']);
        Author::find($id)->update($request->all());
        return redirect()->route('author.index')->with('success','Registro actualizado satisfactoriamente');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::find($id)->delete();
      
        return redirect()->route('author.index')->with('success','Registro eliminado satisfactoriamente');
    }
 
   
 }
 