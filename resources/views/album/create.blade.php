@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir Nuevo Album</h2>
        </div>

    </div>
</div>
<div class="col-lg-8 col-md-8 col-xs-12">
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
    @if(Session::has('success'))
    <div class="alert alert-info">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <form method="POST" action="{{ route('album.store') }}" role="form">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>nombre:</strong>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>fecha de lanzamiento:</strong>
                    <input type="date" name="fecha" id="fecha" class="form-control input-sm" placeholder="dd/mm/aaaa">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8">
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
            
              


        </div>

        <!-- Button (Double) -->
        <div class="form-group">
    <label class="col-md-12 control-label"></label>
    <div class="pull-left">
        <button type="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
        <a href="{{ route('album.index') }}" class="btn btn-danger">Atras</a>
    </div>
</div>
</form>
</div>
</div>



@endsection