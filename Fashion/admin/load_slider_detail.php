<?php
if (isset($_GET["id"])){
include_once("models/m_sliders.php");
$m_slider = new M_sliders();
$slider_id = $_GET["id"];
$slider_detail = $m_slider->get_slider_id($slider_id);
if ($slider_detail){
?>
<div class="row">
	<div class="col-lg-6">
		<label>Tiêu đề:</label> <span class="text-danger"><?php echo $slider_detail->slider_name;?></span>
	</div>
	<div class="col-lg-6">
		<label>Ngày tạo:</label> <?php echo date("H:i:s d-m-Y",strtotime($slider_detail->slider_modify));?>
	</div>
	<div class="col-lg-6">
		<label>Hình đại diện tin tức:</label> 
		<div class="row">
			<div class="col-xs-3 col-lg-2 col-md-3 col-sm-3">
				<img src="../public/_thumbs/Images/sliders/<?php echo $slider_detail->slider_img;?>">
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<label>Mô tả về tin tức</label>
		<div class="">
			<?php echo $slider_detail->slider_desc;?>
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