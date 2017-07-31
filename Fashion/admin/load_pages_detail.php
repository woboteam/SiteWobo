<?php
if (isset($_GET["id"])){
include_once("models/m_pages.php");
$m_pages = new M_pages();
$pages_id = $_GET["id"];
$pages_detail = $m_pages->get_page_id($pages_id);
if ($pages_detail){
?>
<div class="row">
	<div class="col-lg-6">
		<label>Mã tin tức:</label> <?php echo $pages_detail->pages_id;?>
	</div>
	<div class="col-lg-6">
		<label>Ngày tạo:</label> <?php echo date("H:i:s d-m-Y",strtotime($pages_detail->pages_create));?>
	</div>
	<div class="col-lg-6">
		<label>Tiêu đề:</label> <span class="text-danger"><?php echo $pages_detail->pages_name;?></span>
	</div>
	<div class="col-lg-6">
		<label>Ngày sửa:</label> <?php echo date("H:i:s d-m-Y", strtotime($pages_detail->pages_modify));?>
	</div>
	<div class="col-lg-6">
		<label>Đường dẫn:</label> <span class="text-danger"><?php echo $pages_detail->pages_slug;?></span>
	</div>
	<div class="col-lg-12">
		<label>Nội dung bài viết</label>
		<div class="detail_info_product">
			<?php echo $pages_detail->pages_content;?>
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