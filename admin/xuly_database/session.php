<?php
session_start();
	
	function logged_in() {
		return isset($_SESSION['U_id']);
	}

	function confirm_logged_in() {
		if (!logged_in()) {?>
			<script type="text/javascript">
				window.location = "login.php";
			</script>
		<?php
		}
  }
  
function admin_confirm_logged_in() {
		if (@!$_SESSION['U_id']) {?>
			<script type="text/javascript">
				window.location ="login.php";
			</script>

		<?php
		}
	}

	function message($msg="", $msgtype="") {
	  if(!empty($msg)) {
	    $_SESSION['message'] = $msg;
	    $_SESSION['msgtype'] = $msgtype;
	  } else {
			return $message;
	  }
  }
  
		function check_message(){
    if(isset($_SESSION['message'])){
      if(isset($_SESSION['msgtype'])){
        if ($_SESSION['msgtype']=="info"){
          echo  '<label class="alert alert-info" style="width:100%;padding:5px;">'. $_SESSION['message'] . '</label>';
           
        }elseif($_SESSION['msgtype']=="error"){
          echo  '<label class="alert alert-danger" style="width:100%;padding:5px;">' . $_SESSION['message'] . '</label>';
                  
        }elseif($_SESSION['msgtype']=="success"){
          echo  '<label class="alert alert-success" style="width:100%;padding:5px;">' . $_SESSION['message'] . '</label>';
        } 
        unset($_SESSION['message']);
        unset($_SESSION['msgtype']);
        }
    }
 }

function cusmsg($num=""){
  if(!empty($num)){
    $_SESSION['gcNotify'] = $num;
  }else{
    return $gcNotify;
  }
}

function notifycheck(){
  if(isset($_SESSION['gcNotify'])){
      echo $_SESSION['gcNotify'];
  }else{
      echo "";
  }
  unset($_SESSION['gcNotify']);
}


 function keyactive($key=""){
 	 if(!empty($key)) {
	    $_SESSION['active'] = $key; 
	  } else {
			return $keyactive;
	  }
 }

 function check_active(){
 	 if(isset($_SESSION['active'])){
         switch ($_SESSION['active']) {

        case 'basicInfo' :
        $_SESSION['basicInfo']   = "active";
        break;
        case 'otherInfo' :
        $_SESSION['otherInfo']= 'active';
        break;
        
        case 'work' :
        $_SESSION['work'] = 'active' ;
        break;
      }
      }else{

      	  $active = (isset($_GET['active']) && $_GET['active'] != '') ? $_GET['active'] : '';
                 switch ($active) {

                  case 'otherInfo' :
                   $_SESSION['otherInfo']= 'active';
        			break;

                  case 'work' :
                   $_SESSION['work'] = 'active' ;
       				 break;

                  default :

                    $_SESSION['basicInfo']   = "active";
       			 break;
      }
  }
}

?>
