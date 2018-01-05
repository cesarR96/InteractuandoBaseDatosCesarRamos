<?php
     session_start();


     
     if(isset($_SESSION['sesion'])){
     	//destruye la variable de sesion
        session_destroy();
        echo "session finalizada";
     }

 ?>
