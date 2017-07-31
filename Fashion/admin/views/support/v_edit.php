<?php include_once("views/index/v_header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cập nhật hổ trợ
            <small>Dashboard</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="support.php">Hổ trợ</a></li>
            <li class="active">Cập nhật</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                
                <div class="box-body pad">
                  <form id="form_add_product" enctype="multipart/form-data">
                    <div id="support_name_valid" class="form-group">
                      <input readonly type="hidden" id="support_id" name="support_id" class="form-control" value="<?php echo $current_support->support_id; ?>">
                      <label>Tên người</label>
                      <input type="text" id="support_name" name="support_name" class="form-control" placeholder="Ví dụ: Ford Focus 1.6L Trend 5 Cửa" onblur="isempty('#support_name_valid',this);" value="<?php echo $current_support->support_name; ?>">
                    </div>
                    <div id="support_fb_valid" class="form-group">
                      <label>Facebook</label>
                      <input type="text" id="support_fb" name="support_fb" class="form-control" placeholder="Ví dụ: http://fb.com/minhduc" onblur="isempty('#support_fb_valid',this);" value="<?php echo $current_support->support_fb; ?>">
                    </div>
                    <div id="support_phone_valid" class="form-group">Phone</label>
                      <input type="text" id="support_phone" name="support_phone" class="form-control" placeholder="Ghi số điện thoại" onblur="isempty('#support_phone_valid',this);" value="<?php echo $current_support->support_phone; ?>">
                    </div>                    
                    <div id="support_img_valid" class="form-group">
                      <label>Hình ảnh</label>
                      <input type="hidden" id="temp_support_img" class="form-control" value="<?php echo $current_support->support_img;?>">
                      <div class="load-images-pro margin-img-photo">
                        <img width="100px" height="100px" src="../public/support/<?php echo $current_support->support_img;?>" alt="<?php echo $current_support->support_img;?>" class="img-src-pro">
                        <div class="btn-file">
                          <div class="btn-file-new">
                            <a><i class="fa fa-edit" aria-hidden="true"></i></a>
                          </div>
                          <div class="btn-file-enject">
                            <a href="javascript:void(0)" onclick="enject_support_img('<?php echo $current_support->support_img;?>');" title="Phục hồi ảnh cũ"><i class="fa fa-eject" aria-hidden="true"></i></a>
                          </div>
                          <input type="file" id="support_img" name="support_img" class="input-image" onchange="ValidateSingleInput_edit(this,1);">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-4 col-xs-4">
                        <button type="button" onclick="submit_add_product();" class="btn btn-block btn-success btn-flat">Cập nhật</button>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <button type="button" class="btn btn-block btn-warning btn-flat" onclick="reset_form_product();">Hủy</button>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <button type="button" class="btn btn-block btn-default btn-flat" onclick="location.href='support.php'">Xem List</button>
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
      
      function delete_img_photo(photo_key){
        var del_div = '.photo-key-'+photo_key;
        $("#photo_key").val(photo_key+'|'+$("#photo_key").val());
        $(del_div).remove();
      }
      function enject_support_img(support_img){
        $(".img-src-pro").attr("src","../public/support/"+support_img);
        $("#support_img").val("");
      }
      function enject_img_photo(photo_name, photo_key){
        var img_photo_src = ".img-src-photo-"+photo_key;
        var input_photo = ".input-photo-key-"+photo_key;
        var temp_photo_key = "#temp_photo_key_"+photo_key;
        $(img_photo_src).attr("src","../public/support/"+photo_name);
        $(input_photo).val("");
      }
     
      
      $("form#form_add_product").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        
        $(".loader").fadeIn("slow");
        //bootbox.alert("Test");
        $.ajax({
            type: 'POST',
            url: 'process_edit_support.php',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
              $(".loader").fadeOut("slow");
               // alert(response);
              if(response==="success"){
                  bootbox.alert("Cập nhật sản phẩm thành công");
                 // $('#form_add_product')[0].reset();
                  setTimeout(function(){window.location.reload(1);}, 1500);
              } else if (response==="duplicate") {
                  bootbox.alert("Tên sản phẩm hoặc đường dẫn đã bị trùng. Vui lòng thay đổi tên hoặc đường dẫn khác");
                  $("#support_fb_valid").addClass('has-error');
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
      function submit_add_product(){
        if (isvalid()){
          $("form#form_add_product").submit();
        } else {
          bootbox.alert("Chưa nhập đủ thông tin");
        }
      }
      function load_data_kind(){
        var pro_brand = $("#pro_brand").val();
        if(pro_brand!=0){
          $("#pro_brand_valid").removeClass('has-error').addClass('has-success');
        } else {
          $("#pro_brand_valid").removeClass('has-success').addClass('has-error');
        }
        $.ajax({
            type: "POST",
            url: "load_data_kind.php",
            data: {pro_brand: pro_brand},
            dataType: "html",
            success: function(msg){
                $("#pro_kind").html(msg);
                $('select').niceSelect("update");
            }
        });
      }
      function reset_form_product(){
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
        if($("#support_name").val().trim()===""){
          $("#support_name_valid").addClass('has-error');
          flag = false;
        } 
        if ($("#support_fb").val().trim()===""){
          $("#support_fb_valid").addClass('has-error');
          flag = false;
        }
        
        if ($("#support_phone").val().trim()===""){
          $("#support_phone_valid").addClass('has-error');
          flag = false;
        }
        return flag;
      }
      function isempty(id,obj){
        if($(obj).val().trim()===""){
          $(id).removeClass('has-success').addClass('has-error');
        } else {
          $(id).removeClass('has-error').addClass('has-success');
          
        }
      }
      function valid_photo(){
        var flag = true;
        $(".add-photo").each(function() {
          if ($(this).val()!=''){
            flag = false;
            return false;
          }
        });
        return flag;
      }
      function not_exist_photo(){
        var flag = true;
        if($(".input-photo").length>0){
          flag = false;
        }
        return flag;
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
      function add_button_file(){
        $(".flag_input").before('<input type="file" class="photo_id add-photo" name="photo_key[]" onchange="ValidateSingleInput(this);">');
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
                    if (oInput.name==="support_img"){
                      enject_support_img($("#temp_support_img").val());
                    }
                    if ($(temp).hasClass("photo_id")){
                      enject_img_photo($(temp_photo_img).val(), photo_key);
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
                  if (oInput.name==="support_img"){
                      $("#support_img_valid").removeClass('has-error').addClass('has-success');
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
                      if (oInput.name=="support_img"){
                          $("#support_img_valid").removeClass('has-success').addClass('has-error');
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