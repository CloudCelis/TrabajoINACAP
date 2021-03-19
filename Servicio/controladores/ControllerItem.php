<?php
require_once '../autoload.php';
include '../model/Item.php';

class ControllerItem{
/*
	Crea un nuevo registro
*/
	public static function Create($title, $category_id, $price, $symbol, $currency_id, $country_id)
  {
    $timestamp = date("Y-m-d H:i:s");
    //$timestamp = '2021-03-18 12:43:38';
		$u = Item::create(array(
			'title' => "$title",
			'category_id' => "$category_id",
      'price' => "$price",
      'symbol' => "$symbol",
      'currency_id' => "$currency_id",
      'country_id' => "$country_id",
      'created_at' => "$timestamp",
      'modified_at' => "NULL"
		));

		return $u;
	}


	/*
		Funcion Read
		Permile leer un registro dado un title
		No usamos el ID dado que el usuario no conoce el id de todos los registros
		solo del que acaba de crear
		Para cambiar esto solo debemos modificar 'title' por 'id' dentro de la funcion
	*/
	public static function Read($title)
	{

		$join = 'LEFT JOIN currency cu ON (cu.id = item.currency_id) LEFT JOIN country co ON (co.ID = item.country_id)';

		$sel = 'item.title, item.price, cu.shortname AS currency, co.shortname AS country';

		$item = Item::all(array('joins' => $join, 'select'=>$sel));
		$res1 = array();
		foreach ($item as $d) $res1[] = $d->to_json();
		return is_null($item) ? null : $res1;

		//foreach ($item as $b) {
    //	echo "Item: $b->title | currency: $b->shortname" . "<br />\n";
		//}

		/*
		$u = Item::find_all_by_title($title);
		$res = array();
		foreach ($u as $d) $res[] = $d->to_json();
		*/

		return is_null($u) ? null : $res1;
	}

	/*
		Funcion UPDATE
		Actualiza un registro dado un title y un id
		Al actualizar tomara la fecha y hora del sistema (lo que no deberia ser, ya que este validator
		deberia actualizarse tomando la hora del servidor o mejor aun usando un trigger sobre la tabla) y
		actualizara el campo 'modified_at' de la tabla
	*/
	public static function Update($id,$title,$title_new,$price_new){
		$check = Item::find_by_title_and_id("$title", $id);
		if(is_null($check)) return false;

		$timestamp = date("Y-m-d H:i:s");

		$check->title = $title_new;
		$check->price = $price_new;
		$check->modified_at = $timestamp;
		$check->save();
		return true;
	}

	/*
		Elimina un registro dado un id y un title
		Siempre es recomendable que el borrado sea logico y no fisico, pero en la tabla
		no existe una columna 'estado' o algo parecido
	*/
	public static function Delete($id,$title){
		$u = Item::find_by_id_and_title($id,$title);
		if(is_null($u)) return false;
		$u->delete();
		return true;
	}
}

?>
