<style>
body {
        background-color: #E1F2F7;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;      
    }
</style>

<?php 
include("../../bd.php");


if($_POST){
  $nombres=(isset($_POST["nombres"])?$_POST["nombres"]:"");
  $apellidos=(isset($_POST["apellidos"])?$_POST["apellidos"]:"");
  $foto=(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");
  $idpuesto=(isset($_POST["idpuesto"])?$_POST["idpuesto"]:"");
  $ingreso=(isset($_POST["ingreso"])?$_POST["ingreso"]:"");
  
  $sentencia=$conexion->prepare("INSERT INTO `tbl_empleados` 
  (`id`, `nombres`, `apellidos`, `foto`, `idpuesto`, `ingreso`) 
  VALUES (NULL,:nombres,:apellidos,:foto,:idpuesto,:ingreso);");  
  
  $sentencia->bindParam(":nombres",$nombres);
  $sentencia->bindParam(":apellidos",$apellidos);

  $fecha_foto=new DateTime();
  $nombre_foto=($foto!= '')?$fecha_foto->getTimestamp()."_".$_FILES["foto"]['name']:"";
  $tmp_foto=$_FILES["foto"]['tmp_name'];
  if($tmp_foto!=''){
    move_uploaded_file($tmp_foto,"./".$nombre_foto);
  }
  $sentencia->bindParam(":foto",$nombre_foto);
  
  $sentencia->bindParam(":idpuesto",$idpuesto);
  $sentencia->bindParam(":ingreso",$ingreso);

  $sentencia->execute();
  $sentencia->execute();$mensaje ="Registro Agregado";
  header("Location:index.php?mensaje=".$mensaje); 

}
$sentencia =$conexion->prepare("SELECT * FROM `tbl_puesto`");
$sentencia->execute();
$lista_tbl_puesto=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      
?>

<?php include("../../barrasdenav/header.php"); ?>
 <br/>     
<div class="card">
    <div class="card-header">
        Ingrese Datos del Nuevo Empleado
    </div>
    <div class="card-body">
    <form action ="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
       <label for="nombres" class="form-label">Nombres</label>
       <input type="text"
         class="form-control" name="nombres" id="nombres" aria-describedby="helpId" placeholder="Ingrese Nombres">
    </div>
    <div class="mb-3">
       <label for="apellidos" class="form-label">Apellidos</label>
       <input type="text"
         class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Ingrese Apellidos">
    </div>   
    <div class="mb-3">
       <label for="foto" class="form-label">Foto</label>
       <input type="file"
         class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="foto">
    </div>   
    <div class="mb-3">
        <label for="idpuesto" class="form-label">Departamento  </label>
        
        <select class="form-select form-select-sm" name="idpuesto" id="idpuesto">
           <?php foreach($lista_tbl_puesto as $registro){?></option>
            <option value="<?php echo $registro['id']?>">
            <?php echo $registro['nombredelpuesto']?></option>
          <?php } ?>  
          </select>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Fecha de Ingreso</label>
      <input type="date" class="form-control" name="ingreso" id="ingreso" aria-describedby="emailHelpId" placeholder="Ingrese Fecha de Ingreso del Empleado">
    </div>
    <button type="subtmit" class="btn btn-success">Agregar Registro</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>
<?php include("../../barrasdenav/footer.php"); ?>