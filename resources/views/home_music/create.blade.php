@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir Nuevo Casa Musical</h2>
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
<form method="POST" action="{{ route('home_music.store') }}" role="form">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>nombre:</strong>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>
        </div>
    </div>
    <!-- Button (Double) -->
    <div class="form-group">
            <label class="col-md-12 control-label"></label>
            <div class="pull-left">
                <button type="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
                <a href="{{ route('home_music.index') }}" class="btn btn-danger">Atras</a>
            </div>
        </div>
</form>
</div>


@endsection