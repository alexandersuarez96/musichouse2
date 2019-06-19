<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $singers=Singer::orderBy('id','ASC')->paginate(6);
        return view('singer.index',compact('singers'));
        
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $singers=Singer::orderBy('id','ASC')->get();
       return view('singer.create',compact('singers'));
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
            
            'nacionalidad'=>'required',
            
            ],
            [
            'nombre.required'=>'El campo nombre es obligatorio',
            
            'nacionalidad.required'=>'El campo nacionalidad es obligatorio',
            
            ]);
        Singer::create($request->all());
        $request->session()->flash('success','Registro satisfactorio');
        return redirect()->route('singer.create');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singers=Singer::find($id);
        return  view('singer.show',compact('singers'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $singer=Singer::find($id);
        return view('singer.edit',compact('singer'));
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
         
         'nacionalidad'=>'required',
         ]);
        Singer::find($id)->update($request->all());
        return redirect()->route('singer.index')->with('success','Registro actualizado satisfactoriamente');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Singer::find($id)->delete();
      
        return redirect()->route('singer.index')->with('success','Registro eliminado satisfactoriamente');
    }

    
 public function pdf()
 {        
     /**
      * toma en cuenta que para ver los mismos 
      * datos debemos hacer la misma consulta
     **/
    $singers= Singer::all(); 
    
    $pdf =PDF::loadView('singer.pdf',compact('singers'));
    return $pdf->download('listado cantantes.pdf');
 }
 }
 