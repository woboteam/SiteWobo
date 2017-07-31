<?php
if (isset($_GET["id"])){
include_once("models/m_contact.php");
$m_contact = new M_contact();
$contact_id = $_GET["id"];
$contact_current = $m_contact->get_contact_id($contact_id);
if ($contact_current){
?>
<div class="row">
	<div class="col-lg-6">
		<label>Mã tin tức:</label> <?php echo $contact_current->contact_id;?>
	</div>
	<div class="col-lg-6">
		<label>Ngày tạo:</label> <?php echo date("H:i:s d-m-Y",strtotime($contact_current->contact_create));?>
	</div>
	<div class="col-lg-6">
		<label>Họ và tên:</label> <span class="text-danger"><?php echo $contact_current->contact_name;?></span>
	</div>
	<div class="col-lg-6">
		<label>Trạng thái:</label> <?php if($contact_current->contact_status==1){ echo "Đã xem";} else { echo "Chưa xem";}?>
	</div>
	<div class="col-lg-6">
		<label>Email:</label> <?php echo $contact_current->contact_email;?>
	</div>
	<div class="col-lg-12">
		<label>Chủ đề:</label> <?php echo $contact_current->contact_subject;?>
	</div>
	<div class="col-lg-12">
		<label>Nội dung</label>
		<div class="">
			<?php echo $contact_current->contact_content;?>
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