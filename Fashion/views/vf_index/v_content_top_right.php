<div class="content_top_right">
  <ul class="featured_nav wow fadeInDown">
  <?php 
    $slider = $m_slider->get_all_slider();
    foreach ($slider as $val_slider){
  ?>
    <li><img src="public/_thumbs/Images/sliders/<?php echo $val_slider->slider_img;?>" alt="">
      <div class="title_caption"><a href="#"><?php echo $val_slider->slider_name;?></a></div>
    </li>
  <?php } ?>
  </ul>
</div>