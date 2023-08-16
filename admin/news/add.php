<?php
   if (!isset($_SESSION['U_id'])){
      redirect(web_root."index.php");
     }

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data" >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Thêm tin tức mới</h1>
          </div>
       </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Ntitle">Chủ đề:</label>
                      <div class="col-md-8">
                             <input class="form-control input-sm" id="Ntitle" name="Ntitle" placeholder=
                            "nhập chủ đề" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Nbody">Nội dung:</label>
                      <div class="col-md-8"> 
                      <textarea class="form-control input-sm" id="Nbody" name="Nbody" cols="1" rows="5" placeholder=
                            "chi tiết của sự kiện ..."></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "NgayBD">Bắt đầu:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="NgayBD" name="NgayBD" placeholder=
                            "ngày bắt đầu" type="date" value=""  step="any">
                      </div>
                       <label class="col-md-2 control-label" for=
                      "NgayKT">Kết thúc:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="NgayKT"  step="any" name="NgayKT" placeholder=
                            "ngày kết thúc " type="date" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "promotion">Loại:</label>
                      <div class="col-md-8">
                       <select class="form-control input-sm" name="promotion" id="promotion">
                          <option value="promotion"  >Khuyến mãi</option>
                          <option value="nonpromotion" >Tin tức</option>
                        </select> 
                      </div>
                    </div>
                  </div>

  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "imageS">Ảnh minh họa nhỏ:</label>
                      <div class="col-md-8">
                      <input type="file" name="imageS" value="" id="imageS"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "imageB">Ảnh minh họa lớn:</label>
                      <div class="col-md-8">
                      <input type="file" name="imageB" value="" id="imageB"/>
                      </div>
                    </div>
                  </div>
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>
                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Lưu</button>
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
      

       