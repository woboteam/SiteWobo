<?php
include_once("database.php");
class M_product extends database{
	// pro_id, pro_name, pro_slug, pro_year, pro_color, pro_kind, pro_desc, pro_detail, pro_spec, pro_price, pro_typerend, pro_img, photo_id, cate_id, pro_create, pro_modify, pro_view, pro_status

	public function insert_product($pro_name, $pro_slug, $pro_year, $pro_color, $pro_kind, $pro_desc, $pro_detail, $pro_spec, $pro_price, $pro_typerend, $pro_img, $photo_id, $cate_id, $pro_status){
		$query = "INSERT INTO products(pro_id, pro_name, pro_slug, pro_year, pro_color, pro_kind, pro_desc, pro_detail, pro_spec, pro_price, pro_typerend, pro_img, photo_id, cate_id, pro_create, pro_modify, pro_status) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?)";
		$this->setQuery($query);
		return $this->execute(array($pro_name, $pro_slug, $pro_year, $pro_color, $pro_kind, $pro_desc, $pro_detail, $pro_spec, $pro_price, $pro_typerend, $pro_img, $photo_id, $cate_id, $pro_status));
	}
	public function update_product($pro_id, $pro_name, $pro_slug, $pro_year, $pro_color, $pro_kind, $pro_desc, $pro_detail, $pro_spec, $pro_price, $pro_typerend, $pro_img, $cate_id){
		$query = "UPDATE products SET pro_name=?, pro_slug=?, pro_year=?, pro_color=?, pro_kind=?, pro_desc=?, pro_detail=?, pro_spec=?, pro_price=?, pro_typerend=?, pro_img=?, cate_id=?, pro_modify=NOW() WHERE pro_id=?";
		$this->setQuery($query);
		return $this->execute(array($pro_name, $pro_slug, $pro_year, $pro_color, $pro_kind, $pro_desc, $pro_detail, $pro_spec, $pro_price, $pro_typerend, $pro_img, $cate_id, $pro_id));
	}
	public function check_insert($pro_name, $pro_slug){
		$query = "SELECT * FROM products WHERE pro_name=? OR pro_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($pro_name, $pro_slug));
	}
	public function get_all_product(){
		$query = "SELECT * FROM products ORDER BY pro_create DESC";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	// Lấy sản phẩm theo product_id
	public function get_pro_id($pro_id){
		$query = "SELECT * FROM products WHERE pro_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($pro_id));
	}
	// Xóa sản phẩm theo pro_id
	public function delete_product($pro_id){
		$query = "DELETE FROM products WHERE pro_id=?";
		$this->setQuery($query);
		return $this->execute(array($pro_id));
	}
	// Đánh dấu show/hide sản phẩm
	public function set_product_status($pro_id, $pro_status){
		$query = "UPDATE products SET pro_status=? WHERE pro_id=?";
		$this->setQuery($query);
		return $this->execute(array($pro_status, $pro_id));
	}
	// Đánh dấu show/hide sản phẩm đã chọn
	public function set_product_array_status_hide($str_pro_id, $pro_status){
		$query = "UPDATE products SET pro_status=? WHERE pro_id in (". $str_pro_id . ")";
		$this->setQuery($query);
		return $this->execute(array($pro_status));
	}
	// Lấy sản phẩm theo array product_id
	public function get_product_array_id($str_pro_id){
		$query = "SELECT * FROM products WHERE pro_id in (" . $str_pro_id . ")";
		$this->setQuery($query);
		return $this->loadAllRows();
	}






	// Lấy tất cả các sản phẩm đã đã hẹn ngày/giờ đăng
	public function get_all_times_product(){
		$query = "SELECT * FROM tbl_product WHERE product_delete=0 AND product_date_post>NOW() ORDER BY product_date_modify DESC";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	// SET ngày đăng sản phẩm
	public function set_product_date_post($product_id, $product_date_post){
		$query = "UPDATE tbl_product SET product_date_post=? WHERE product_id=?";
		$this->setQuery($query);
		return $this->execute(array($product_date_post, $product_id));
	}
	// SET ngày đăng sản phẩm một danh sách product_id
	public function set_list_product_date_post($str_product_id, $product_date_post){
		$query = "UPDATE tbl_product SET product_date_post=? WHERE product_id in(".$str_product_id.")";
		$this->setQuery($query);
		return $this->execute(array($product_date_post));
	}

	// Thêm sản phẩm
	public function add_product($product_code, $product_name, $product_price, $product_image, $images_album, $product_date_post, $product_description, $product_details, $categories_id){
		$query = "INSERT INTO tbl_product(product_id, product_code, product_name, product_price, product_image, images_album, product_date_create, product_date_post, product_date_modify, product_description, product_details, categories_id) VALUES (NULL,?,?,?,?,?,NOW(),?,NOW(),?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($product_code, $product_name, $product_price, $product_image, $images_album, $product_date_post, $product_description, $product_details, $categories_id));
	}
	// Cập nhật thông tin sản phẩm
	public function set_product($product_id, $product_code, $product_name, $product_price, $product_image, $product_date_post, $product_description, $product_details, $categories_id){
		$query = "UPDATE tbl_product SET product_code=?, product_name=?, product_price=?, product_image=?, product_date_post=?, product_date_modify = NOW(), product_description=?, product_details=?, categories_id=? WHERE product_id=?";
		$this->setQuery($query);
		return $this->execute(array($product_code, $product_name, $product_price, $product_image, $product_date_post, $product_description, $product_details,$categories_id, $product_id));
	}

	
	// Đánh dấu xóa/phục hồi sản phẩm
	public function set_product_status_delete($product_id, $product_delete){
		$query = "UPDATE tbl_product SET product_delete=? WHERE product_id=?";
		$this->setQuery($query);
		return $this->execute(array($product_delete, $product_id));
	}
	// Đánh dấu xóa/phục hồi sản phẩm được chọn
	public function set_array_product_status_delete($str_product_id, $product_delete){
		$query = "UPDATE tbl_product SET product_delete=? WHERE product_id in (".$str_product_id.")";
		$this->setQuery($query);
		return $this->execute(array($product_delete));
	}
	// Xóa sản phẩm được chọn
	public function delete_array_product($str_product_id){
		$query = "DELETE FROM tbl_product WHERE product_id in (" . $str_product_id . ")";
		$this->setQuery($query);
		return $this->execute();
	}
	// Kiểm tra mã hàng hoặc tên hàng đã có chưa
	public function exist_product_code_name($product_code, $product_name){
		$query = "SELECT * FROM tbl_product WHERE product_code=? OR product_name=?";
		$this->setQuery($query);
		return $this->loadRow(array($product_code, $product_name));
	}
	// Kiểm tra mã hàng hoặc tên hàng đã có chưa
	public function exist_product_code($product_code){
		$query = "SELECT * FROM tbl_product WHERE product_code=?";
		$this->setQuery($query);
		return $this->loadRow(array($product_code));
	}
	//  Kiểm tra tên hàng đã có chưa
	public function exist_product_name($product_name){
		$query = "SELECT * FROM tbl_product WHERE product_name=?";
		$this->setQuery($query);
		return $this->loadRow(array($product_name));
	}
	public function get_product_code($product_code){
		$query = "SELECT * FROM tbl_product WHERE product_code=?";
		$this->setQuery($query);
		return $this->loadRow(array($product_code));
	}
	public function top_views(){
		$query = "SELECT * FROM tbl_product ORDER BY product_views DESC LIMIT 5";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>