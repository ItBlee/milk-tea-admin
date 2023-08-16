
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
		if ( $_POST['L_name'] == "" || $_POST['address'] == ""|| $_POST['city'] == ""|| $_POST['phone'] == ""|| $_POST['time_open'] == ""|| $_POST['time_close']== "") {
			$messageStats = false;
			message("Chưa nhập đầy đủ dữ liệu !","error");
			redirect('index.php?view=add');
		}else{	
			$locations = New Locations();
			$locations->L_name		= $_POST['L_name'];
			$locations->address		= $_POST['address'];
			$locations->city		= $_POST['city'];
			$locations->phone		= $_POST['phone'];
			$locations->time_open	= $_POST['time_open'];
			$locations->time_close	= $_POST['time_close'];
			$locations->create();
			message("Thêm địa chỉ [". $_POST['L_name'] ."] thành công!", "success");
			redirect("index.php");
			
		}
		}
	}

	function doEdit(){
		if(isset($_POST['save'])){
			$locations = New Locations();
			$locations->L_name		= $_POST['L_name'];
			$locations->address		= $_POST['address'];
			$locations->city		= $_POST['city'];
			$locations->phone		= $_POST['phone'];
			$locations->time_open	= $_POST['time_open'];
			$locations->time_close	= $_POST['time_close'];
			$locations->update($_POST['L_id']);
			message("[". $_POST['L_name'] ."] đã được chỉnh sửa!", "success");
			redirect("index.php");
		}
	}

	function doDelete(){
			$id = $_GET['id'];
			$locations = New Locations();
			$locations->delete($id);
			message("Đã xóa địa chỉ!","success");
			redirect('index.php');
	}
?>