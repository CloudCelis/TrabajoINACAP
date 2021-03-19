<?php
	//print_r($_GET);
	require 'ControllerItem.php';
	$crud = isset($_GET['action']) ? $_GET['action'] : 'empty';
	switch ($crud) {
		case 'create':
			if (isset($_GET['title']) && isset($_GET['category_id']) && isset($_GET['price'])
          && isset($_GET['symbol']) && isset($_GET['currency_id']) && isset($_GET['country_id']))
      {
				$res = ControllerItem::Create($_GET['title'],$_GET['category_id'],$_GET['price']
                                      ,$_GET['symbol'],$_GET['currency_id'],$_GET['country_id']);
				echo json_encode(array(
					'status' => '0',
					'msg' => 'Item creado satisfactoriamente.'.$res
				));
			}else{
				echo json_encode(array(
					'status' => '1',
					'msg' => 'Debe especificar todos los parámetros.'
				));
			}
			break;
		case 'read':
			if (isset($_GET['title'])) {
				$res = ControllerItem::Read($_GET['title']);
				//print_r($res);
				if($res) echo json_encode($res);

					/*array(
					'status' => '0',
					'msg' => 'OK',
					'res' =>  json_encode($res)
				));*/
				else echo json_encode(array(
					'status' => '1',
					'msg' => 'No se encuentra el item con ese nombre.'
				));
			}else{
				echo json_encode(array(
					'status' => '1',
					'msg' => 'Debe especificar todos los parámetros.'
				));
			}
			break;
		case 'update':
			if (isset($_GET['id']) && isset($_GET['title']) && isset($_GET['title_new']) && isset($_GET['price_new'])) {
				$res = ControllerItem::Update($_GET['id'],$_GET['title'],$_GET['title_new'],$_GET['price_new']);
				//print_r($res);
				if($res) echo json_encode(array(
					'status' => '0',
					'msg' => 'Item actualizado correctamente.'
				));
				else echo json_encode(array(
					'status' => '1',
					'msg' => 'No se encuentra el item a modificar.'
				));
			}else{
				echo json_encode(array(
					'status' => '1',
					'msg' => 'Debe especificar todos los parámetros.'
				));
			}
			break;
		case 'delete':
			if (isset($_GET['id']) && isset($_GET['title'])) {
				$res = ControllerItem::Delete($_GET['id'],$_GET['title']);
				//print_r($res);
				if($res) echo json_encode(array(
					'status' => '0',
					'msg' => 'Item eliminado satisfactoriamente'
				));
				else echo json_encode(array(
					'status' => '1',
					'msg' => 'No se encuentra el item con ese nombre.'
				));
			}else{
				echo json_encode(array(
					'status' => '1',
					'msg' => 'Debe especificar todos los parámetros.'
				));
			}
			break;
		default:
			echo json_encode(array(
				'status' => '1',
				'msg' => 'Debe especificar una opcion valida.'
			));
			break;
	}
?>
