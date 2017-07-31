<?php include_once("views/index/v_header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cập nhật Dòng xe
            <small>Dashboard</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="listkind.php">Dòng xe</a></li>
            <li class="active">Cập nhật</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-info">
            <div class="box-body pad">
              <form id="form_add_news" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div id="kind_name_valid" class="form-group">
                      <input type="hidden" id="kind_id" name="kind_id" value="<?php echo $kind_current->kind_id;?>">
                      <label>Dòng xe</label>
                      <input type="text" id="kind_name" name="kind_name" class="form-control" placeholder="Nhập tên dòng xe" onblur="isempty('#kind_name_valid',this);" value="<?php echo $kind_current->kind_name;?>">
                    </div>
                    <div id="kind_slug_valid" class="form-group">
                      <label>Tên đường dẫn</label>
                      <input type="text" id="kind_slug" name="kind_slug" class="form-control" placeholder="Ví dụ: brand-1" onblur="isempty('#kind_slug_valid',this);"  value="<?php echo $kind_current->kind_slug;?>">
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div id="brand_id_valid" class="form-group">
                      <label>Hiệu xe</label>
                      <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                        <option value="0"> --- dòng xe gốc --- </option>
                        <?php
                        if ($list_brand!=false){
                          foreach ( $list_brand as $brand) {
                        ?>
                        <option value="<?php echo $brand->brand_id;?>" <?php if ($brand->brand_id==$kind_current->brand_id){ echo 'selected="selected"';}?>><?php echo $brand->brand_name;?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>
                    
                    
                  </div>

                </div><!-- /.row --> 
                <div class="row">
                  
                  <div class="col-md-4 col-xs-4">
                    <button type="button" onclick="submit_add_news();" class="btn btn-block btn-success btn-flat">Cập nhật</button>
                  </div>
                  <div class="col-md-4 col-xs-4">
                    <button type="button" class="btn btn-block btn-warning btn-flat" onclick="reset_form_news();">Hủy</button>
                  </div>
                  <div class="col-md-4 col-xs-4">
                    <button type="button" class="btn btn-block btn-default btn-flat" onclick="location.href='listkind.php'">Xem List</button>
                  </div>
                </div> 
              </form> 
            </div><!-- /.box-body -->
          </div><!-- ./box -->
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
            <ul class="control-sidebar-brand">
              <li>
                <a href="javascript::;">
                  <i class="brand-icon fa fa-birthday-cake bg-red"></i>
                  <div class="brand-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="brand-icon fa fa-user bg-yellow"></i>
                  <div class="brand-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="brand-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="brand-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="brand-icon fa fa-file-code-o bg-green"></i>
                  <div class="brand-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-brand -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-brand">
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
            </ul><!-- /.control-sidebar-brand -->

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
    
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Bootbox hiển thị hộp thoại alert, promt, confirm bằng thư viện bootstrap -->
    <script src="dist/js/bootbox.js"></script>

    <script>
      $("#brand_id").change(function(){
        if($("#brand_id").val()!=0){
          $("#brand_id_valid").removeClass('has-error').addClass('has-success');
        } else {
          $("#brand_id_valid").removeClass('has-success').addClass('has-error');
        }
      });
      $("form#form_add_news").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
  
        $(".loader").fadeIn("slow");
        // bootbox.alert("Test");
        $.ajax({
            type: 'POST',
            url: 'process_edit_kind.php',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
              $(".loader").fadeOut("slow");
              // alert(response);
              if(response==="success"){
                  bootbox.alert("Cập nhật  thành công");
                  setTimeout(function(){window.location.reload(1);}, 1500);
              } else if (response==="duplicate") {
                  bootbox.alert("Tên dòng xe hoặc đường dẫn đã bị trùng. Vui lòng thay đổi tên hoặc đường dẫn khác");
                  $("#kind_slug_valid").addClass('has-error');
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
        
        if($("#kind_name").val().trim()===""){
          $("#kind_name_valid").addClass('has-error');
          flag = false;
        } 
        if ($("#brand_id").val()==0){
          $("#brand_id_valid").addClass('has-error');
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