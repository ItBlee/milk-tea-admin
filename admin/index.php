<?php 
require_once("xuly_database/initialize.php");
	 if (!isset($_SESSION['U_id'])){
      redirect(web_root."admin/login.php");
     } 

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Products";	
		$content='products/';		
		break;	
	default :
	
	redirect("products/");
}
require_once("giaodien.php");
?>