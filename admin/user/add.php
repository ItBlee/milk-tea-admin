                      <?php 
                       if (!isset($_SESSION['U_id'])){
                          redirect(web_root."admin/index.php");
                         }

                       ?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Thêm tài khoản mới</h1>
          </div>
       </div>        
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_name">Họ tên:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_name" name="U_name" placeholder=
                            "nhập họ và tên" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "username">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "nhập tài khoản" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "nhập mật khẩu" type="Password" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "role">Phân quyền:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="role" id="role">
                          <option value="Administrator"  >Administrator</option>
                          <option value="Guest" >Guest</option>
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "U_image">Ảnh đại diện:</label>
                      <div class="col-md-8">
                      <input type="file" name="U_image" value="" id="U_image"/>
                      </div>
                    </div>
                  </div>

             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Lưu</button> 
                      <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>Quay lại</strong></a>
                       </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>
                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="col-md-6" align="right">
                   </div>
              </div>
              </div>
        </form>
       