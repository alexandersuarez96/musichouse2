<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PDF CASA MUSICALES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css">
  <script src="main.js"></script>
  <link href="{{ asset('css/bootstrap.min (1).css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<header class="clearfix">
  <div id="logo">
    <IMG src="img/23.png" border=0 name="luna" style="position:absolute;top:0px;right:200px;">
  </div>



</header>

<body>

  <h1>REPORTE CASAS MUSICALES</h1>
  <div id="company" class="clearfix">
    <div>Empresa: HOMEMUSICS</div>
    <div>---------------------------</div>
    <div>xxxxx</div>
    <div>NIT 32323232,<br /> </div>
    <div>111894850cc</div>

  </div>


  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>CASAS MUSICALES</h2>
      </div>

    </div>
  </div>

  <div class="col-lg-12 col-md-12 col-xs-12">

    <table class="table table-bordered">
      <tr>
        <th>id</th>
        <th>Nombre</th>
      </tr>


      @foreach($home_musics as $home_music)
      <tr>
      <td>{{$home_music->id}}</td>
      <td>{{$home_music->nombre}}</td>



      </tr>
      @endforeach
    </table>

    </table>


  </div>
  
</body>

</html>