<?php 
session_start();
$nom_usuario= $_POST["usuario"];
$pass_usuario = $_POST["password"];
include("../config.php");

$sql= "SELECT * FROM `usuario` WHERE usuario='$nom_usuario'&& pass='$pass_usuario' ; ";
echo $sql;
$resultado= mysqli_query($con,$sql);
if (!$resultado) {
    echo "No se pudo ejecutar con exito la consulta ($sql) en la BD: " . mysql_error();
    exit;
}
$arra_asc= mysqli_fetch_array($resultado);

    if ($usuario =$arra_asc["usuario"] && $pass_usuario=$arra_asc['pass'] ){
        echo "se logoe";    
        $_SESSION["Admin"]=$nom_usuario;
    
        header("Location: ../index.php?Login=1");
    }
    else{
    
    echo($mail_usuario."-error- ".$pass_usuario);
    
    $msj ="Usuario o contraseña erroneas";
    header("Location:../index.php?Login=0"%$msj);
 
    }
    
    include('/mensajes.php'); 
  

?>