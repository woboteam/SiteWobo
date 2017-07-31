 <section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_page_area">
            <!-- <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Duis quis erat non nunc fringilla </li>
            </ol> -->
            <h2 class="post_titile">I. Giới thiệu về chúng tôi</h2>
            <div class="single_page_content">
              <p><?php echo $m_page->get_pages_by_id(1)->pages_content; ?></p>
              <!-- <ul>
                <li>Nunc sed aliquet nisi. Nullam ut magna</li>
                <li>Nunc sed aliquet nisi. Nullam ut magna non lacus adipiscing volutpat</li>
                <li>Nunc sed aliquet nisi. Nullam ut magna</li>
                <li>Nunc sed aliquet nisi. Nullam ut magna non lacus adipiscing volutpat</li>
                <li>Nunc sed aliquet nisi. Nullam ut magna</li>
                <li>Nunc sed aliquet nisi. Nullam ut magna non</li>
              </ul> -->
            </div>            
            <h2 class="post_titile">II. Liên hệ với chúng tôi</h2>
            <div class="single_page_content">
              <p><?php echo $m_page->get_pages_by_id(2)->pages_content; ?></p>          
            </div>
          </div>
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