@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Canciones</h2>
    </div>

  </div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('song.create') }}"> Añadir Cancion</a>
  </div>

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <table class="table table-bordered">
    <tr>
      <th>id</th>
      <th>Nombre de la cancion</th>
      <th>Duracion</th>
      <th>id Interprete</th>
      <th>id Genero</th>
      <th width="280px">Action</th>
    </tr>
    @foreach($songs as $song)
    <tr>
      <td>{{$song->id}}</td>
      <td>{{$song->nombre}}</td>
      <td>{{$song->duracion}}</td>
      <td>{{$song->singers_id}}</td>
      <td>{{$song->song_types_id}}</td>
      <td>
        <form action="{{ route('song.destroy',$song->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('song.edit',$song->id) }}">Editar</a>

          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  </table>

  {{ $songs->links() }}
</div>


@endsection