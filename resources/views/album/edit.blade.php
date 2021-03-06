@extends('layouts.app')
@section('content')
<h1></h1>
<div class="container">
<div class="card text-white bg-primary mb-3" style="">
  <div class="card-header"><h2>Editar Album</h2></div>
  <div class="card-body">
  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Hubo algunos problemas con el ingreso de datos.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="{{ route('album.update',$album->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>nombre:</strong>
          <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{$album->nombre}}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>fecha de lanzamiento:</strong>
          <input type="date" name="fecha" id="fecha" class="form-control input-sm" placeholder="dd/mm/aaaa" value="{{$album->fecha}}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Casa Musical:</strong>
          <select name="home_musics_id" id="inputhome_musics_id" class="form-control">
            <option value="">Escoja la categoria</option>
            @foreach($home_musics as $home_music)
            <option value="{{$home_music['id']}}">{{$home_music['nombre']}}</option>

            @endforeach
          </select>

        </div>
      </div>
      <!-- Button (Double) -->
      
        </div>
        <div class="form-group">
        <label class="col-md-12 control-label"></label>
        <div class="pull-left">
          <button type="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
          <a href="{{ route('album.index') }}" class="btn btn-danger">Atras</a>
      </div>
  </form>
  </div>
</div>
</div>
@endsection