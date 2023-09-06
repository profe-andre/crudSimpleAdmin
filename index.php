<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="imgs/Escudo.JPG">
    <!-- https://icons.getbootstrap.com/ -->
  </head>
<body>

<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center mt-3">CRUD básico con Administrador  </h1>
      <p class="text-center"></p>
        <a href="./"><i class="bi bi-house"></i></a>
        <?php include("botonera.php");?>
        <hr class="mb-3">
       <span>  </span>
       
    </div>
   

    <?php
    if (isset($_SESSION['Admin'])){
      include("Admin/append.php");
    }
    ?>
   
    <?php
    include('config.php');
    $sqlAlumnos   = ("SELECT * FROM table_alumnos ORDER BY id DESC");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $totalAlumnos = mysqli_num_rows($queryAlumnos);

    ?>
    <div class="col-md-8">
    <h3 class="text-center">Lista de Alumnos <?php echo '(' . $totalAlumnos . ')'; ?></h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th scope="col">Nombre y Apellido</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Sexo</th>
                  <?php 
                  if (isset($_SESSION['Admin'])){?>
                  <th scope="col">Acción</th> 
                  <?php }?>
                </tr>
              </thead>
              <tbody>
              <?php
              $conteo =1;
              while ($dataAlumno = mysqli_fetch_array($queryAlumnos)) { ?>
                <tr>
                  <td><?php echo  $conteo++ .')'; ?></td>
                  <td><?php echo $dataAlumno['namefull']; ?></td>
                  <td><?php echo $dataAlumno['cedula']; ?></td>
                  <td><?php echo $dataAlumno['sexo']==='M' ?  'Masculino' : 'Femenino' ?></td>
                  <td>
                  <?php  if (isset($_SESSION['Admin'])){
      
                  include("Admin/Acciones.php");}?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
  include('Admin/mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>