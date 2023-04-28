<?php
include("../../conexion.php");
include ("../../template/header.php"); 

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

    <form action="" method="POST">
  
      <div class="from">
      <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
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
        <a href="index.php" class= "btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>



