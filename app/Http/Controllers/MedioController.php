<?php

namespace App\Http\Controllers;

use App\Models\Medio;
use Illuminate\Http\Request;

class MedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medios=Medio::orderBy('id','ASC')->paginate(6);
        return view('medio.index',compact('medios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medios=Medio::orderBy('id','ASC')->get();
        return view('medio.create',compact('medios'));
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
        Medio::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('medio.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function show(Medio $medio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medio=Medio::find($id);
        return view('medio.edit',compact('medio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            ]);
           Medio::find($id)->update($request->all());
           return redirect()->route('medio.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medio::find($id)->delete();
      
        return redirect()->route('medio.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
