<?php

  require('conexion.php');
  session_start();
  $com = new ConectorDB;
  $mensaje;

  if(isset($_SESSION['sesion'])){

  	 $condicion = " IDEVENTO = ".$_POST['id'];
  	 if ($com->initConexion() == 'ok') {
  	 	# code...
  	 	$com->EliminarRegistro('evento',$condicion);
  	 	$mensaje['msg'] = "OK";
  	 }else{
  	 	$mensaje['msg'] = "problemas con la conexion a la base";
  	 }
     
  }else{
  	$mensaje['msg'] = "erro de usuario ud no esta logueado";
  }

  echo json_encode($mensaje);
 
  
 ?>
