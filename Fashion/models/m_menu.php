<?php
include_once("database.php");
/**
* Menu (menu): 
*/
class M_menu extends database
{
	public function get_all_menu(){
		$query = "SELECT * FROM menu WHERE menu_status=0";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_menu_id($menu_id){
		$query = "SELECT * FROM menu WHERE menu_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($menu_id));
	}
	// Lấy menu theo menu_parent
	public function get_menu_parent($menu_parent){
		$query = "SELECT * FROM menu WHERE menu_parent=? ORDER BY menu_order";
		$this->setQuery($query);
		return $this->loadAllRows(array($menu_parent));
	}
}