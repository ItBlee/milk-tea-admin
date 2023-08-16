
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Quản lý tin tức  
						<?php If($_SESSION['role']=='Administrator') {
							echo '<a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Thêm</a>';
						}
						?>  </h1>
       		</div>
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"></th>
				  		<th width="50">Ảnh</th>
				  		<th>Chủ đề</th> 
						<th width="90">Ngày bắt đầu</th>
						<th width="90">Ngày kết thức</th> 
						<th width="100">Loại</th>
						<th width="80">Còn</th>
				  		<th width="90">Tình trạng</th>  
				  		<th width="70" align="center">Thao tác</th>
				  	</tr>	
				  </thead> 	

			  <tbody style="font-size:20px">
				  	<?php 
				  		$query = "SELECT * FROM `news` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						echo '<tr>';
				  		echo '<td width="1%" align="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->N_id. '"/></td>';
				   		echo '<td style="padding:0px;">
						   <a class="N_id" href="" data-target="#'.$result->N_id.$result->N_id.'"  data-toggle="modal"  data-id="'.$result->N_id.'">
							<img  title="'.$result->title.'" style="width:120px;height:100px;padding:0;"  src="'.$result->imageS . '">
							</a></td>'; 	
				  		echo '<td><a class="N_id" href="" data-target="#'.$result->N_id.'"  data-toggle="modal" data-id="'.$result->N_id.'" style="text-decoration : none">'.$result->title.'</a></td>';
				  		echo '<td>'.date("d-m-Y", strtotime($result->NgayBD)).'</td>';
						echo '<td>'.date("d-m-Y", strtotime($result->NgayKT)).'</td>';
						echo '<td width="60" style="color:'.(($result->promotion == 1)? "#9932CC":"#C71585").';">'. (($result->promotion == 1)? "Khuyến mãi":"Tin tức").'</td>';
						$left = strtotime($result->NgayKT) - strtotime(date("Y-m-d"));
						$count = round($left / (60 * 60 * 24));
						echo '<td style="color:'.(($count > 0)? "#1E90FF":"Red").';">'.(($count > 0)? "$count":"0").' ngày</td>';
						echo '<td width="60" style="color:'.(($result->NgayKT > date("Y-m-d"))? "Green":"Red").';">'. (($result->NgayKT > date("Y-m-d"))? "Hoạt động":"Kết thúc").'</td>';
						If($_SESSION['role']=='Administrator') {
							$active = "";
						}else{
							$active = "Disabled";
						}
						echo '<td align="center">
								<a title="Edit" href="index.php?view=edit&id='.$result->N_id.'" class="btn btn-primary btn-xs " '.$active.'>  <span class="fa fa-edit fw-fa"></a>
				  		     </td>';
				  	} 
					?>
				  </tbody>
				</table>
				<div class="btn-group">
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Xóa tin đã chọn</button>
				</div>
				</div>
				</form>
	<?php 
	$query = "SELECT * FROM `news` ";
	$mydb->setQuery($query);
	$cur = $mydb->loadResultList();
	foreach ($cur as $result) { 
 			echo '<div class="modal fade" id="'.$result->N_id.$result->N_id.'" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Ảnh.</h4>
                                </div>
                                <form action="controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
										<input class="N_id"  name="N_id" id="N_id" value="'.$result->N_id.'">
                                        <input name="MAX_FILE_SIZE" type=
										"hidden" value="1000000">
										<img  title="'.$result->title.'" style="width:200px;height:180px;padding:0;"  src="'.$result->imageS . '"></br>
										<b>Chọn ảnh minh họa nhỏ: </b>
										<input id="photoS" name="photoS" type="file"></br>
										<img  title="'.$result->title.'" style="width:200px;height:180px;padding:0;"  src="'.$result->imageB . '"></br>
										<b>Chọn ảnh minh họa lớn: </b>
										<input id="photoB" name="photoB" type="file">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Ảnh</button>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>';
	}
	?>

<?php 
	$query = "SELECT * FROM `news` ";
	$mydb->setQuery($query);
	$cur = $mydb->loadResultList();
	foreach ($cur as $result) { 
echo '<div class="modal fade" id="'.$result->N_id.'" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="newtitle"><b>'.$result->title.'</b></h4>
        </div>
        <div class="modal-body">
		  <p id="newbody">'.$result->body.'</p></br>
		  <img  id="newimage" title="'.$result->title.'" style="width:535px;height:470px;padding:0;"  src="'.$result->imageB . '">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>';
	}
?>