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
    $sentencia =$conexion->prepare("SELECT foto FROM `tbl_empleados` WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);
       print_r($registro_foto);

    if(isset($registro_foto["foto"]) && $registro_foto["foto"]!=""){
        if(file_exists("./".$registro_foto["foto"])){
                unlink("./".$registro_foto["foto"]);
        }
    }
    $sentencia=$conexion->prepare("DELETE FROM  tbl_empleados WHERE id =:id");
    $sentencia->bindParam(":id", $txtID);
    
    $sentencia->execute();
    $mensaje ="Registro Eliminado";
    header("Location:index.php?mensaje=".$mensaje);   
    exit();  
}

$sentencia =$conexion->prepare("SELECT *,
(SELECT nombredelpuesto 
FROM tbl_puesto
WHERE tbl_puesto.id=tbl_empleados.idpuesto limit 1) as puesto 
FROM tbl_empleados");
$sentencia->execute();
$lista_tbl_empleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../barrasdenav/header.php"); ?>
<br/>      
<h3>Empleados Actuales</h3>       
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" 
        href="crear.php" role="button">Ingrese Nuevo Registro</a>
    </div>
    <div class="card-body">
        <div class="container mt-3">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($lista_tbl_empleados as $registro){?>
                    <tr class="">
                        <td><?php echo $registro['id'];?></td>
                        <td scope="row">
                        <?php echo $registro['nombres'];?>
                        <?php echo $registro['apellidos'];?>
                        
                        </td>
                        <td><img width="80" src ="<?php echo $registro['foto'];?>" 
                        class="img-fluid rounded" alt=""/>
                        
                        <td><?php echo $registro['puesto'];?></td>
                        <td><?php echo $registro['ingreso'];?></td>
                        <td>
                        <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                        <a class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id']; ?>);" role="button">Eliminar</a>
   
                        </td>
                    </tr> 
                <?php } ?> 
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../barrasdenav/footer.php"); ?>