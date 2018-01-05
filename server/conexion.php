<?php


Class ConectorDB
{

	private $host = 'localhost';
	private $user = 'next';
	private $password = '123';
	private $dbname = 'examenbasedatos';
	private $conexion;

	function initConexion(){
		$this->conexion = new mysqli($this->host, $this->user, $this->password,$this->dbname);
   //validacion en caso que la conexion no es correcta
		if($this->conexion->connect_errno){
			echo "Error: ".$this->conexion->connect_error;
		}else{
			return "ok";
		}
   }//fin funciones init



   //EJECUTA LAS QUERYS mediante el metodo query
   function ejecutarQuery($query){
   	return $this->conexion->query($query);
   }

   function cerrarConexion(){
   	return $this->conexion->close();
   }

  // metodo de agregar insert into en una base
   function insertData($tabla, $data){
  //declaro variable la cual sera la de peticion query
   	$sql = 'INSERT INTO '.$tabla.'(';
  //varible que empezara con el contador de foreach
   	$i = 1;
  //recorrera dependiendo de los parametros ingresados
   	foreach ($data as $key => $value) {
  	# code...
  	 //en la variable agregamos el nombre del campo
   	
   			$sql .= $key;
   		
  	 //si $i es menor que los datos
   		if($i<count($data)){
   			$sql .= ', ';
   		}else $sql .= ')';
   		$i++;
   }//fin each
   
   $sql .= ' VALUES (' ;
   $i=1;
   //ahora se agregan los valores
   foreach ($data as $key => $value) {
  	# code...
  			 // se agregar los valores a la variable
  			//se encriptan las contraseñas
      $sql .= "'".$value."'";
   		
  	
  	 //si $i es menor que los datos
   	if($i<count($data)){
   		$sql .= ',';
   	}else $sql .= ')';
   	$i++;
   }//fin each

   return $this->ejecutarQuery($sql);

  }//fin fuction

  function actualizarRegistro($tabla, $data, $condicion){
     $sql = 'UPDATE '.$tabla.' SET ';
     $i = 1;
     foreach ($data as $key => $value) {
     	# code...
     	$sql .= $key.' = '.$value;
     	if ($i<sizeof($data)){
           $sql .= ',';
     	}else $sql .= ' WHERE '.$condicion.';';//end if
     	$i++;
     }//end for
     return $this->ejecutarQuery($sql);
     
  }//end function

  function eliminarRegistro($tabla, $condicion){
  	$sql = "DELETE FROM ".$tabla." WHERE ".$condicion.";";

  	return $this->ejecutarQuery($sql);
  }//END FUNCTION

  function consultar3($tablas, $campos, $condicion = ""){

    $sql = "SELECT  ";
    $i = 1;
    foreach ($campos as $key => $value) {
      # code...
      $sql .= $value;
      if ($i < count($campos)) {
        # code...
        $sql .= ", ";
      }else $sql .= " FROM ";
      $i++;
    }

    //tablas
    
    $i = 1;
    foreach ($tablas as $key => $value) {
      # code...
      $sql .= $value;
      if ($i < count($tablas)) {
        # code...
        $sql .= ", ";
      }else $sql .= "  ";
      $i++;
    }

    //condicon
    if ($condicion == "") {
      # code...
      $sql .= ";";
    }else{ 
      $sql .= $condicion.";";
    }

    return $this->ejecutarQuery($sql);

  }//fin funcion





  function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
  }

  function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
  }

}//FIN CLASS

?>
