<?php
if (isset($_GET["id"])){
include_once("models/m_products.php");
include_once("models/m_photos.php");
$m_products = new M_product();
$pro_id = $_GET["id"];
$product_detail = $m_products->get_pro_id($pro_id);
if ($product_detail){
?>
<div class="row">
	<div class="col-lg-6">
		<label>Mã sản phẩm:</label> <?php echo $product_detail->pro_id;?>
	</div>
	<div class="col-lg-6">
		<label>Ngày tạo:</label> <?php echo date("H:i:s d-m-Y",strtotime($product_detail->pro_create));?>
	</div>
	<div class="col-lg-6">
		<label>Tên sản phẩm:</label> <span class="text-danger"><?php echo $product_detail->pro_name;?></span>
	</div>
	<div class="col-lg-6">
		<label>Ngày sửa:</label> <?php echo date("H:i:s d-m-Y", strtotime($product_detail->pro_modify));?>
	</div>
	<div class="col-lg-6">
		<label>Đơn giá:</label> <?php echo $product_detail->pro_price;?>
	</div>
	<div class="col-lg-12">
		<label>Hình sản phẩm:</label> 
		<div class="row">
			<div class="col-xs-3 col-lg-2 col-md-3 col-sm-3">
				<img src="../public/_thumbs/Images/products/<?php echo $product_detail->pro_img;?>">
			</div>
		</div>
	</div>
	<div class="col-lg-12 detail_image">
		<label>Hình ảnh chi tiết sản phẩm:</label>
		<div class="row">
		<?php
		$m_photos = new M_photo();
		$album = $m_photos->list_photo($product_detail->photo_id);
		foreach ($album as $val_album) {
		?>
		<div class="col-xs-3 col-lg-2 col-md-3 col-sm-3">
			<img src="../public/_thumbs/Images/products/<?php echo $val_album->photo_name;?>">
		</div>
		<?php
		}
		?>
		</div>
	</div>

	<div class="col-lg-12">
		<label>Mô tả về sản phẩm</label>
		<div class="">
			<?php echo $product_detail->pro_desc;?>
		</div>
	</div>
	<div class="col-lg-12">
		<label>Chi tiết sản phẩm</label>
		<div class="detail_info_product">
			<?php echo $product_detail->pro_detail;?>
		</div>
	</div>
	<div class="col-lg-12">
		<label>Thông số chi tiết</label>
		<div class="detail_info_product">
			<?php echo $product_detail->pro_spec;?>
		</div>
	</div>
</div>
<?php
	} else {
		?>
		<div class="row">Không có dữ liệu</div>
		<?php
	}
}
?>