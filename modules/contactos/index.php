<?php 
include("../../conexion.php");
include ("../../template/header.php"); 

//READ
$stm = $conexion->prepare("SELECT * FROM usuarios");
$stm->execute();
$contactos= $stm->fetchAll(PDO::FETCH_ASSOC);


//DELETE
 if (isset($_GET['id'])) {
    
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm= $conexion->prepare("DELETE FROM usuarios WHERE id=:txtid");
    $stm-> bindParam(":txtid", $txtid);
    $stm->execute();

    header("location:index.php");

 }

?>


<h4 text="center">Auxiliary Nursing - Health and Life</h4>
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  New
</button>-->

<script>
    function confirmar(){
        var respuesta = confirm("Are you sure to delete this record ?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>

<!--<a class="btn btn-primary" type="submit" href="../../modules/contactos/create.php/" role="button">Create</a>-->
<a href="create.php" class="btn btn-success">New</a>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Cellphone</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                
            
            <tr class="">
                
                <td scope="row"><?php echo $contacto['id'];?></td>
                <td scope="row"><?php echo $contacto['nombre'];?></td>
                <td scope="row"><?php echo $contacto['telefono'];?></td>
                <td scope="row"><?php echo $contacto['fecha'];?></td>
                <td scope="row"><?php echo $contacto['estado'];?></td>
                <td scope="row"><?php echo $contacto['valor'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $contacto['id'];?>" class="btn btn-success">Edit</a>
                        <a href="index.php?id=<?php echo $contacto['id'];?>" class="btn btn-danger" onclick="return confirmar()">Delete</a>
                        
                    </td>
            </tr>

            <?php }?> 
        </tbody>
    </table>
</div>

<?php include ("../../template/footer.php"); ?>