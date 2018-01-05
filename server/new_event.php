<?php
  require('conexion.php');
 
   session_start();
   $con = new ConectorDB();

  

  if($con->initConexion() == 'ok'){
    //ARREGLO ASOCIATIVO

    $data['TITULO'] = $_POST['titulo'];
    $data['FECHAINICIO'] = $_POST['start_date'];
    $data['FECHAFIN'] = $_POST['end_date'];
    $data['DIACOMPLETO'] = $_POST['allDay'];;
    $data['HORAINICIO'] = $_POST['start_hour'];
    $data['HORAFIN'] = $_POST['end_hour'];
    $data['IDUSUARIO'] = $_SESSION['sesion'];
    $data['IDESTADO'] = "9";

  	if($con->insertData('evento',$data)){
  		$response['msg'] = "OK"; 
  	}else {
  		$response['msg'] = "hubo un error en los datos";
  	} 
  	$con->cerrarConexion();
  }else{
  	$response['msg'] =  "error en la conexion en la base";
  }

  echo json_encode($response);

 ?>
