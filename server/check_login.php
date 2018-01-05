<?php


require('conexion.php');


$con = new ConectorDB();
$user = $_POST['user'];
$contra = $_POST['password'];
$cadena_encriptada = $con->encrypt($contra,"CLAVE");

if($con->initConexion() == 'ok'){

	if($resultado =  $con->consultar3([' usuarios '],['*'],"WHERE NOMBREUSUARIO = '$user' and CONTRASENA = '$contra'")){

               //recepcion de datos

			//recorrer la consulta con un recorrido asociativo
			while ($fila = $resultado->fetch_assoc()) {
            	# code...
            	//para asegurar que sean correctos los datos
				if($fila['NOMBREUSUARIO'] == $user AND $fila['CONTRASENA'] == $contra){
					echo("OK");
					//inicio la variable sesion
					session_start();
					 $_SESSION['sesion'] = $fila['IDUSUARIO'];
				}

			}
		
            //convierto a json
           /*  $data = array();  
	         if(mysqli_num_rows($resultado) != 0) {  
		       while($row = mysqli_fetch_assoc($resultado)) {  
			   $data[] = $row;
		     }  

		     echo $json_info = json_encode($data);
		 }*/
		}else{
			echo "hubo un problema los registros no fueron consultados ";
		}

	}else{
		echo "error con la conexion a la base";
	}

  //encriptar

	?>