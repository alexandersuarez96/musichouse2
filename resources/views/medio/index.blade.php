@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Pagina Principal Medios</h2>
    </div>

  </div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('medio.create') }}"> Añadir Medio</a>
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


    @foreach($medios as $medio)
    <tr>
      <td>{{$medio->id}}</td>
      <td>{{$medio->nombre}}</td>
      
      <td>
        <form action="{{ route('medio.destroy',$medio->id) }}" method="POST">

          

          <a class="btn btn-primary" href="{{ route('medio.edit',$medio->id) }}">Editar</a>

          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  </table>

  {{ $medios->links() }}
</div>
</div>

@endsection