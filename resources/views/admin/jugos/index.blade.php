<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <meta name="theme-color" content="#000000" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">      

  </head>

  <body> 

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li> 
          </ul>
          <form name="bencc" method="get" action="https://www.google.com/search" id="bencc" class="form-inline mt-2 mt-md-0" target="_blank">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." aria-label="Buscar...">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="document.getElementById('bencc').submit()">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
    </header>

    <div class="pccp mt-5 mb-3" align="center">
              <!-- P -->
            
    </div>


      <div class="container mb-5">

          <div class="row">

            <div class="col-md-12">


              <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="{{ route('admin/dashboard') }}">Administrador</a></h1>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="input-group form">
                           <!--
                           <input type="text" class="form-control" placeholder="Buscar...">
                           <span class="input-group-btn">
                             <button class="btn btn-primary" type="button">Buscar</button>
                           </span>
                           -->
                      </div>
                    </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li><a href="{{ route('admin/dashboard') }}">Administrador</a></li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="page-content">
        <div class="row">
          
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">

              <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ route('admin/dashboard') }}"> Dashboard</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('admin/jugos') }}"> Jugos</a>
                  </li>
                  <li class="list-group-item">
                    Opci??n 1
                  </li>
                  <li class="list-group-item">
                    Opci??n 2
                  </li>
                  <li class="list-group-item">
                    Opci??n 3
                  </li>
                  <li class="list-group-item">
                    Opci??n 4
                  </li>
                  <li class="list-group-item">
                    Opci??n 5
                  </li>
                  <li class="list-group-item">
                    Opci??n 6
                  </li>
                  <li class="list-group-item">
                    Opci??n 7
                  </li>
                  <li class="list-group-item">
                    Opci??n 8
                  </li>
                  <li class="list-group-item">
                    Opci??n 9
                  </li>
                  <li class="list-group-item">
                    Opci??n 10
                  </li>
              </ul>
            </div>
          </div>
        
            <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jugos</li>
          </ol>
        </nav>
        
        <div class="row">

          <div class="col-md-12">

              <div class="content-box-large">

                <div class="panel-heading">
                <div class="panel-title"><h2>Jugos</h2></div>             
                    
              </div>
                
                <div class="panel-body">

                  @if(Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                      {{ Session::get('message') }}
                    </div>
                  @endif

                
                  <a href="{{ route('admin/jugos/crear') }}" class="btn btn-success mt-4 ml-3">  Agregar
                  </a>
                                  
                                  <section class="example mt-4">
                                      
                                    <div class="table-responsive">

                                      <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                          <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($jugos as $jug)
                                          <tr>
                                            <td class="v-align-middle">{{$jug->nombre}}</td>
                                            <td class="v-align-middle">{{$jug->precio}}</td>
                                            <td class="v-align-middle">{{$jug->stock}}</td>
                                            <td class="v-align-middle">
                                              @foreach($ipas $i)
                                              <img src="uploads/{{$i}}" width="30" class="img-responsive">
                                              @endforeach
                                            </td>
                                            <td class="v-align-middle">

                                              <form action="{{ route('admin/jugos/eliminar',$jug->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">

                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                                            
                                                <a href="{{ route('admin/jugos/actualizar',$jug->id) }}" class="btn btn-primary">Editar</a>          

                                                <button type="submit" class="btn btn-danger">Eliminar</button>

                                              </form>                             
                                                
                                            </td>                                                 
                                          </tr>                                          
                                          @endforeach
                                        </tbody>
                                      </table>

                                    </div>
                                  </section>
                             


                </div>

              </div>

          </div>

        </div>

      </div>

      </div>

        </div>
              
            </div>

          </div>          

          <hr>

          <div class="row" align="center">

            <div class="col-md-12">


            </div>

          </div>

          <div class="row" align="center">

              <div class="col-md-3">
              
              </div>

          </div>           
          
          
        </div>



    <footer class="text-muted mt-3 mb-3">
        <div align="center">
      </div> 
    </footer>

    <!-- Bootstrap JS -->
    <!-- <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script> -->

    <script type="text/javascript">

        function confirmarEliminar()
        {
        var x = confirm("Estas seguro de Eliminar?");
        if (x)
          return true;
        else
          return false;
        }

    </script>
    
  </body>
</html>
