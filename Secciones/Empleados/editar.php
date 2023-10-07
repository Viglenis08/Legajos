<style>
body {
        background-color: #E1F2F7;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;      
    }
</style>
<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_empleados WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $nombres = $registro["nombres"];
    $apellidos = $registro["apellidos"];
    $foto = $registro["foto"];
    $idpuesto = $registro["idpuesto"];
    $ingreso = $registro["ingreso"];

    $sentencia = $conexion->prepare("SELECT * FROM `tbl_puesto`");
    $sentencia->execute();
    $lista_tbl_puesto = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
    $nombres = isset($_POST["nombres"]) ? $_POST["nombres"] : "";
    $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
    $idpuesto = isset($_POST["idpuesto"]) ? $_POST["idpuesto"] : "";
    $ingreso = isset($_POST["ingreso"]) ? $_POST["ingreso"] : "";

    // Actualizar los datos del empleado
    $sentencia = $conexion->prepare("UPDATE `tbl_empleados`
        SET
            nombres = :nombres,
            apellidos = :apellidos,
            idpuesto = :idpuesto,
            ingreso = :ingreso
        WHERE id = :id");

    $sentencia->bindParam(":nombres", $nombres);
    $sentencia->bindParam(":apellidos", $apellidos);
    $sentencia->bindParam(":idpuesto", $idpuesto);
    $sentencia->bindParam(":ingreso", $ingreso);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    /*if ($sentencia->execute()) {
        // Actualización exitosa
        header("Location: index.php");
        exit();
    } else {
        // Error al actualizar
        $error_message = "Error al actualizar los datos del empleado.";
    }*/

    $foto=(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");
    $fecha_foto=new DateTime();
    $nombre_foto=($foto!= '')?$fecha_foto->getTimestamp()."_".$_FILES["foto"]['name']:"";
    $tmp_foto=$_FILES["foto"]['tmp_name'];
    
    if($tmp_foto!=''){
      move_uploaded_file($tmp_foto,"./".$nombre_foto);
      
      $sentencia =$conexion->prepare("SELECT foto FROM `tbl_empleados` WHERE id=:id");
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
      $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);
      if(isset($registro_foto["foto"]) && $registro_foto["foto"]!=""){
        if(file_exists("./".$registro_foto["foto"])){
                unlink("./".$registro_foto["foto"]);
        }
    }
      $sentencia = $conexion->prepare("UPDATE `tbl_empleados` SET foto =:foto WHERE id = :id");
      $sentencia->bindParam(":foto",$nombre_foto);
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
    }
    $sentencia->execute();$mensaje ="Registro Actualizado";
    header("Location:index.php?mensaje=".$mensaje); 
    exit();
}
?>

<?php include("../../barrasdenav/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
        Actualización de Datos
    </div>
    <div class="card-body">
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input type="text" value="<?php echo $txtID; ?>" class="form-control" name="txtID" id="txtID" readonly>
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" value="<?php echo $nombres; ?>" class="form-control" name="nombres" id="nombres" placeholder="Ingrese Nombres">
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" value="<?php echo $apellidos; ?>" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese Apellidos">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <br/>
                <img width="100" src="<?php echo $foto; ?>" class="rounded" alt=""/>
                <br/><br/>
                <input type="file" class="form-control" name="foto" id="foto" placeholder="foto">
            </div>
            <div class="mb-3">
                <label for="idpuesto" class="form-label">Departamento</label>
                <select class="form-select form-select-sm" name="idpuesto" id="idpuesto">
                <?php foreach ($lista_tbl_puesto as $registro) { ?>
                    <option value="<?php echo $registro['id'] ?>" <?php if ($idpuesto == $registro['id']) { echo 'selected'; } ?>>
                        <?php echo $registro['nombredelpuesto'] ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ingreso" class="form-label">Fecha de Ingreso</label>
                <input type="date" class="form-control" name="ingreso" id="ingreso" placeholder="Ingrese Fecha de Ingreso del Empleado" value="<?php echo $ingreso; ?>">
            </div>
            <button type="submit" class="btn btn-success">Actualizar Registro</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>
<?php include("../../barrasdenav/footer.php"); ?>
