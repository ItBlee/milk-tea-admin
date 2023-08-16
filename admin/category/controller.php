
<?php
require_once("../xuly_database/initialize.php");
 	 if (!isset($_SESSION['U_id'])){
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
	}
   
	function doInsert(){
		if(isset($_POST['save'])){
		if ( $_POST['C_name'] == "" ) {
			$messageStats = false;
			message("Chưa nhập tên thể loại !","error");
			redirect('index.php?view=add');
		}else{	
			$category = New Category();
			$category->C_name	= $_POST['C_name'];
			$category->create();
			message("Thêm thể loại [". $_POST['C_name'] ."] thành công!", "success");
			redirect("index.php");
			
		}
		}
	}

	function doEdit(){
		if(isset($_POST['save'])){
			$category = New Category();
			$category->C_name	= $_POST['C_name'];
			$category->update($_POST['C_id']);
			message("[". $_POST['C_name'] ."] đã được chỉnh sửa!", "success");
			redirect("index.php");
		}
	}

	function doDelete(){
			$id = $_GET['id'];
			$category = New Category();
			$category->delete($id);
			$singlecategory = $category->single_category($id);
			if ($singlecategory->C_id == $id)
			{
				message("Không thể xóa thể loại vì vẫn còn sản phẩm thuộc thể loại này!","error");
				redirect('index.php');
			}
			else
			{
				message("Đã xóa thể loại!","success");
				redirect('index.php');
			}
	}
?>