<?php  
     if (!isset($_SESSION['U_id']))
     {
        redirect(web_root."admin/index.php");
     }

  @$U_id = $_GET['id'];
    if($U_id=='')
    {
        redirect("index.php");
    }
  $user = New User();
  $singleuser = $user->single_user($U_id);

?> 

        <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"> 
          <fieldset>
            <legend> Chỉnh sửa tài khoản</legend>
              <input class="form-control input-sm" id="U_id" name="U_id" placeholder=
                "Account Id" type="Hidden" value="<?php echo $singleuser->U_id; ?>">
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_name">Họ tên:</label>
                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_name" name="U_name" placeholder=
                          "nhập họ tên" type="text" value="<?php echo $singleuser->U_name; ?>">
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
                            "nhập tài khoản" type="text" value="<?php echo $singleuser->username; ?>">
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
                       <option value="Guest" <?php echo ($singleuser->role=='Guest') ? 'selected="true"': '' ; ?>>Guest</option>
                        <option value="Administrator"  <?php echo ($singleuser->role=='Administrator') ? 'selected="true"': '' ; ?>>Administrator</option>
                          
                        </select> 
                      </div>
                    </div>
                  </div>

             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>
                      <div class="col-md-8">
                         <button class="btn btn-primary " name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Lưu</button>
                         <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span>&nbsp;<strong>Quay lại</strong></a>
                      </div>
                    </div>
                  </div>

              
          </fieldset> 
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
        </div>