@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Generos</h2>
    </div>

  </div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('song_type.create') }}"> Añadir Genero</a>
  </div>

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <table class="table table-bordered">
    <tr>
      <th>id</th>
      <th>Nombre</th>
      

      <th width="280px">Action</th>
    </tr>


    @foreach($song_types as $song_type)
    <tr>
      <td>{{$song_type->id}}</td>
      <td>{{$song_type->nombre}}</td>
  
      <td>
        <form action="{{ route('song_type.destroy',$song_type->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('song_type.edit',$song_type->id) }}">Editar</a>

          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  <th>
    <div class="btn-group">
      <a href="{{ route('song_type.pdf') }}" class="btn btn-warning" target="blank">Generar PDF </a>
    </div>
  <td>

    </th>
    <h1></h1>
  </table>

  {{ $song_types->links() }}
</div>
  @endsection