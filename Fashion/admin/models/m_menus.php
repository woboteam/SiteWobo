<?php
include_once("database.php");
/**
* menu (menu_id, menu_name, menu_parent, memu_slug, menu_order, menu_status)
*/
class M_menu extends database{
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
	public function check_insert($menu_slug){
		$query = "SELECT * FROM menu WHERE menu_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($menu_slug));
	}
	public function update_menus($menu_id, $menu_name, $menu_slug, $menu_parent, $menu_order){
		$query = "UPDATE menu SET menu_name=?, menu_slug=?, menu_parent=?, menu_order=? WHERE menu_id=?";
		$this->setQuery($query);
		return $this->execute(array($menu_name, $menu_slug, $menu_parent, $menu_order, $menu_id));
	}
	public function insert_menus($menu_name, $menu_slug, $menu_parent, $menu_order){
		$query = "INSERT INTO menu(menu_id, menu_name, menu_slug, menu_parent, menu_order) VALUES(NULL,?,?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($menu_name, $menu_slug, $menu_parent, $menu_order));
	}
	
	// Xóa menu
	public function delete_menus($menu_id){
		$query = "DELETE FROM menu WHERE menu_id=?";
		$this->setQuery($query);
		return $this->execute(array($menu_id));
	}
}