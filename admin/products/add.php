<?php
   if (!isset($_SESSION['U_id'])){
      redirect(web_root."index.php");
     }

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data" >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm mới</h1>
          </div>
       </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "P_name">Tên sản phẩm:</label>
                      <div class="col-md-8">
                             <input class="form-control input-sm" id="P_name" name="P_name" placeholder=
                            "nhập tên sản phẩm" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "C_id">Thể loại:</label>
                      <div class="col-md-8">
                       <select class="form-control input-sm" name="C_id" id="C_id">
                          <?php
                          $mydb->setQuery("SELECT * FROM `product_categories`");
                          $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo  '<option value='.$result->C_id.' >'.$result->C_name.'</option>';
                          }
                          ?>
                        </select> 
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "price_M">Giá size M:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="price_M" name="price_M" placeholder=
                            "giá M vnđ" type="text" value=""  step="any">
                      </div>
                       <label class="col-md-2 control-label" for=
                      "price_L">Giá size L:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="price_L"  step="any" name="price_L" placeholder=
                            "giá L vnđ " type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "discount">Giảm giá:</label>
                      <div class="col-md-8">
                             <input class="form-control input-sm" id="discount" name="discount" placeholder=
                            "giảm %" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "cold">Lạnh/Nóng:</label>
                      <div class="col-md-8">
                       <select class="form-control input-sm" name="cold" id="cold">
                          <option value="cold"  >lạnh</option>
                          <option value="hot" >nóng/lạnh</option>
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "available">Tình trạng:</label>
                      <div class="col-md-8">
                       <select class="form-control input-sm" name="available" id="available">
                          <option value="available"  >còn hàng</option>
                          <option value="nonavailable" >hết hàng</option>
                        </select> 
                      </div>
                    </div>
                  </div>

  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "P_image">Ảnh minh họa:</label>
                      <div class="col-md-8">
                      <input type="file" name="P_image" value="" id="P_image"/>
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
      

       