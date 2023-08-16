<?php
	require_once("../xuly_database/initialize.php");
	if (!isset($_SESSION['U_id']))
	{
     	redirect(web_root."admin/index.php");
    }

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

			$errofile = $_FILES['U_image']['error'];
			$type = $_FILES['U_image']['type'];
			$temp = $_FILES['U_image']['tmp_name'];
			$myfile =$_FILES['U_image']['name'];
		 	$location="../../source/image/user/".$myfile;


		if ( $errofile > 0) {
				message("Chưa chọn ảnh!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$file=$_FILES['U_image']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['U_image']['tmp_name']));
				@$image_name= addslashes($_FILES['U_image']['name']); 
				@$image_size= getimagesize($_FILES['U_image']['tmp_name']);

			if ($image_size==FALSE || $type=='video/wmv') {
				message("File tải lên không phải ảnh!", "error");
				redirect("index.php?view=add");
			}else{
					move_uploaded_file($temp,"../../source/image/user/" . $myfile);
				if ($_POST['U_name'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
					$messageStats = false;
					message("Nhập thiếu thông tin!","error");
					redirect('index.php?view=add');
				}else{	
					$user = New User();
					$user->U_name 		= $_POST['U_name'];
					$user->username		= $_POST['username'];
					$user->pass			=sha1($_POST['pass']);
					$user->role			=  $_POST['role'];
					$user->U_image 		= $location; 
					$user->create();
					message("Tạo tài khoản [". $_POST['U_name'] ."] thành công!", "success");
					redirect("index.php");
					
				}
		}
	}
	}
}

	function doEdit(){
	if(isset($_POST['save'])){

			$user = New User(); 
			$user->U_name 		= $_POST['U_name'];
			$user->username		= $_POST['username'];
			$user->pass			=sha1($_POST['pass']);
			$user->role			= $_POST['role'];
			$user->update($_POST['U_id']);

			  message("[". $_POST['U_name'] ."] đã được chỉnh sửa!", "success");
			  if ($user->username == $_SESSION['username'])
			  {
					$_SESSION['role'] = $user->role;
			  }
			  redirect("index.php");
			
		}
	}


	function doDelete(){
		
				$id = 	$_GET['id'];
				$user = New User();
				$url = $user->single_user($id);
				unlink($url->U_image);
	 		 	$user->delete($id);
			 
			message("Đã xóa tài khoản!","info");
			redirect('index.php');
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="../../source/image/user/".$myfile;


		if ( $errofile > 0) {
				message("Chưa chọn ảnh", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("File tải lên không phải ảnh!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					move_uploaded_file($temp,"../../source/image/user/" . $myfile);
		 	
						$user = New User();
						$user->U_image 			= $location;
						$user->update($_SESSION['U_id']);
						redirect("index.php");
						 
							
					}
			}
			 
		}
 
?>