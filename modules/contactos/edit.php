<?php 
include("../../conexion.php");
include ("../../template/header.php"); 



//PARA TRAER LOS DATOS A EDITAR POR id

if (isset($_GET['id'])) {
    
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm= $conexion->prepare("SELECT * FROM usuarios WHERE id=:txtid");
    $stm-> bindParam(":txtid", $txtid);
    $stm->execute();

    $record=$stm->fetch(PDO::FETCH_LAZY);
    $name=$record['nombre'];
    $phone=$record['telefono'];
    $date=$record['fecha'];
    $st=$record['estado'];
    $vlr=$record['valor'];

 }

 
//UPDATE
 if($_POST){
  
    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");
    $estado=(isset($_POST['estado'])?$_POST['estado']:"");
    $valor=(isset($_POST['valor'])?$_POST['valor']:"");

    $stm=$conexion->prepare("UPDATE usuarios SET nombre=:nombre, telefono=:telefono, fecha=:fecha, estado=:estado, valor=:valor WHERE id=:txtid");
    $stm-> bindParam(":txtid", $txtid);
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
        
        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>" placeholder="type name">

        <label for="">Name</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $name; ?>" placeholder="type name">

        <label for="">Cellphone</label>
        <input type="text" class="form-control" name="telefono" value="<?php echo $phone; ?>" placeholder="type cellphone">

        <label for="">Date</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $date; ?>">

        <label for="">Status</label>
        <input type="text" class="form-control" name="estado" value="<?php echo $st; ?>" placeholder="type state - (Enviada / Cancelada)">

        <label for="">Price</label>
        <input type="text" class="form-control" name="valor" value="<?php echo $vlr; ?>" placeholder="type price">
      </div>

      </div>
      <div class="modal-footer">
        <a href="index.php" class= "btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>


<?php include ("../../template/footer.php"); ?>