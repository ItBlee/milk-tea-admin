
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Quản lý sản phẩm
						<?php If($_SESSION['role']=='Administrator') {
							echo '<a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Thêm</a>';
						}
						?>
						</h1>
       		</div>
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"></th>
				  		<th width="50">Ảnh</th>
				  		<th>Thể loại</th> 
				  		<th>Tên sản phẩm</th>
						<th width="70">Giá size M</th>
						<th width="70">Giá size L</th>
						<th width="70">Nóng/Lạnh</th>  
				  		<th width="70">Giảm giá%</th>
				  		<th width="60">Tình trạng</th>  

				  		<th width="70" align="center">Thao tác</th>
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody style="font-size:20px">
				  	<?php 
				  		$query = "SELECT * FROM `products` p , `product_categories` c
           					 WHERE p.`C_id` = c.`C_id` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>';
				  		echo '<td width="1%" align="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->P_id. '"/></td>';
				   		echo '<td style="padding:0px;">
							<a class="P_id" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->P_id.'"> 
							<img  title="'.$result->C_name.'" style="width:100px;height:100px;padding:0;"  src="'.$result->P_image . '">
							</a></td>'; 	
				  		echo '<td>'.$result->C_name.'</a></td>';
				  		
				  		echo '<td><b>'. $result->P_name.'</b></td>'; 
				  		echo '<td>  '.  number_format($result->price_M,0).' đ</td>';
						echo '<td>  '.  number_format($result->price_L,0).' đ</td>';
						echo '<td width="60"style="color:'.(($result->cold == 1)? "#1E90FF":"Brown").';">'. (($result->cold == 1)? "Lạnh":"Nóng/Lạnh").'</td>';
						echo '<td>  '.  number_format($result->discount,0).'%</td>';
						echo '<td width="60" style="color:'.(($result->available == 1)? "Green":"Red").';">'. (($result->available == 1)? "Còn hàng":"Hết hàng").'</td>';
						If($_SESSION['role']=='Administrator') {
							$active = "";
						}else{
							$active = "Disabled";
						}
						echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->P_id.'" class="btn btn-primary btn-xs  "'.$active.'>  <span class="fa fa-edit fw-fa"></a>
				  		     </td>';
				  	} 
					?>
					<!-- nút xóa :<a title="Delete" href="controller.php?action=delete&id='.$result->P_id.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a> -->  
				  </tbody>
					
				 	
				</table>

				<div class="btn-group">
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Xóa SP đã chọn</button>
				</div>
				</div>
				</form>
 
 					<div class="modal fade" id="productmodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">X</button>

                                    <h4 class="modal-title" id="myModalLabel">Ảnh.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/products/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <input class="P_id" type="hidden" name="P_id" id="P_id" value="">
                                        <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> <input id= "photo" name="photo" type="file">
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Ảnh</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                