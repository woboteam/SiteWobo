<section id="mainContent">
  <div class="content_bottom">
    <div class="col-lg-8 col-md-8">
      <div class="content_bottom_left">
        <div class="single_page_area">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Technology</a></li>
            <li class="active">Duis quis erat non nunc fringilla </li>
          </ol>

          <h2 class="post_titile"><?php echo $pro_current->pro_name;?></h2>
         
          <div class="single_page_content">
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>Technology</a> </div>
            <img class="img-center" src="<?php echo $pathweb;?>public/products/<?php echo $pro_current->pro_img;?>" alt="">
            <p></p>
            <blockquote> <?php echo $pro_current->pro_desc;?> </blockquote>
            <div class="media-detail"><?php echo $pro_current->pro_detail;?></div>
          </div>
        </div>
      </div>
      <div class="post_pagination">
        <div class="prev"> <a class="angle_left" href="#"><i class="fa fa-angle-double-left"></i></a>
          <div class="pagincontent"> <span>Previous Post</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
        </div>
        <div class="next">
          <div class="pagincontent"> <span>Next Post</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
          <a class="angle_right" href="#"><i class="fa fa-angle-double-right"></i></a> </div>
      </div>
      <div class="share_post"> <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a> <a class="googleplus" href="#"><i class="fa fa-google-plus"></i>Google+</a> <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>Pinterest</a> </div>

      <div class="similar_post">
        <h2>Bài viết tương tự bạn có thể thích<i class="fa fa-thumbs-o-up"></i></h2>
        <ul class="small_catg similar_nav wow fadeInDown animated">
        <?php 
                if ($list_relation!=false){
                    foreach ($list_relation as $val_product) { 
        ?>
          <li>
            <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="<?php echo $pathweb;?>views/<?php echo $val_product->pro_slug.'-'.$val_product->pro_id;?>.html"><img src="<?php echo $pathweb;?>public/products/<?php echo $val_product->pro_img;?>" alt=""></a>
              <div class="media-body">
                <h4 class="media-heading"><a href="<?php echo $pathweb;?>views/<?php echo $val_product->pro_slug.'-'.$val_product->pro_id;?>.html"><?php echo $val_product->pro_name;?></a></h4>
                <div class="media-desc-main"><?php echo $val_product->pro_desc;?></div>
              </div>
            </div>
          </li>
       <?php } } ?> 
        </ul>
      </div>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="content_bottom_right">
         <?php
            include_once("views/vf_index/v_RecentPost.php");
          ?>
        <?php
            include_once("views/vf_index/v_MostPopular_RecentComment.php");
          ?>
        <!-- <div class="single_bottom_rightbar">
          <h2>Blog Archive</h2>
          <div class="blog_archive wow fadeInDown">
            <form action="#">
              <select>
                <option value="">Blog Archive</option>
                <option value="">October(20)</option>
              </select>
            </form>
          </div>
        </div>
        <div class="single_bottom_rightbar wow fadeInDown">
          <h2>Popular Lnks</h2>
          <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Blog Home</a></li>
            <li><a href="#">Error Page</a></li>
            <li><a href="#">Social link</a></li>
            <li><a href="#">Login</a></li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
</section>