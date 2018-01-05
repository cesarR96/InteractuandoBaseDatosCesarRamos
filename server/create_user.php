<?php


require('conexion.php');


  $con = new ConectorDB();

  

  if($con->initConexion() == 'ok'){
    //ARREGLO ASOCIATIVO

    $cadena_encriptada = $con->encrypt("123","CLAVE");
    $cadena_desencriptada = $con->decrypt($cadena_encriptada,"CLAVE");
  	
  	$usuario1['NOMBREUSUARIO'] = "estefany";
  	$usuario1['CONTRASENA'] = $cadena_encriptada;
  	$usuario1['IDESTADO'] = "9";
  	$usuario2['NOMBREUSUARIO'] = "ana";
  	$usuario2['CONTRASENA'] = $cadena_encriptada;
  	$usuario2['IDESTADO'] = "9";
  	$usuario3['NOMBREUSUARIO'] = "sofia";
  	$usuario3['CONTRASENA'] = $cadena_encriptada;
  	$usuario3['IDESTADO'] = "9";

  	if($con->insertData('usuarios',$usuario1) && $con->insertData('usuarios',$usuario2) && $con->insertData('usuarios',$usuario3)){
  		echo "se ingresaron los datos  ";
  	}else echo "se produjo en la insercion";

  	$con->cerrarConexion();
  }else{
  	echo "error en la conexion en la base";
  }



  //encriptar

  

 ?>
