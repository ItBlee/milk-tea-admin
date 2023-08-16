<?php
    if (!isset($_SESSION['U_id'])){
      redirect(web_root."admin/index.php");
     }


  $categoryid = $_GET['id'];
  $category = New Category();
  $singlecategory = $category->single_category($categoryid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
 
              <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa thể loại</h1>
          </div> 
       </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="C_name">Thể loại:</label>

                      <div class="col-md-8">
                       <input  id="C_id" name="C_id"   type="HIDDEN" value="<?php echo $singlecategory->C_id; ?>">
                         <input class="form-control input-sm" id="C_name" name="C_name" placeholder=
                            "sửa thể loại" type="text" value="<?php echo $singlecategory->C_name; ?>">
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
      
 