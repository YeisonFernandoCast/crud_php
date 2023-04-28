<?php

//CREATE

  if($_POST){
  

    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");
    $estado=(isset($_POST['estado'])?$_POST['estado']:"");
    $valor=(isset($_POST['valor'])?$_POST['valor']:"");

    $stm=$conexion->prepare("INSERT INTO usuarios (nombre, telefono, fecha, estado, valor) VALUES (:nombre, :telefono, :fecha, :estado, :valor)");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":telefono", $telefono);
    $stm->bindParam(":fecha", $fecha);
    $stm->bindParam(":estado", $estado);
    $stm->bindParam(":valor", $valor);
    $stm->execute();

    header("location:index.php");
  }

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
          <div class="modal-body">    
      <div class="from">
        <label for="">Name</label>
        <input type="text" class="form-control" name="nombre" placeholder="type name">

        <label for="">Cellphone</label>
        <input type="text" class="form-control" name="telefono" placeholder="type cellphone">

        <label for="">Date</label>
        <input type="date" class="form-control" name="fecha">

        <label for="">Status</label>
        <input type="text" class="form-control" name="estado" placeholder="type state - (Enviada / Cancelada)">

        <label for="">Price</label>
        <input type="text" class="form-control" name="valor" placeholder="type price)">
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>




