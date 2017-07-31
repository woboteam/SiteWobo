<?php
include_once("database.php");
class M_ordercar extends database{
	public function get_all_order(){
		$query = "SELECT * FROM ordercar ORDER BY order_date DESC";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	// Đánh dấu show/hide sản phẩm
	public function set_order_status($order_id, $order_status){
		$query = "UPDATE ordercar SET order_status=? WHERE order_id=?";
		$this->setQuery($query);
		return $this->execute(array($order_status, $order_id));
	}
	public function get_order_id($order_id){
		$query = "SELECT * FROM ordercar WHERE order_id = ?";
		$this->setQuery($query);
		return $this->loadRow(array($order_id));
	}
	public function get_order_detail($order_id){
		$query = "SELECT * FROM orderdetail INNER JOIN products ON orderdetail.pro_id = products.pro_id INNER JOIN categories ON categories.cate_id = orderdetail.cate_id WHERE orderdetail.order_id=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($order_id));
	}
	public function delete_order($order_id){
		$query = "DELETE FROM ordercar WHERE order_id=?";
		$this->setQuery($query);
		return $this->execute(array($order_id));
	}
	public function delete_order_detail($order_id){
		$query = "DELETE FROM orderdetail WHERE order_id=?";
		$this->setQuery($query);
		return $this->execute(array($order_id));
	}
}