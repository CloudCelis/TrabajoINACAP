<?php
// Importamos nuestra librería poniendo la ruta del ActiveRecord.php
require_once 'ActiveRecord.php';

// Configuramos nuestra conexión a la base de datos:
// Usuario = root
// Password = programeet
// Servidor = localhost
// Nombre de la base de datos = programeet_ejemplo_web_service
ActiveRecord\Config::initialize(function($cfg){
  $cfg->set_model_directory('../model');
  $cfg->set_connections(array(
	'development' =>
	'mysql://root:@localhost/ptdev'));
});


?>
