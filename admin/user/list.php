<?php
	 if (!isset($_SESSION['U_id'])){
      redirect(web_root."admin/index.php");
     }

?>

	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Quản lý tài khoản  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Thêm</a>  </h1>
       		</div>
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
					    <th width="50">Ảnh</th>
				  		<th>Họ tên</th>
				  		<th>Tài khoản</th>
				  		<th>Phân quyền</th>
				  		<th width="10%" >Thao tác</th>
				  	</tr>	
				  </thead> 
				  <tbody style="font-size:20px">
				  	<?php 
				  		$mydb->setQuery("SELECT * 
										FROM  `websiteperson`");
				  		$cur = $mydb->loadResultList();
						foreach ($cur as $result) {
						echo '<tr>';
						echo '<td style="padding:0px;"> <img  title="'.$result->U_name.'" style="width:100px;height:100px;padding:0;"  src="'. web_root.'admin/user/'.$result->U_image . '"></td>'; 
				  		echo '<td>' . $result->U_name.'</a></td>';
				  		echo '<td>'. $result->username.'</td>';
				  		echo '<td>'. $result->role.'</td>';
				  		If($result->role=='Administrator') {
				  			$active = "Disabled";
				  		}else{
				  			$active = "";
				  		}
				  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->U_id.'"  class="btn btn-primary btn-xs  " >  <span class="fa fa-edit fw-fa"></span></a>
				  			<a title="Delete" href="controller.php?action=delete&id='.$result->U_id.'" class="btn btn-danger btn-xs" '.$active.'><span class="fa fa-trash-o fw-fa"></span> </a>
				  			</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>					
				</table>
			</div>
			</form>
	</div>