<?php
include('../config.php');
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');

$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);

//$metodoAction ==1, es crear un registro nuevo


if($metodoAction == 1){

    $fechaRegistro  = date('d-m-Y H:i:s A', time()); 
    $namefull       = filter_var($_POST['namefull'], FILTER_SANITIZE_STRING);
    $cedula         = (int) filter_var($_POST['cedula'], FILTER_SANITIZE_NUMBER_INT);
    $sexo           = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
    $section        = filter_var($_POST['section'], FILTER_SANITIZE_STRING);

    //Informacion de la foto
    $filename       = $_FILES["foto"]["name"]; //nombre de la foto
    $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
    $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
    $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

//Se comprueba si la foto a cargar es correcto observando su extensión y tamaño, 100000 = 1 Mega 
if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
    

    //Verificando si existe el directorio, de lo contrario lo creo
    $dirLocal       = "fotosAlumnos/";
    if (!file_exists('../'.$dirLocal)) {
        mkdir($dirLocal, 0777, true);
    }else{
        chmod("'../'$dirLocal", 777);
        chmod("'../'$dirLocal/*.*", 777);
    }

    $miDir 		      = opendir($dirLocal); //Habro mi  directorio
    $urlFotoAlumno    = $dirLocal. $filename; //Ruta donde se almacena la factura.
    
    //Muevo la foto a mi directorio.
    echo  "desde  ---  ". $sourceFoto;
    echo "  a .... ". $urlFotoAlumno; 
    if(move_uploaded_file($sourceFoto,'../'. $urlFotoAlumno)){
        echo "para guardar-----".$urlFotoAlumno;
        chmod("$urlFotoAlumno", 0777);
      
        $SqlInsertAlumno = ("INSERT INTO table_alumnos
        VALUES(
            NULL,
            '".$namefull."',
            '".$cedula."',
            '".$sexo."',
            '".$section."',
            '".$dirLocal.$filename."',
            '".$fechaRegistro."'
        )");
        print_r( $SqlInsertAlumno);
        $resulInsert = mysqli_query($con, $SqlInsertAlumno);
        print_r("no guardo???"); 

    }else{echo " *************no copio la imagen";
        
    }
    
    //closedir($miDir);
  // header("Location:../index.php?a=1");

  }else{
  //  header("Location:../index.php?errorimg=1");
  }
}


//Actualizar registro del Alumno
if($metodoAction == 2){
    $idAlumno      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

   $namefull       = filter_var($_POST['namefull'], FILTER_SANITIZE_STRING);
   $cedula         = (int) filter_var($_POST['cedula'], FILTER_SANITIZE_NUMBER_INT);
   $sexo           = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
   $section        = filter_var($_POST['section'], FILTER_SANITIZE_STRING);

   $UpdateAlumno    = ("UPDATE table_alumnos
       SET namefull='$namefull',
       cedula='$cedula', 
       sexo='$sexo', 
       section='$section'
       WHERE id='$idAlumno' ");
   $resultadoUpdate = mysqli_query($con, $UpdateAlumno);


   //Verificando si existe foto del alumno para actualizar
   if (!empty($_FILES["foto"]["name"])){
    echo "hay foto";
           $filename       = $_FILES["foto"]["name"]; //nombre de la foto
           $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
           $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
           $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

           //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
           
           //Verificando si existe el directorio, de lo contrario lo creo
           $dirLocal       = "fotosAlumnos";
           $miDir 		      = opendir($dirLocal); //Habro mi  directorio
           $urlFotoAlumno    = $dirLocal.'/'.$filename; //Ruta donde se almacena la factura.
           chmod("$dirLocal", 0777); 
           chmod("$urlFotoAlumno", 0777); 
           
           //Muevo la foto a mi directorio.
            if(move_uploaded_file($sourceFoto,'../'. $urlFotoAlumno)){
           
                $updateFoto = ("UPDATE table_alumnos SET foto='$urlFotoAlumno' WHERE id='$idAlumno' ");
                $resultFoto = mysqli_query($con, $updateFoto);
            echo "guardo ";
            }
        }else{
            print_r("no hay imagen");
            header("Location:index.php?errorimg=1");
        }
    }

 header("Location:formEditar.php?update=1&id=$idAlumno");
}

//Eliminar Alumno
if($metodoAction == 3){
    $idAlumno  = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $namePhoto = filter_var($_REQUEST['foto'], FILTER_SANITIZE_STRING);

    $SqlDeleteAlumno = ("DELETE FROM table_alumnos WHERE  id='$idAlumno'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    if($resultDeleteAlumno !=0){
        $fotoAlumno = "fotosAlumnos/".$namePhoto;
        unlink($fotoAlumno);
    }
    
    $msj ="Alumno Borrado correctamente.";
    header("Location:index.php?deletAlumno=1&mensaje=".$msj);
 
}

?>