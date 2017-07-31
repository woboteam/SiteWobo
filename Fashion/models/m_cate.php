<?php
include_once("database.php");
/**
* 
*/
class M_cate extends database
{
	public function get_all_cate(){
		$query = "SELECT * FROM categories WHERE cate_status=0";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_cate_id($cate_id){
		$query = "SELECT * FROM categories WHERE cate_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($cate_id));
	}
	// Lấy cate theo cate_parent
	public function get_cate_parent($cate_parent){
		$query = "SELECT * FROM categories WHERE cate_status=0 AND cate_parent=? ORDER BY cate_order";
		$this->setQuery($query);
		return $this->loadAllRows(array($cate_parent));
	}
	public function get_cate_parent_not_cate_id($cate_parent,$cate_id){
		$query = "SELECT * FROM categories WHERE cate_status=0 AND cate_parent=? AND cate_id NOT IN (".$cate_id.") ORDER BY cate_order";
		$this->setQuery($query);
		return $this->loadAllRows(array($cate_parent));
	}
	public function get_cate_slug($cate_slug){
		$query = "SELECT * FROM categories WHERE cate_slug=?";
		$this->setQuery($query);
		return $this->loadRow(array($cate_slug));
	}
}