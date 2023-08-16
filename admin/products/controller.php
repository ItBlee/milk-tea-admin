<?php
require_once("../xuly_database/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

	}

   
function doInsert(){
	if(isset($_POST['save'])){
			$errofile = $_FILES['P_image']['error'];
			$type = $_FILES['P_image']['type'];
			$temp = $_FILES['P_image']['tmp_name'];
			$myfile =$_FILES['P_image']['name'];

			$id = $_POST['C_id'];
			global $mydb;
			$mydb->setQuery("SELECT * FROM `product_categories` WHERE C_id = {$id}");
			$cur = $mydb->loadResultList();
			foreach ($cur as $result) {
				$pathname = $result->C_name;
			}
			$path1 = "./source/image/product/".$pathname;
			$path2 = "../../source/image/product/".$pathname;
			if (!file_exists($path2)) {
				mkdir($path2, 0777, true);
			}
			$location1=$path1."/".$myfile;
		 	$location2=$path2."/".$myfile;


		if ( $errofile > 0) {
				message("Chưa chọn ảnh!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$file=$_FILES['P_image']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['P_image']['tmp_name']));
				@$image_name= addslashes($_FILES['P_image']['name']); 
				@$image_size= getimagesize($_FILES['P_image']['tmp_name']);

			if ($image_size==FALSE || $type=='video/wmv') {
				message("File tải lên không phải ảnh!", "error");
				redirect("index.php?view=add");
			}else{
					move_uploaded_file($temp,$location2);
		 	
					if ($_POST['P_name'] == "" || $_POST['price_L'] == "" || $_POST['price_M'] == "" || $_POST['discount'] == "") {
					$messageStats = false;
					message("Chưa nhập đầy đủ dữ liệu!","error");
					redirect('index.php?view=add');
					}
					elseif ($_POST['price_L'] < $_POST['price_M'])
					{
						message("Giá size L phải lớn hơn M!", "error");
						redirect("index.php?view=add");
					}
					elseif ($_POST['discount'] > 100)
					{
						message("Giảm giá phải bé hơn 100%", "error");
						redirect("index.php?view=add");
					}
					else{	

  				 	 	$product = New Product(); 
						$product->image 		= $location1;  
						$product->P_image 		= $location2; 
						$product->P_name 		= $_POST['P_name'];
						$product->C_id	    	= $_POST['C_id'];
						$product->price_M		= $_POST['price_M']; 
						$product->price_L		= $_POST['price_L'];
						$product->discount		= $_POST['discount'];
						if ($_POST['cold']=="cold")
						{
							$product->cold		= 1; 
						}
						else
						{
							$product->cold		= 0; 
						}
						if ($_POST['available']=="available")
						{
							$product->available	= 1; 
						}
						else
						{
							$product->available	= 0; 
						}
						$product->create();

						message("Thêm sản phẩm mới thành công!", "success");
						redirect("index.php");
						}	
					}
				}
		  	}
	  }
 
 
	function doEdit(){
					if(isset($_POST['save'])){
						$id = $_POST['P_id'];
						$product = New Product();
						$product->P_name 	= $_POST['P_name'];
						$product->C_id	    = $_POST['C_id'];
						$product->discount	= $_POST['discount'];
						$product->price_M	= $_POST['price_M']; 
						$product->price_L	= $_POST['price_L'];  
						if ($_POST['available']==1){
							$product->available	= 1;
						}elseif($_POST['available']==0){
							$product->available	= 0;
						}
						if ($_POST['cold']==1){
							$product->available	= 1;
				
						}elseif($_POST['cold']==0){
							$product->available	= 0;
						}
						
						$singleproduct = $product->single_product($id);
						$category = New Category();
						$singlecategory = $category->single_category($singleproduct->C_id);
						if ($singleproduct->C_id != $product->C_id)
						{
							$oldcate = $singlecategory->C_name;
							$filename = basename($singleproduct->P_image);
							global $mydb;
							$mydb->setQuery("SELECT * FROM `product_categories` WHERE C_id = {$product->C_id}");
							$cur = $mydb->loadResultList();
							foreach ($cur as $result) {
								$newcate = $result->C_name;
							}
							$oldpath = "../../source/image/product/".$oldcate."/".$filename;
							$newpath = "../../source/image/product/".$newcate."/".$filename;
								if (!file_exists($newpath)) {
									mkdir($newpath, 0777, true);
								}
								copy($oldpath,$newpath);
								unlink($oldpath);
						}
						$product->update($id);

			message("Chỉnh sửa sản phẩm thành công!", "success");
			redirect("index.php");
	  }
	redirect("index.php"); 
}

	function doDelete(){
		if (isset($_POST['selector'])==''){
			message("Hãy chọn sản phẩm cần xóa!","error");
			redirect('index.php');
			}else{

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 
			$product = New Product();
			$url = $product->single_product($id[$i]);
			unlink($url->P_image);
			$product->delete($id[$i]);
			message("Đã xóa sản phẩm!","info");
			redirect('index.php');
			}
		}
	}
		 
	function doupdateimage(){
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];

			$id = $_POST['P_id'];
			global $mydb;
			$mydb->setQuery("SELECT * FROM `products` p, `product_categories` pc WHERE p.P_id = {$id} AND p.C_id = pc.C_id");
			$cur = $mydb->loadResultList();
			foreach ($cur as $result) {
				$pathname = $result->C_name;
				$url = $result->P_image;
			}
			unlink($url);
			$path1 = "./source/image/product/".$pathname;
			$path2 = "../../source/image/product/".$pathname;
			if (!file_exists($path2)) {
				mkdir($path2, 0777, true);
			}
			$location1=$path1."/".$myfile;
		 	$location2=$path2."/".$myfile;

		if ( $errofile > 0) {
				message("Chưa chọn ảnh!", "error");
				redirect("index.php?view=view&id=". $_POST['P_id']);
		}else{
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("File không phải ảnh!", "error");
				redirect("index.php?view=view&id=". $_POST['P_id']);
			}else{
					move_uploaded_file($temp,$location2);

						$product = New Product();
						$product->image 		= $location1;  
						$product->P_image 		= $location2;
						$product->update($_POST['P_id']); 
						redirect("index.php");
					}
			}
			 
		}
?>