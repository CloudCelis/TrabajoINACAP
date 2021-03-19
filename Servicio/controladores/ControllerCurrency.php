<?php
require_once '../autoload.php';
include '../model/Currency.php';

class ControllerCurrency{

	public static function Create($shortname, $longname){
		$u = Currency::create(array(
			'shortname' => "$shortname",
			'longname' => "$longname"
		));
		return null;
	}

	public static function Read($ID){
		$u = Currency::find_all_by_ID($ID);
		$res = array();
		foreach ($u as $d) $res[] = $d->to_json();
		return is_null($u) ? null : $res;
	}

	public static function Update($shortname, $shortname_new, $ID){
		$check = Currency::find_by_shortname_and_ID("$shortname", $ID);
		if(is_null($check)) return false;
		$check->shortname = $shortname_new;
		$check->save();
		return true;
	}

	public static function Delete($shortname, $ID){
		$u = Currency::find_by_shortname_and_ID($shortname, $ID);
		if(is_null($u)) return false;
		$u->delete();
		return true;
	}
}

?>
