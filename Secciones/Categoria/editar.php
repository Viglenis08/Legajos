<style>
body {
        background-color: #E1F2F7;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;      
    }
</style>
<?php 
include("../../bd.php");
if(isset( $_GET['txtID'])){
    $txtID=(isset( $_GET['txtID']))?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM  tbl_puesto WHERE id =:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$registro["nombredelpuesto"];  
}
if($_POST){
    //print_r($_POST);
    $txtID=(isset( $_POST['txtID']))?$_POST['txtID']:"";
    $nombredelpuesto=(isset($_POST["nombredelpuesto"])?$_POST["nombredelpuesto"]:"");
    
    $sentencia=$conexion->prepare("UPDATE tbl_puesto SET nombredelpuesto=:nombredelpuesto WHERE id=:id");
    $sentencia->bindParam(":nombredelpuesto",$nombredelpuesto);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();$mensaje ="Registro Actualizado";
    header("Location:index.php?mensaje=".$mensaje); 
  }
  
?>

<?php include("../../barrasdenav/header.php"); ?>
      
<br/>
      <div class="card">
        <div class="card-header">
            Departamentos Existentes
        </div>
        <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
       
        <div class="mb-3">
          <label for="txtID" class="form-label">ID:</label>
          <input type="text"
          value="<?php echo $txtID;?>"
            class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="Ingrese el ID">  
        </div>
    
        <div class="mb-3">
              <label for="" class="form-label">Nombre del Puesto</label>
              <input type="text"
              value="<?php echo $nombredelpuesto;?>"
                class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="Ingrese el nombre del puesto">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a name="cancelar" id="cancelar" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
        </div>
        <div class="card-footer text-muted"></div>
      </div>
<?php include("../../barrasdenav/footer.php"); ?>