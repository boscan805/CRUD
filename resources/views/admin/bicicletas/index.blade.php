<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
    <meta name="theme-color" content="#000000" />

    <title> </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          
    </div>


      <div class="container mb-5">

          <div class="row">

            <div class="col-md-12">

              <h1 style="font-size: 28px;" class=" text-center">CRUD </h1>

              <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <!-- Logo -->
                  <div class="logo">
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
                  </li>
                  <li class="list-group-item">
                    <a href=""> Products</a>
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
              </ul>
            </div>
          </div>
        
            <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
          </ol>
        </nav>
        
        <div class="row">

          <div class="col-md-12">

              <div class="content-box-large">

                <div class="panel-heading">
                <div class="panel-title"><h2>Products</h2></div>             
                    
              </div>
                
                <div class="panel-body">

                  @if(Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                      {{ Session::get('message') }}
                    </div>
                  @endif

                
                  <a href="{{ route('admin/bicicletas/crear') }}" class="btn btn-success mt-4 ml-3">  Agregar
                  </a>
                                  
                                  <section class="example mt-4">
                                      
                                    <div class="table-responsive">

                                      <table class="table table-striped table-bordered table-hover" id="tablaelle">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Rating</th>
                                            <th></th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($products as $product)
                                          <tr>
                                            <td class="v-align-middle">{!! $product->title !!}</td> 
                                            <td class="v-align-middle">{!! $product->price !!}</td>
                                            <td class="v-align-middle">{!! $product->description !!}</td>
                                            <td class="v-align-middle">{!! $product->category !!}</td>
                                            <td class="v-align-middle"><img src="{{ $product->image }}" style = "border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 100px;" "></td>
                                            <td class="v-align-middle">{!! $product->rating->rate !!}</td>
                                            
                                            <td class="v-align-middle">
                                              <form action="" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">

                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                                            
                                                <button onclick="location.href=''" href="" type="button" class="btn btn-dark"><i class="fa-regular fa-eye"></i></button>

                                                <a href="{{ route('admin/bicicletas/actualizar',$product->id) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>          

                                                <button type="submit" class="btn btn-danger fa-regular fa-delete-left""><i class=""></i></button>

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

            
    </footer>
    <!-- Bootstrap JS -->
    <!-- <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript">

        function confirmarEliminar()
        {
        var x = confirm("Estas seguro de Eliminar?");
        if (x)
          return true;
        else
          return false;
        }
        $(document).ready( function () {
    $('#tablaelle').DataTable();
} );
    </script>
    <script src="/app/api/api.js"></script>

  </body>
</html>


