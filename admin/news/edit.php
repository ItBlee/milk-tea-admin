<?php  

    if (!isset($_SESSION['U_id'])){
      redirect(web_root."index.php");
     }


  $N_id = $_GET['id'];
  $news = New News();
  $singlenews = $news->single_news($N_id);

?>
  
        
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa sản phẩm</h1>
          </div>
       </div>
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
                <div class="row"> 
                </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Ntitle">Chủ đề:</label>
                      <div class="col-md-8">
                            <input  id="N_id" name="N_id" type="HIDDEN" value="<?php echo $singlenews->N_id; ?>">
                            <input class="form-control input-sm" id="Ntitle" name="Ntitle" placeholder=
                            "nhập chủ đề" type="text" value="<?php echo $singlenews->title; ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Nbody">Nội dung:</label>
                      <div class="col-md-8"> 
                      <textarea class="form-control input-sm" id="Nbody" name="Nbody" cols="1" rows="10" placeholder=
                            "chi tiết của sự kiện ..."><?php echo $singlenews->body; ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "NgayBD">Bắt đầu:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="NgayBD" name="NgayBD" placeholder=
                            "ngày bắt đầu" type="date" value="<?php echo $singlenews->NgayBD; ?>"  step="any">
                      </div>
                       <label class="col-md-2 control-label" for=
                      "NgayKT">Kết thúc:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="NgayKT"  step="any" name="NgayKT" placeholder=
                            "ngày kết thúc " type="date" value="<?php echo $singlenews->NgayKT; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "promotion">Loại:</label>
                      <div class="col-md-8">
                       <select class="form-control input-sm" name="promotion" id="promotion">
                          <option <?php echo ($singlenews->promotion==1) ? 'selected="true"': '' ; ?> value="promotion"  >Khuyến mãi</option>
                          <option <?php echo ($singlenews->promotion==0) ? 'selected="true"': '' ; ?> value="nonpromotion" >Tin tức</option>
                        </select> 
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
            </div>
 </form>