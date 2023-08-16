<?php
    if (!isset($_SESSION['U_id'])){
      redirect(web_root."admin/index.php");
     }


  $locationsid = $_GET['id'];
  $locations = New Locations();
  $singlelocations = $locations->single_locations($locationsid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
 
              <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa thể loại</h1>
          </div> 
       </div> 
                
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "L_name">Tên quán:</label>
                      <div class="col-md-8">
                        <input  id="L_id" name="L_id"   type="HIDDEN" value="<?php echo $singlelocations->L_id; ?>">
                         <input class="form-control input-sm" id="L_name" name="L_name" placeholder=
                            "nhập tên quán" type="text" value="<?php echo $singlelocations->L_name; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "address">Địa chỉ:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="address" name="address" placeholder=
                            "nhập địa chỉ" type="text" value="<?php echo $singlelocations->address; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "city">Thành phố:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="city" name="city" placeholder=
                            "nhập thành phố" type="text" value="<?php echo $singlelocations->city; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "phone">Số điện thoại:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="phone" name="phone" placeholder=
                            "nhập số điẹn thoại" type="text" value="<?php echo $singlelocations->phone; ?>">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "time_open">Mở cửa:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="time_open" name="time_open" placeholder=
                            "thời gian mở cửa" type="text" value="<?php echo $singlelocations->time_open; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "time_close">Đóng cửa:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="time_close" name="time_close" placeholder=
                            "thời gian đóng cửa" type="text" value="<?php echo $singlelocations->time_close; ?>">
                      </div>
                    </div>
                  </div>

             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>
                      <div class="col-md-8">
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Lưu</button>
                      <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span>&nbsp;<strong>Quay lại</strong></a>
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
      
 