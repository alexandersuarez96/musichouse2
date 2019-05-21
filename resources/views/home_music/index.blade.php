@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Casa Musical</h2>
    </div>

  </div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('home_music.create') }}"> Añadir Casa Musical</a>
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


    @foreach($home_musics as $home_music)
    <tr>
      <td>{{$home_music->id}}</td>
      <td>{{$home_music->nombre}}</td>
   
      <td>
        <form action="{{ route('home_music.destroy',$home_music->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('home_music.edit',$home_music->id) }}">Editar</a>

          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  </table>

  {{ $home_musics->links() }}
</div>



@endsection