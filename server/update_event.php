<?php
 
  require('conexion.php');
  session_start();
  $com = new ConectorDB;
  $mensaje;
  $datos['FECHAINICIO'] = $_POST['start_date'];
  $datos['FECHAFIN'] = $_POST['end_date'];
  $datos['HORAINICIO'] = $_POST['start_hour'];
  $datos['HORAFIN'] = $_POST['end_hour'];
  $condicion = " IDEVENTO = ".$_POST['id'];

  if(isset($_SESSION['sesion'])){
  	 if ($com->initConexion() == 'ok') {
  	 	# code...
  	 	$com->actualizarRegistro('evento',$datos,$condicion);
  	 	$mensaje['msg'] = "OK";
  	 }else{
  	 	$mensaje['msg'] = "problemas con la conexion a la base";
  	 }
     
  }else{
  	$mensaje['msg'] = "erro de usuario ud no esta logueado";
  }

  echo json_encode($mensaje);

 ?>
