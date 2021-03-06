<div class="row">
    <div class="col-md-12">
        <section class="panel">                        
            <div class="panel-body">

              @if ( !empty ( $products->id) )

                <div class="form-group">
                  <label for="nombre" class="negrita">Nombre:</label>                          
                  <div>
                    <input class="form-control" placeholder="Jugo de Fresa" required="required" name="nombre" type="text" id="nombre" value="{{ $bicicletas->nombre }}">                              
                  </div>
                </div>

                <div class="form-group">
                  <label for="precio" class="negrita">Precio:</label>                          
                  <div>
                    <input class="form-control" placeholder="4.50" required="required" name="precio" type="text" id="precio" value="{{ $bicicletas->precio }}">                              
                  </div>
                </div>

                <div class="form-group">
                  <label for="stock" class="negrita">Stock:</label>                          
                  <div>
                    <input class="form-control" placeholder="40" required="required" name="stock" type="text" id="stock" value="{{ $bicicletas->stock }}">                              
                  </div>
                </div>

                <div class="form-group">
                  <label for="img" class="negrita">Selecciona una imagen:</label>                         
                  <div>
                  <input name="img[]" type="file" id="img" multiple="multiple">
                  <br>
                  <br>
                  @if ( !empty ( $products->imagenes) )

                    <span>Imagen(es) Actual(es): </span>
                    <br>

                    <!-- Mensaje: Imagen Eliminada Satisfactoriamente ! -->
                    @if(Session::has('message'))
                      <div class="alert alert-primary" role="alert">
                        {{ Session::get('message') }}
                      </div>
                    @endif

                    <!-- Mostramos todas las im??genes pertenecientesa a este registro -->
                    @foreach($imagenes as $img)                    
                        
                        <img src="../../../uploads/{{ $img->nombre }}" width="200" class="img-fluid"> 

                        <!-- Bot??n para Eliminar la Imagen individualmente -->
                        <a href="{{ route('admin/bicicletas/eliminarimagen', [$img->id, $bicicletas->id]) }}" class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a> 

                    @endforeach

                    

                  @else

                    A??n no se ha cargado una imagen para este producto

                  @endif                
                  </div>

                </div>

              @else

                <div class="form-group">
                  <label for="nombre" class="negrita">Nombre:</label>                          
                  <div>
                    <input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre">                              
                  </div>
                </div>

                <div class="form-group">
                  <label for="precio" class="negrita">Precio:</label>                          
                  <div>
                    <input class="form-control" placeholder="2500.00" required="required" name="precio" type="text" id="precio">                              
                  </div>
                </div>

                <div class="form-group">
                  <label for="stock" class="negrita">Stock:</label>                          
                  <div>
                    <input class="form-control" placeholder="35" required="required" name="stock" type="text" id="stock">                              
                  </div>
                </div>

                <div class="form-group">
                  <label for="img" class="negrita">Selecciona una imagen:</label>
                  <div>
                    <input name="img[]" type="file" id="img" multiple="multiple" required>               
                  </div>
                </div>

              @endif

                <button type="submit" class="btn btn-info">Guardar</button>
                <a href="{{ route('admin/bicicletas') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>
              
            </div>
        </section>
    </div>
</div>