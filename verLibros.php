

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="verinfo2<?php echo $fila ['idlibro']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl ">

    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Informacion Descriptiva del Elemento Seleccionado</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      

      <form method="POST" action="">

            <input type="hidden" name="id" value="<?php echo $fila ['idlibro']; ?>">

            <div class="modal-body " id="cont_modal">

       
            <div class="modal-body">
                      <div class="container-fluid">

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Autor: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['autor']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Imagen: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php if ($fila['nomImg']) {echo '<img src="./imagenes/'.$fila['nomImg'].'" alt="" srcset="">'; } else { echo 'Imagen no encontrada';} ?> </p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Nombre: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['nombre']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Editorial: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['editorial']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Fecha de edición: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['fechaedicion']; ?></p></div>
                        </div>
                        <hr>

                        
                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Lugar: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['lugar']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Paginas: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['paginas']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Modo de adquisición: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['modoadquisicion']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Nombre del donante: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['nomdonante']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Fecha de ingreso: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['nomdonante']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Descripción: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['descripcion']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Modo de adquisición: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['modoadquisicion']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Procedencia: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['procedencia']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Estado: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['estado']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Codigo: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['codigo']; ?></p></div>
                        </div>




                      </div>
                    </div>




                

                
                
                
              </div>

       </form>



     
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

