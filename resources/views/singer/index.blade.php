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
    <a class="btn btn-success" href="{{ route('singer.create') }}"> Añadir Interprete</a>
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
      <th>Nacionalidad</th>
      <th width="280px">Action</th>
    </tr>


    @foreach($singers as $singer)
    <tr>
      <td>{{$singer->id}}</td>
      <td>{{$singer->nombre}}</td>
      <td>{{$singer->nacionalidad}}</td>
   
      <td>
        <form action="{{ route('singer.destroy',$singer->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('singer.edit',$singer->id) }}">Editar</a>

          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  </table>

  {{ $singers->links() }}
</div>



@endsection