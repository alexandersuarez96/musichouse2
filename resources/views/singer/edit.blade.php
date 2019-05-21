@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Interprete</h2>
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

    <form action="{{ route('singer.update',$singer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{$singer->nombre}}">
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nacionalidad</strong>
                    <input type="text" name="nacionalidad" class="form-control input-sm" placeholder="nacionalidad" value="{{ $singer->nacionalidad }}">
                </div>
            </div>
           
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="pull-right">
                    <button type="submit" vaue="Guardar" class="btn btn-success">Guardar</button>
                    <a href="{{ route('singer.index') }}" class="btn btn-danger">Atras</a>
                </div>
            </div>
        </div>

    </form>
</div>



@endsection