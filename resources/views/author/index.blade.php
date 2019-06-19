@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Autores</h2>
    </div>

  </div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('author.create') }}"> Añadir Autor</a>
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
      <th>Nacionalidad</th>
      <th>Sexo</th>

      <th width="280px">Action</th>
    </tr>


    @foreach($authors as $author)
    <tr>
      <td>{{$author->id}}</td>
      <td>{{$author->nombre}}</td>
      <td>{{$author->fecha}}</td>
      <td>{{$author->nacionalidad}}</td>
      <td>{{$author->sexo}}</td>
      <td>
        <form action="{{ route('author.destroy',$author->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('author.edit',$author->id) }}">Editar</a>

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
      <a href="{{ route('author.pdf') }}" class="btn btn-warning" target="blank">Generar PDF </a>
    </div>
  <td>

    </th>
    <h1></h1>
  </table>

  {{ $authors->links() }}
</div>



@endsection