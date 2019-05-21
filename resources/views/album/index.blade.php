@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Albumes</h2>
    </div>

  </div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('album.create') }}"> Añadir Album</a>
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
      <th>Fecha</th>
      <th>id Casa musical</th>
      <th width="280px">Action</th>
    </tr>
    @foreach($albums as $album)
    <tr>
      <td>{{$album->id}}</td>
      <td>{{$album->nombre}}</td>
      <td>{{$album->fecha}}</td>
      <td>{{$album->home_musics_id}}</td>
      <td>
        <form action="{{ route('album.destroy',$album->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('album.edit',$album->id) }}">Editar</a>

          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  </table>

  {{ $albums->links() }}
</div>


@endsection