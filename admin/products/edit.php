<?php  

    if (!isset($_SESSION['U_id'])){
      redirect(web_root."index.php");
     }


  $P_id = $_GET['id'];
  $product = New Product();
  $singleproduct = $product->single_product($P_id);

?>
  
        
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa sản phẩm</h1>
          </div>
       </div>
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
 
                <div class="row"> 

        <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "P_name">Tên sản phẩm:</label>
                      <div class="col-md-8">
                            <input  id="P_id" name="P_id" type="HIDDEN" value="<?php echo $singleproduct->P_id; ?>">
                            <input class="form-control input-sm" id="P_name" name="P_name" placeholder=
                            "sửa tên sản phẩm" type="text" value="<?php echo $singleproduct->P_name; ?>">
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
                          $category = New Category();
                          $singlecategory = $category->single_category($singleproduct->C_id);
                          echo  '<option SELECTED  value='.$singlecategory->C_id.' >'.$singlecategory->C_name.'</option>';
                          $mydb->setQuery("SELECT * FROM `product_categories` where C_id <> '".$singlecategory->C_id."'");
                          $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo  '<option  value='.$result->C_id.' >'.$result->C_name.'</option>';
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
                            "giá M vnđ" type="number" value="<?php echo $singleproduct->price_M; ?>"  step="any">
                      </div>
                       <label class="col-md-2 control-label" for=
                      "price_L">Giá size L:</label>
                      <div class="col-md-3">
                         <input class="form-control input-sm" id="price_L"  step="any" name="price_L" placeholder=
                            "giá L vnđ " type="number" value="<?php echo $singleproduct->price_L; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "discount">Giảm giá:</label>
                      <div class="col-md-8">
                             <input class="form-control input-sm" id="discount" name="discount" placeholder=
                            "giảm %" type="text" value="<?php echo $singleproduct->discount; ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "cold">Lạnh/Nóng:</label>
                      <div class="col-md-8">
                       <select class="form-control input-sm" name="cold" id="cold">
                          <option <?php echo ($singleproduct->cold==1) ? 'selected="true"': '' ; ?> value="cold" >lạnh</option>
                          <option <?php echo ($singleproduct->cold==0) ? 'selected="true"': '' ; ?> value="hot" >nóng/lạnh</option>
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
                          <option <?php echo ($singleproduct->available==1) ? 'selected="true"': '' ; ?> value="available"  >còn hàng</option>
                          <option <?php echo ($singleproduct->available==0) ? 'selected="true"': '' ; ?> value="nonavailable" >hết hàng</option>
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