<?php 
require_once 'xuly_database/initialize.php';

@session_start();

unset( $_SESSION['U_id'] );
unset( $_SESSION['U_name'] );
unset( $_SESSION['username'] );
unset( $_SESSION['pass'] );
unset( $_SESSION['role'] ); 

redirect(web_root."admin/login.php?logout=1");
?>