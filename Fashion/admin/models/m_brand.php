<?php
include_once("database.php");
/**
* categories (cate_id, cate_name, cate_slug, cate_parent, cate_img, cate_order, cate_status)
*/
class M_brand extends database{
	public function get_all_brand(){
		$query = "SELECT * FROM brand WHERE brand_status=0 ORDER BY brand_slug ASC";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_brand_id($brand_id){
		$query = "SELECT * FROM brand WHERE brand_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($brand_id));
	}
	public function insert_brand($brand_name, $brand_slug){
		$query = "INSERT INTO brand(brand_id, brand_name, brand_slug) VALUES(NULL,?,?)";
		$this->setQuery($query);
		return $this->execute(array($brand_name, $brand_slug));
	}
	public function update_brand($brand_id, $brand_name, $brand_slug){
		$query = "UPDATE brand SET brand_name=?, brand_slug=? WHERE brand_id=?";
		$this->setQuery($query);
		return $this->execute(array($brand_name, $brand_slug, $brand_id));
	}
	public function check_insert($brand_name, $brand_slug){
		$query = "SELECT * FROM brand WHERE brand_name=? OR brand_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($brand_name, $brand_slug));
	}
	public function delete_brand($brand_id){
		$query = "DELETE FROM brand WHERE brand_id=?";
		$this->setQuery($query);
		return $this->execute(array($brand_id));
	}
	// Đánh dấu show/hide tin tức
	public function set_brand_status($brand_id, $brand_status){
		$query = "UPDATE brand SET brand_status=? WHERE brand_id=?";
		$this->setQuery($query);
		return $this->execute(array($brand_status, $brand_id));
	}
	// Đánh dấu show/hide tin tức đã chọn
	public function set_brand_array_status_hide($str_brand_id, $brand_status){
		$query = "UPDATE brand SET brand_status=? WHERE brand_id in (". $str_brand_id . ")";
		$this->setQuery($query);
		return $this->execute(array($brand_status));
	}
	// Lấy tin tức theo array brand_id
	public function get_brand_array_id($str_brand_id){
		$query = "SELECT * FROM brand WHERE brand_id in (" . $str_brand_id . ")";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>