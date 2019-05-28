@extends('layouts.app')

@section('content')
<h1></h1>


<div class="container">
    <div class="card text-white bg-primary mb-3" style="">
        <div class="card-header">
        <h2>Añadir Una Nueva Cancion</h2>
        </div>
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
    @if(Session::has('success'))
    <div class="alert alert-info">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <form method="POST" action="{{ route('song.store') }}" role="form">
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
                    <strong>Duracion:</strong>
                    <input type="num" name="duracion" id="duracion" class="form-control" placeholder="Duracion">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>Interprete:</strong>
                    <select name="singers_id" id="inputsingers_id" class="form-control">
                        <option value="">Escoja la categoria</option>
                        @foreach($singers as $singer)
                        <option value="{{$singer['id']}}">{{$singer['nombre']}}</option>

                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>Genero:</strong>
                    <select name="song_types_id" id="inputsong_types_id" class="form-control">
                        <option value="">Escoja la categoria</option>
                        @foreach($song_types as $song_type)
                        <option value="{{$song_type['id']}}">{{$song_type['nombre']}}</option>

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
                <a href="{{ route('song.index') }}" class="btn btn-danger">Atras</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>

@endsection