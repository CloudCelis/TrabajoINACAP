<?php

class Item extends ActiveRecord\Model
{
	public static $table_name = 'item';
	public static $primary_key = 'id';

	//static $belongs_to = array(array('country'));
}

	//$join = "LEFT JOIN currency cu ON (cu.ID = item.currency_id)";

	//$item = Item::all(array('joins' => $join, 'country'));
	//$item = Item::all(array('joins' => array('currency', 'country')));
	//$join = "LEFT JOIN currency cu ON (cu.ID = item.currency_id) LEFT JOIN country co ON (co.ID = item.country_id)";



?>
