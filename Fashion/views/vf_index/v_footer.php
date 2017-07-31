</div>
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Nổi bật</h2>
            <?php 
              foreach ($list_pro_random as $val_pro_random) {
            ?>
            <ul class="flicker_nav">
              <li><a href="#"><img src="<?php echo $pathweb;?>public/products/<?php echo $val_pro_random->pro_img;?>" alt=""></a></li>              
            </ul>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <?php
              include_once("v_middle_footer.php")
          ?>                    
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>Về chúng tôi</h2>
            <p><?php echo $m_page->get_pages_by_id(2)->pages_content; ?> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2045 <a href="index.html">fashionExpress</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed By WOBO</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>