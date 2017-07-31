<ul class="nav navbar-nav custom_nav">
<?php 
foreach ($cate_cap_0 as $val_cate_cap_0) {
$cate_cap_1 = $m_cate->get_cate_parent($val_cate_cap_0->cate_id); 
if ($val_cate_cap_0->cate_id==11)
{
?>
<li><a href="<?php echo $pathweb?>trang-chu"><?php echo $val_cate_cap_0->cate_name; ?></a></li> 
<?php } 
else if($val_cate_cap_0->cate_id==36)
{
?>
<li><a href="<?php echo $pathweb?>lien-he"><?php echo $val_cate_cap_0->cate_name; ?></a></li> 
<?php } 
else if($val_cate_cap_0->cate_id==35)
{
?>
<li><a href="<?php echo $pathweb?>gioi-thieu"><?php echo $val_cate_cap_0->cate_name; ?></a></li> 
<?php } 
else if ( $val_cate_cap_0->cate_id==28) { 
?>
<li><a <?php echo 'href="'. $pathweb.'thoi-trang/'.$val_cate_cap_0->cate_slug.'"' ;?>><?php echo $val_cate_cap_0->cate_name; ?></a></li>
<?php } 
else { ?>
<li class="dropdown"> <a <?php echo 'href="'. $pathweb.'thoi-trang/'.$val_cate_cap_0->cate_slug.'"' ;?> class=""><?php echo $val_cate_cap_0->cate_name; ?></a>
	<ul class="dropdown-menu" role="menu">
	<?php foreach ($cate_cap_1 as $val_cate_cap_1) {
	?>
	<li><a <?php echo 'href="'. $pathweb.'thoitrang/'.$val_cate_cap_1->cate_slug.'"' ;?>><?php echo $val_cate_cap_1->cate_name; ?></a></li> 
	<?php } ?>
	</ul>
</li> 
<?php } ?>
<?php } ?>
</ul>

