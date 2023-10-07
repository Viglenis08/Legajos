<?php
$url_base ="http://localhost/ABM/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Proyecto Final</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
    crossorigin="anonymous"></script>    
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    body {
        background-color: #E5FAF0;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        position: relative;
        padding-bottom: 20px;       
    }
    .floating-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background-color: #007bff;
        color: #ffffff;
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        font-size: 20px;
        cursor: pointer;
        z-index: 999;
    }
.nav-link {
  font-family: "IBM Plex Mono", monospace;
  font-size: 17px;
  color: #060a24;
  letter-spacing: 0;
  line-height: 29px;
  padding: 0 10px 0 49px;
  text-decoration: none;
}

.nav-link:hover {
  text-decoration: wavy;
  color: #112FEB;
}

.nav-link :active {
  text-decoration: line-through;
  color: red;
}

</style>

</head>
<body id="top">
    <header>   
        <!--Menu de Navegacion-->
    </header>
<nav class ="navbar navbar-expand navbar-light bg-light">
    <ul class="nav navbar-nav">
        <li class ="nav-item">
            <a class="nav-link" href="<?php echo $url_base;?>index.php/" aria-current="page">Bienvenida <span class="visually-hidden"></a>
        </li>
        <li class ="nav-item">
            <a class ="nav-link" href="<?php echo $url_base;?>Secciones/Empleados/">Empleados</a>
        </li>
        <li class ="nav-item">
            <a class ="nav-link" href="<?php echo $url_base;?>Secciones/Categoria/">Categoria</a>
        </li>
           </ul>
</nav>
<main class ="container">
<?php if(isset($_GET['mensaje'])){  ?>
<script>
        Swal.fire({
        icon: 'success',
        title:"<?php echo $_GET['mensaje'];?>" 
});
</script>
<?php } ?>

 
</body>

