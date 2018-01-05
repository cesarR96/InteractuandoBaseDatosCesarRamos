<?php

require('conexion.php');

session_start();
$con = new ConectorDB();
if(isset($_SESSION['sesion'])){
	if($con->initConexion() == 'ok'){
  // 
		if($resultado =  $con->consultar3([' evento '],['IDEVENTO','TITULO','FECHAINICIO']," WHERE IDUSUARIO ='".$_SESSION['sesion']."'")){

               //recepcion de datos

			//recorrer la consulta con un recorrido asociativo
			$data = array();  
			if(mysqli_num_rows($resultado) != 0) {  
				while($row = mysqli_fetch_assoc($resultado)) {  
					$data[] = $row;
				} 
				echo $json_info = json_encode($data);
			}else{
				echo "hubo un problema los registros no fueron consultados ";
			}

		}else{
			echo "error con la conexion a la base";
		}
	}
}
?>
