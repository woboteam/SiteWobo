<?php include_once("views/index/v_header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cập nhật tin tức
            <small>Dashboard</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="listnews.php">Tin tức</a></li>
            <li class="active">Cập nhật</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                
                <div class="box-body pad">
                  <form id="form_add_news" enctype="multipart/form-data">
                    <div id="new_title_valid" class="form-group">
                      <input type="hidden" id="new_id" name="new_id" class="form-control" value="<?php echo $current_news->new_id; ?>">
                      <label>Tiêu đề</label>
                      <input type="text" id="new_title" name="new_title" class="form-control" placeholder="Ví dụ: Ford Focus 1.6L Trend 5 Cửa" onblur="isempty('#new_title_valid',this);" value="<?php echo $current_news->new_title; ?>">
                    </div>
                    <div id="new_slug_valid" class="form-group">
                      <label>Tên đường dẫn</label>
                      <input type="hidden" id="new_slug_src" name="new_slug_src" class="form-control" value="<?php echo $current_news->new_slug;?>">
                      <input type="text" id="new_slug" name="new_slug" class="form-control" placeholder="Ví dụ: Ford Focus 1.6L Trend 5 Cửa" onblur="isempty('#new_slug_valid',this);" value="<?php echo $current_news->new_slug; ?>">
                    </div>
                    <div id="cate_id_valid" class="form-group">
                      <label>Chuyên mục</label>
                      <select id="cate_id" name="cate_id" class="form-control select2" style="width: 100%;">
                        <option value="0">-- Chọn chuyên mục --</option>
                        <option value="28" <?php if ($current_news->cate_id==28) { echo 'selected="selected"';};?>> Tin tức </option>
                        <option value="29" <?php if ($current_news->cate_id==29) { echo 'selected="selected"';};?>> Rao vặt </option>
                      </select>
                    </div>
                    <div id="new_img_valid" class="form-group">
                      <label>Hình ảnh đại diện tin tức</label>
                      <input type="hidden" id="temp_new_img" class="form-control" value="<?php echo $current_news->new_img;?>">
                      <div class="load-images-pro margin-img-photo">
                        <img width="100px" height="100px" src="../public/_thumbs/Images/news/<?php echo $current_news->new_img;?>" alt="<?php echo $current_news->new_img;?>" class="img-src-pro">
                        <div class="btn-file">
                          <div class="btn-file-new">
                            <a><i class="fa fa-edit" aria-hidden="true"></i></a>
                          </div>
                          <div class="btn-file-enject">
                            <a href="javascript:void(0)" onclick="enject_new_img('<?php echo $current_news->new_img;?>');" title="Phục hồi ảnh cũ"><i class="fa fa-eject" aria-hidden="true"></i></a>
                          </div>
                          <input type="file" id="new_img" name="new_img" class="input-image" onchange="ValidateSingleInput_edit(this,1);">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea id="new_desc" name="new_desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        <?php echo $current_news->new_desc;?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label>Bài viết chi tiết</label>
                      <textarea id="editor1" name="new_detail" rows="10" cols="80">
                        <?php echo $current_news->new_detail;?>
                      </textarea>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-xs-4">
                        <button type="button" onclick="submit_add_news();" class="btn btn-block btn-success btn-flat">Cập nhật</button>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <button type="button" class="btn btn-block btn-warning btn-flat" onclick="reset_form_news();">Hủy</button>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <button type="button" class="btn btn-block btn-default btn-flat" onclick="location.href='listnews.php'">Xem List</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div><!-- /.box -->

              
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once("views/index/v_footer.php");?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->

            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- div loading -->
    <div class="loader"></div>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="plugins/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Bootbox hiển thị hộp thoại alert, promt, confirm bằng thư viện bootstrap -->
    <script src="dist/js/bootbox.js"></script>
    <script>
      $(function () {
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
      
      function enject_new_img(new_img){
        $(".img-src-pro").attr("src","../public/_thumbs/Images/news/"+new_img);
        $("#new_img").val("");
      }
      function CKupdate(){
        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
      }
      $("form#form_add_news").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        CKupdate();
        $(".loader").fadeIn("slow");
        
        $.ajax({
            type: 'POST',
            url: 'process_edit_news.php',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
              $(".loader").fadeOut("slow");
              // alert(response);
              if(response==="success"){
                  bootbox.alert("Cập nhật tin tức thành công");
                 // $('#form_add_product')[0].reset();
                  setTimeout(function(){window.location.reload(1);}, 1500);
              } else if (response==="duplicate") {
                  bootbox.alert("Tên tin tức hoặc đường dẫn đã bị trùng. Vui lòng thay đổi tên hoặc đường dẫn khác");
                  $("#new_slug_valid").addClass('has-error');
              } else if (response==="valid") {
                  bootbox.alert("Chưa nhập đủ thông tin");
              } else {
                  bootbox.alert("Error: Liên hệ hổ trợ");
              }
            },
            error: function(error){
              $(".loader").addClass("hide"); 
              bootbox.alert("Error: " + eval(error));
            }
        });
        return false;
      });
      function submit_add_news(){
        if (isvalid()){
          $("form#form_add_news").submit();
        } else {
          bootbox.alert("Chưa nhập đủ thông tin");
        }
      }
      function reset_form_news(){
        bootbox.confirm({
            message: "Bạn muốn hủy bỏ nội dung trang hiện tại?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                if (result==true){
                  window.location.reload()
                }
            }
        });
      }
      function isvalid(){
        flag = true;
        if($("#new_title").val().trim()===""){
          $("#new_title_valid").addClass('has-error');
          flag = false;
        } 
        if ($("#new_slug").val().trim()===""){
          $("#new_slug_valid").addClass('has-error');
          flag = false;
        }
        CKupdate();
        return flag;
      }
      function isempty(id,obj){
        if($(obj).val().trim()===""){
          $(id).removeClass('has-success').addClass('has-error');
        } else {
          $(id).removeClass('has-error').addClass('has-success');
          if(id==="#new_title_valid"){
            $("#new_slug").val(slug($(obj).val().trim()));
          }
        }
      }
            
      function slug(str){
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "ãàáạảäâấầẩẫậăắằẳẵặẽèéẻẹëêềếểễệđìíịỉĩïîõòỏóọöốôồổỗộơớờợởỡùúụủũüûưứừửữựñç·/_,:;";
        var to   = "aaaaaaaaaaaaaaaaaaeeeeeeeeeeeediiiiiiioooooooooooooooooouuuuuuuuuuuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes

        return str;
      }
      
      $(document).on('change','.input-image',function(){
          var button = $(this);
          var preview = $(this).parent().parent().find("img");
          var file = this.files[0];
          if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
              var reader = new FileReader();
              reader.addEventListener("load", function () {
                  preview.attr('src',this.result);
              }, false);
              reader.readAsDataURL(file);
          }
      });
      var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
      function ValidateSingleInput_edit(oInput,photo_key) {
          if (oInput.type == "file") {
              var temp = oInput;
              var sFileName = oInput.value;
              var temp_photo_img = "#temp_photo_key_"+photo_key;
              if (sFileName.length > 0) {
                  var blnValid = false;
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                      var sCurExtension = _validFileExtensions[j];
                      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          break;
                      }
                  }
                  if (!blnValid) {
                    oInput.value="";
                    if (oInput.name==="new_img"){
                      enject_new_img($("#temp_new_img").val());
                    }
                    
                    bootbox.alert("Xin lỗi, " + sFileName + " đã sai, chỉ cho phép các định dạng: " + _validFileExtensions.join(", "));
                    return false;
                  }
              }
          }
          return true;
      }
      function ValidateSingleInput(oInput) {
          if (oInput.type == "file") {
              var sFileName = oInput.value;
              if (sFileName.length > 0) {
                  var blnValid = false;
                  if (oInput.name==="new_img"){
                      $("#new_img_valid").removeClass('has-error').addClass('has-success');
                  }
                  if (oInput.className==="photo_id"){
                      $("#photo_valid").removeClass('has-error').addClass('has-success');
                  }
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                      var sCurExtension = _validFileExtensions[j];
                      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          break;
                      }
                  }
                  if (!blnValid) {
                      oInput.value = "";
                      if (oInput.name=="new_img"){
                          $("#new_img_valid").removeClass('has-success').addClass('has-error');
                      }
                      if (oInput.className==="photo_id" && valid_photo() && not_exist_photo()){
                          $("#photo_valid").removeClass('has-success').addClass('has-error');
                      }
                      bootbox.alert("Xin lỗi, " + sFileName + " đã sai, chỉ cho phép các định dạng: " + _validFileExtensions.join(", "));
                      
                      return false;
                  }
              }
          }
          return true;
      }
    </script>
    <script type="text/javascript">
      $(document).ready(function (){
        $(".view_count_pro").load("view_count_pro.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_count_pro").html(msg + req.status + " " + req.statusText)
          }
        });
        $(".view_count_news").load("view_count_news.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_count_news").html(msg + req.status + " " + req.statusText)
          }
        });
        $(".view_count_timer").load("view_count_event.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_count_timer").html(msg + req.status + " " + req.statusText)
          }
        });
        $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_contact_new").html(msg + req.status + " " + req.statusText)
          }
        });
      });
    </script>
  </body>
</html>