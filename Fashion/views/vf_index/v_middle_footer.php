<div class="single_footer_top wow fadeInDown">
  <h2>Tags</h2>
  <ul class="labels_nav">
  <?php 
    foreach ($cate_cap_0 as $val_cate_cap_0) {  
    if ($val_cate_cap_0->cate_id==11 or $val_cate_cap_0->cate_id==29 or $val_cate_cap_0->cate_id==12 or $val_cate_cap_0->cate_id==28 ) 
    {
  ?>  
    <li><a href="<?php echo $pathweb.$val_cate_cap_0->cate_slug; ?>"><?php echo $val_cate_cap_0->cate_name; ?></a></li>
   <?php }
   else 
   	{
   	?>
   	 <li><a <?php echo 'href="'. $pathweb.'thoi-trang/'.$val_cate_cap_0->cate_slug.'"' ;?>><?php echo $val_cate_cap_0->cate_name; ?></a></li>
    <?php } } ?>
  </ul>
</div>