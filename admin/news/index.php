<?php
require_once("../xuly_database/initialize.php");
if(!isset($_SESSION['U_id'])){
	redirect(web_root."admin/index.php");
}
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	$header=$view;
	$title="Quản lý tin tức"; 
	switch ($view) {

	case 'list' :
	 
		$content    = 'list.php';		
		break;

	case 'add' : 
		$content    = 'add.php';		
		break;

	case 'edit' : 
		$content    = 'edit.php';		
		break;


  	default :
	$title="Quản lý tin tức";
		$content    = 'list.php';
	}


   
 
require_once ("../giaodien.php");
?>
  
