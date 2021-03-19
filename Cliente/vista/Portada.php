<html>
  <head>
      <title>Prueba</title>
  </head>
  <body>
    <h2>oli mundito</h2>

    <!--
    Para evitar mensajes de warning, es necesario ejecutar los siguientes comandos en la BBDD:

    <section>
      <br />
      SELECT @@GLOBAL.sql_mode global, @@SESSION.sql_mode session;
      SET sql_mode = '';
      SET GLOBAL sql_mode = '';
    </section>
  -->

    <?php


    /*
      usamos SausageHTTP
      una pequeña libreria php que nos permitira consumis servicios RESTful
    */
    require 'SausageHTTP.php';

//-----------------------------------------------------------------------------------------------------------//
    // INSERT
    /*
      llamando la creacion de un nuevo registro
    */
    $client = new SausageHTTP\SausageHTTP\SausageHTTP();
    $client->setRequest([
    		"URL" => 'http://localhost:8000/controladores/Item.php',
    		"METHOD" => 'GET',
    		"OPTIONS" => array(
    			'action' => 'create',
          'title' => 'rocio4',
          'category_id' => 2,
          'price' => 1200,
          'symbol' => 'A',
          'currency_id' => 1,
          'country_id' => 1
    		)
    	]);

//-----------------------------------------------------------------------------------------------------------//
      // UPDATE
      /*
        llamando a la actualizacion del registro por id y title
      */
      /*
      require 'SausageHTTP.php';

      $client = new SausageHTTP\SausageHTTP\SausageHTTP();
      $client->setRequest([
      		"URL" => 'http://localhost:8000/controladores/Items.php',
      		"METHOD" => 'GET',
      		"OPTIONS" => array(
      			'action' => 'update',
            'id' => '8',
            'title' => 'rocio',
            'title_new' => 'Rocio',
            'price_new' => 350
      		)
      	]);
        */

//-----------------------------------------------------------------------------------------------------------//
        // LEER
        /*
          Lee un registro dado un title
        */
        /*
        require 'SausageHTTP.php';

        $client = new SausageHTTP\SausageHTTP\SausageHTTP();
        $client->setRequest([
        		"URL" => 'http://localhost:8000/controladores/Item.php',
        		"METHOD" => 'GET',
        		"OPTIONS" => array(
        			'action' => 'read',
              'title' => 'marco'
        		)
        	]);
          */

//-----------------------------------------------------------------------------------------------------------//
          // Eliminar
          /*
            Eliminamos un registro dado el id y el title
          */
          /*
          require 'SausageHTTP.php';

          $client = new SausageHTTP\SausageHTTP\SausageHTTP();
          $client->setRequest([
          		"URL" => 'http://localhost:8000/controladores/Items.php',
          		"METHOD" => 'GET',
          		"OPTIONS" => array(
          			'action' => 'delete',
                'id' => '5',
                'title' => 'marco'
          		)
          	]);
            */
    echo $client->response;

     ?>

  </body>
</html>
