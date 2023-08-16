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
			$errofileS = $_FILES['imageS']['error'];
			$typeS = $_FILES['imageS']['type'];
			$tempS = $_FILES['imageS']['tmp_name'];
			$myfileS =$_FILES['imageS']['name'];

			$errofileB = $_FILES['imageB']['error'];
			$typeB = $_FILES['imageB']['type'];
			$tempB = $_FILES['imageB']['tmp_name'];
			$myfileB =$_FILES['imageB']['name'];

			$locationS="../../source/image/events/".$myfileS;
		 	$locationB="../../source/image/events/".$myfileB;


		if ( $errofileS > 0 || $errofileB > 0) {
				message("Chưa chọn đủ ảnh!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$fileS=$_FILES['imageS']['tmp_name'];
				@$imageS= addslashes(file_get_contents($_FILES['imageS']['tmp_name']));
				@$image_nameS= addslashes($_FILES['imageS']['name']); 
				@$image_sizeS= getimagesize($_FILES['imageS']['tmp_name']);

				@$fileB=$_FILES['imageB']['tmp_name'];
				@$imageB= addslashes(file_get_contents($_FILES['imageB']['tmp_name']));
				@$image_nameB= addslashes($_FILES['imageB']['name']); 
				@$image_sizeB= getimagesize($_FILES['imageB']['tmp_name']);

			if ($image_sizeS==FALSE || $typeS=='video/wmv' || $image_sizeB==FALSE || $typeB=='video/wmv') {
				message("File tải lên không phải ảnh!", "error");
				redirect("index.php?view=add");
			}else{
					move_uploaded_file($tempS,$locationS);
					move_uploaded_file($tempB,$locationB);
		 	
					if ($_POST['Ntitle'] == "" || $_POST['Nbody'] == "" || $_POST['NgayBD'] == "" || $_POST['NgayKT'] == "") {
					$messageStats = false;
					message("Chưa nhập đầy đủ dữ liệu!","error");
					redirect('index.php?view=add');
					}
					elseif ($_POST['NgayKT'] < $_POST['NgayBD'])
					{
						message("Ngày kết thức phải sau ngày bắt đầu!", "error");
						redirect("index.php?view=add");
					}
					else{	

  				 	 	$news = New News(); 
						$news->imageS 		= $locationS;  
						$news->imageB 		= $locationB; 
						$news->title 		= $_POST['Ntitle'];
						$news->body			= $_POST['Nbody']; 
						$news->NgayBD		= $_POST['NgayBD'];
						$news->NgayKT		= $_POST['NgayKT'];
						if ($_POST['promotion']=="promotion")
						{
							$news->promotion= 1; 
						}
						else
						{
							$news->promotion= 0; 
						}
						$news->create();
						message("Thêm tin tức mới thành công!", "success");
						redirect("index.php");
						}	
					}
				}
		  	}
	  }
 
 
			function doEdit(){
					if(isset($_POST['save'])){
						$id = $_POST['N_id'];
						$news = New News(); 
						$news->title 		= $_POST['Ntitle'];
						$news->body			= $_POST['Nbody']; 
						$news->NgayBD		= $_POST['NgayBD'];
						$news->NgayKT		= $_POST['NgayKT'];
						if ($_POST['promotion']=="promotion")
						{
							$news->promotion= 1; 
						}
						else
						{
							$news->promotion= 0; 
						}
						$news->update($id);
						message("Chỉnh sửa tin tức thành công!", "success");
						redirect("index.php");
	  				}
					redirect("index.php"); 
				}

	function doDelete(){
		if (isset($_POST['selector'])==''){
			message("Hãy chọn tin tức cần xóa!","error");
			redirect('index.php');
			}else{

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 
			$news = New News();
			$url = $news->single_news($id[$i]);
			unlink($url->imageS);
			unlink($url->imageB);
			$news->delete($id[$i]);
			message("Đã xóa tin tức!","info");
			redirect('index.php');
			}
		}
	}
		 
	function doupdateimage(){
				$errofileS = $_FILES['photoS']['error'];
				$typeS = $_FILES['photoS']['type'];
				$tempS = $_FILES['photoS']['tmp_name'];
				$myfileS =$_FILES['photoS']['name'];
	
				$errofileB = $_FILES['photoB']['error'];
				$typeB = $_FILES['photoB']['type'];
				$tempB = $_FILES['photoB']['tmp_name'];
				$myfileB =$_FILES['photoB']['name'];
	
				$locationS="../../source/image/events/".$myfileS;
				$locationB="../../source/image/events/".$myfileB;
	
	
			if ( $errofileS > 0 || $errofileB > 0) {
					message("Chưa chọn đủ ảnh!", "error");
					redirect("index.php?view=add");
			}else{
		 
					@$fileS=$_FILES['photoS']['tmp_name'];
					@$imageS= addslashes(file_get_contents($_FILES['photoS']['tmp_name']));
					@$image_nameS= addslashes($_FILES['photoS']['name']); 
					@$image_sizeS= getimagesize($_FILES['photoS']['tmp_name']);
	
					@$fileB=$_FILES['photoB']['tmp_name'];
					@$imageB= addslashes(file_get_contents($_FILES['photoB']['tmp_name']));
					@$image_nameB= addslashes($_FILES['photoB']['name']); 
					@$image_sizeB= getimagesize($_FILES['photoB']['tmp_name']);
	
				if ($image_sizeS==FALSE || $typeS=='video/wmv' || $image_sizeB==FALSE || $typeB=='video/wmv') {
					message("File tải lên không phải ảnh!", "error");
					redirect("index.php?view=add");
				}else{
					move_uploaded_file($tempS,$locationS);
					move_uploaded_file($tempB,$locationB);
					$news = New News();
					$news->image 		= $locationS;  
					$news->P_image 		= $locationB;
					$news->update($_POST['N_id']); 
					redirect("index.php");
				}
			}
		}
?>