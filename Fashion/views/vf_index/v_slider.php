  
    <div class="slick_slider">
    <?php 
      $slider = $m_slider->get_all_slider();
      foreach ($slider as $val_slider){
    ?>
      <div class="single_iteam"><img src="public/sliders/<?php echo $val_slider->slider_img;?>" alt="">
        <h2><a class="slider_tittle" href="#"><?php echo $val_slider->slider_name;?></a></h2>
      </div>  
    <?php } ?>
    </div>
 

