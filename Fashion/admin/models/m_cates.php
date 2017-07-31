<?php
include_once("database.php");
/**
* categories (cate_id, cate_name, cate_slug, cate_parent, cate_img, cate_order, cate_status)
*/
class M_cates extends database{
	public function get_cate_id($cate_id){
		$query = "SELECT * FROM categories WHERE cate_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($cate_id));
	}
	// Lấy cate theo cate_parent
	public function get_cate_parent($cate_parent){
		$query = "SELECT * FROM categories WHERE cate_parent=? ORDER BY cate_order";
		$this->setQuery($query);
		return $this->loadAllRows(array($cate_parent));
	}
	public function check_insert($cate_slug){
		$query = "SELECT * FROM categories WHERE cate_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($cate_slug));
	}
	public function update_cates($cate_id, $cate_name, $cate_slug, $cate_parent, $cate_img, $cate_order){
		$query = "UPDATE categories SET cate_name=?, cate_slug=?, cate_parent=?, cate_img=?, cate_order=? WHERE cate_id=?";
		$this->setQuery($query);
		return $this->execute(array($cate_name, $cate_slug, $cate_parent, $cate_img, $cate_order, $cate_id));
	}
	public function insert_cates($cate_name, $cate_slug, $cate_parent, $cate_img, $cate_order, $cate_status){
		$query = "INSERT INTO categories(cate_id, cate_name, cate_slug, cate_parent, cate_img, cate_order, cate_status) VALUES(NULL,?,?,?,?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($cate_name, $cate_slug, $cate_parent, $cate_img, $cate_order, $cate_status));
	}
	// Kiểm tra xem chuyên mục đã có trong bảng products hay chưa?
	public function check_cate_product($cate_id){
		$query = "SELECT * FROM products WHERE cate_id=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($cate_id));
	}
	// Kiểm tra xem chuyên mục đã có trong bảng news hay chưa?
	public function check_cate_news($cate_id){
		$query = "SELECT * FROM news WHERE cate_id=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($cate_id));
	}
	// Xóa chuyên mục
	public function delete_cates($cate_id){
		$query = "DELETE FROM categories WHERE cate_id=?";
		$this->setQuery($query);
		return $this->execute(array($cate_id));
	}
}