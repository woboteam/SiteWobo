<?php
if (isset($_GET["id"])){
include_once("models/m_brand.php");
include_once("models/m_cates.php");
$m_brand = new M_brand();
$m_cates = new M_cates();
$brand_id = $_GET["id"];
$brand_detail = $m_brand->get_brand_id($brand_id);
if ($brand_detail){
	$cate_name = $m_cates->get_cate_id($brand_detail->cate_id)->cate_name;
?>
<div class="row">
	<div class="col-lg-6">
		<label>Mã hoạt động:</label> <?php echo $brand_detail->brand_id;?>
	</div>
	<div class="col-lg-6">
		<label>Ngày tạo:</label> <?php echo date("H:i:s d-m-Y",strtotime($brand_detail->brand_create));?>
	</div>
	<div class="col-lg-6">
		<label>Tiêu đề:</label> <span class="text-danger"><?php echo $brand_detail->event_name;?></span>
	</div>
	<div class="col-lg-6">
		<label>Ngày sửa:</label> <?php echo date("H:i:s d-m-Y", strtotime($brand_detail->brand_modify));?>
	</div>
	<div class="col-lg-6">
		<label>Đường dẫn:</label> <span class="text-danger"><?php echo $brand_detail->event_slug;?></span>
	</div>
	<div class="col-lg-6">
		<label>Ngày sự kiện xảy ra:</label> <?php echo date("d-m-Y", strtotime($brand_detail->event_create));?>
	</div>
	<div class="col-lg-6">
		<label>Chuyên mục:</label> <?php echo $cate_name;?>
	</div>
	<div class="col-lg-12">
		<label>Hình đại diện hoạt động:</label> 
		<div class="row">
			<div class="col-xs-3 col-lg-2 col-md-3 col-sm-3">
				<img src="../public/_thumbs/Images/events/<?php echo $brand_detail->brand_img;?>">
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<label>Mô tả về hoạt động</label>
		<div class="">
			<?php echo $brand_detail->brand_desc;?>
		</div>
	</div>
	<div class="col-lg-12">
		<label>Nội dung bài viết</label>
		<div class="detail_info_product">
			<?php echo $brand_detail->brand_detail;?>
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