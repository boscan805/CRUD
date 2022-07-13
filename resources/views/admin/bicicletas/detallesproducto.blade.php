<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <meta name="theme-color" content="#000000" />

    <title>CRUD </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}"> 

    <script src="../../../js/jquery.min.js"></script>

    <link rel="stylesheet" href="../../../css/jquery.fancybox.min.css" />
    <script src="../../../js/jquery.fancybox.min.js"></script>     

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


      <div class="container mt-5 mb-5">

          <div class="row">

            <div class="col-md-12">

`
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
                    <a href="{{ route('admin/bicicletas') }}"> Bicicletas</a>
                  </li>
                  <li class="list-group-item">
                    Opción 1
                  </li>
                  <li class="list-group-item">
                    Opción 2
                  </li>
                  <li class="list-group-item">
                    Opción 3
                  </li>
                  <li class="list-group-item">
                    Opción 4
                  </li>
                  <li class="list-group-item">
                    Opción 5
                  </li>
                  <li class="list-group-item">
                    Opción 6
                  </li>
                  <li class="list-group-item">
                    Opción 7
                  </li>
                  <li class="list-group-item">
                    Opción 8
                  </li>
                  <li class="list-group-item">
                    Opción 9
                  </li>
                  <li class="list-group-item">
                    Opción 10
                  </li>
                  <li class="list-group-item">
                    Opción 11
                  </li>
                  <li class="list-group-item">
                    Opción 12
                  </li>
                  <li class="list-group-item">
                    Opción 13
                  </li>
              </ul>
            </div>
          </div>
        
            <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin/bicicletas') }}">Bicicletas</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $bicicletas->nombre }}</li>
          </ol>
        </nav>
        
        <div class="row">

          <div class="col-md-12">

              <div class="content-box-large">

                <div class="panel-heading">
                  
                  <div class="panel-title"><h2>{{ $bicicletas->nombre }}</h2></div>             
                      
                </div>
                
                <div class="panel-body">
                                  
                    <section class="example mt-4">

                      <strong>Precio:</strong> <br>
                      {{ $bicicletas->precio }} 

                      <br><br>

                      <strong>Stock:</strong> <br>
                      {{ $bicicletas->stock }}  

                      <br><br>

                      <strong>Creado:</strong> <br>
                      {{ $bicicletas->created_at }}  

                      <br><br>

                      <strong>Actualizado:</strong> <br>
                      {{ $bicicletas->updated_at }}                                                            

                      <br><br>

                      <strong>Galería de Imágenes:</strong> <br>

                      <!-- Mostramos todas las imágenes pertenecientes a este registro -->
                      @foreach($imagenes as $img)    

                        <a data-fancybox="gallery" href="../../../uploads/{{ $img->nombre }}">
                          <img src="../../../uploads/{{ $img->nombre }}" width="200" class="img-fluid"> 
                        </a>                         

                      @endforeach 

                      <br><br>

                      <a href="{{ route('admin/bicicletas') }}" class="btn btn-dark">Volver</a>
                                    
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

            

          </div>           
          
          
        </div>



    <footer class="text-muted mt-3 mb-3">
        
    </footer>

    <!-- Bootstrap JS -->
    <!-- <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script> -->
    
  </body>
</html>
