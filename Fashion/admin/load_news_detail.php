<?php
if (isset($_GET["id"])){
include_once("models/m_news.php");
$m_news = new M_news();
$new_id = $_GET["id"];
$new_detail = $m_news->get_new_id($new_id);
if ($new_detail){
?>
<div class="row">
	<div class="col-lg-6">
		<label>Mã tin tức:</label> <?php echo $new_detail->new_id;?>
	</div>
	<div class="col-lg-6">
		<label>Ngày tạo:</label> <?php echo date("H:i:s d-m-Y",strtotime($new_detail->new_create));?>
	</div>
	<div class="col-lg-6">
		<label>Tiêu đề:</label> <span class="text-danger"><?php echo $new_detail->new_title;?></span>
	</div>
	<div class="col-lg-6">
		<label>Ngày sửa:</label> <?php echo date("H:i:s d-m-Y", strtotime($new_detail->new_modify));?>
	</div>
	<div class="col-lg-6">
		<label>Chuyên mục:</label> <?php echo $new_detail->cate_id;?>
	</div>
	<div class="col-lg-12">
		<label>Hình đại diện tin tức:</label> 
		<div class="row">
			<div class="col-xs-3 col-lg-2 col-md-3 col-sm-3">
				<img src="../public/_thumbs/Images/news/<?php echo $new_detail->new_img;?>">
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<label>Mô tả về tin tức</label>
		<div class="">
			<?php echo $new_detail->new_desc;?>
		</div>
	</div>
	<div class="col-lg-12">
		<label>Nội dung bài viết</label>
		<div class="detail_info_product">
			<?php echo $new_detail->new_detail;?>
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