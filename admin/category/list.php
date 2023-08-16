<?php 
	  if (!isset($_SESSION['U_id'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Quản lý thể loại  
						<?php If($_SESSION['role']=='Administrator') {
							echo '<a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Thêm</a>';
						}
						?>  </h1>
       		</div>
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th align="center">Thể loại</th> 
				  		 <th width="10%" align="center">Thao tác</th>
				  	</tr>	
				  </thead> 
				  <tbody style="font-size:15px">
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `product_categories`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td>' . $result->C_name.'</td>';
						If($_SESSION['role']=='Administrator') {
							$active = "";
						}else{
							$active = "Disabled";
						}
				  		echo '<td align="center">
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->C_id.'" class="btn btn-danger btn-xs" '.$active.'>  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		echo '</tr>';
				  	} 
					  ?>
					  <!-- nút edit : <a title="Edit" href="index.php?view=edit&id='.$result->C_id.'" class="btn btn-primary btn-xs  " '.$active.'>  <span class="fa fa-edit fw-fa"></a> -->
				  </tbody>
				</table>
						<div class="btn-group">
				</div>
			</form> 