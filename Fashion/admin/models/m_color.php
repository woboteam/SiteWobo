<?php
include_once("database.php");
/**
* categories (cate_id, cate_name, cate_slug, cate_parent, cate_img, cate_order, cate_status)
*/
class M_color extends database{
	public function get_all_color(){
		$query = "SELECT * FROM color";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>