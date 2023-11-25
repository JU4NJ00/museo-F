

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="verinfo<?php echo $fila ['idmuebles']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl ">

    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Informacion Descriptiva del Elemento Seleccionado</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      

      <form method="POST" action="">

            <input type="hidden" name="id" value="<?php echo $fila ['idmuebles']; ?>">

            <div class="modal-body " id="cont_modal">

       
            <div class="modal-body">
                      <div class="container-fluid">

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Designacion: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['designacion']; ?></p></div>
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
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['fechaing']; ?></p></div>
                        </div>
                        <hr>

                        
                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Datos descriptivos: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['datodescr']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Procedencia: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['procedencia']; ?></p></div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-3 ms-auto"><p><strong>Estado de conservacion: </strong> </p></div>
                          <div class="col-md-9 ms-auto"><p> <?php echo $fila['estadoconserv']; ?></p></div>
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

