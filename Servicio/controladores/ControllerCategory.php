<?php
require_once '../autoload.php';
include '../model/Category.php';

class ControllerCategory{

	public static function Create($ID, $name){
		$u = Category::create(array(
			'nombre' => "$name"
		));
		return null;
	}

	public static function Read($name){
		$u = Category::find_by_name($name);
		return is_null($u) ? null : $u;
	}

	public static function Update($ID, $name){
		$u = Category::find_by_name($name);
		if(is_null($u)) return false;
		$u->name = $name;
		$u->save();
		return true;
	}

	public static function Delete($name){
		$u = Category::find_by_name($name);
		if(is_null($u)) return false;
		$u->delete();
		return true;
	}
}

?>
