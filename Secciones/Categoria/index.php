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
        $sentencia=$conexion->prepare("DELETE FROM  tbl_puesto WHERE id =:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $mensaje ="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);       
}
$sentencia =$conexion->prepare("SELECT * FROM tbl_puesto");
$sentencia->execute();
$lista_tbl_puesto=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include("../../barrasdenav/header.php"); ?>
 <br/>
 
 
 <div class="card">
    <div class="card-header">

        <a name="" id="" class="btn btn-primary" 
        href="crear.php" role="button">Ingrese Nuevo Cargo</a>
    </div>
    </div>
    <div class="card-body">
    </div>


    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre del puesto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($lista_tbl_puesto as $registro){?>
            <tr class="">
                <td scope="row"><?php echo $registro['id']; ?></td>
                <td><?php echo $registro['nombredelpuesto']; ?></td>
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


<?php include("../../barrasdenav/footer.php"); ?>