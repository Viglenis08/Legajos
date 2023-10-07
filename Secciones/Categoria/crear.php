<style>
body {
        background-color: #E1F2F7;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;      
    }
</style>
<?php
include("../../bd.php");
if($_POST){

  $nombredelpuesto=(isset($_POST["nombredelpuesto"])?$_POST["nombredelpuesto"]:"");
  
  $sentencia=$conexion->prepare("INSERT INTO tbl_puesto(id,nombredelpuesto)
  VALUES(null, :nombredelpuesto)");

  $sentencia->bindParam(":nombredelpuesto",$nombredelpuesto);
  $sentencia->execute();$mensaje ="Registro Agregado";
  header("Location:index.php?mensaje=".$mensaje); 
}

?>


<?php include("../../barrasdenav/header.php"); ?>
<br/>
      <div class="card">
        <div class="card-header">
            Creación de nuevos departamentos y/o cargos
        </div>
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
              <label for="" class="form-label">Nombre del Puesto</label>
              <input type="text"
                class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="Ingrese el nombre del puesto">
        </div>
        <button type="submit" class="btn btn-success">Agregar</button>
        <a name="cancelar" id="cancelar" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
        </div>
        <div class="card-footer text-muted"></div>
      </div>


<?php include("../../barrasdenav/footer.php"); ?>