<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title;?></title>
<link href="<?php echo web_root; ?>admin/source/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/source/css/metisMenu.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/source/css/timeline.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/source/css/sb-admin-2.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/source/font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo web_root; ?>admin/source/font/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo web_root; ?>admin/source/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/source/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/source/datepicker.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>admin/source/css/costum.css" rel="stylesheet">
<link href="<?php echo web_root; ?>admin/source/css/ekko-lightbox.css" rel="stylesheet">
</head>
    
<body>
   <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a style="font-size:25px" class="navbar-brand"  href="<?php echo web_root; ?>admin/index.php" >Trang quản lý danh mục NoiseCha</a>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
                 <li class="dropdown">
            <?php If($_SESSION['role']=='Administrator') {	
           
                 echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-plus fa-fw"></i> Thêm  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo web_root; ?>admin/products/index.php?view=add"><i class="fa fa-barcode  fa-fw"></i> Sản phẩm</a>
                        </li>
                        <li><a href="<?php echo web_root; ?>admin/category/index.php?view=add"><i class="fa fa-list-alt  fa-fw"></i> Thể loại</a>
                        </li>
                        </li>
                        <li><a href="<?php echo web_root; ?>admin/locations/index.php?view=add"><i class="fa fa-list-alt  fa-fw"></i> Địa chỉ</a>
                        </li>
                        <li><a href="<?php echo web_root; ?>admin/user/index.php?view=add"><i class="fa fa-user  fa-fw"></i> Tài khoản</a>
                        </li>
                    </ul>
                </li>';
            }
            ?>
<?php
 $user = New User();
$singleuser = $user->single_user($_SESSION['U_id']);

?> 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Xin chào, <b><?php echo $_SESSION['U_name']; ?></b> <img title="profile image" width="25px" height="25px" src="<?php echo web_root.'admin/user/'.$singleuser->U_image ?>">  
                    </a>
                    <ul class="dropdown-menu dropdown-acnt">
                          <div class="divpic"> 
                                <img title="profile image" width="70" height="70" src="<?php echo web_root.'admin/user/'.$singleuser->U_image ?>">  
                          </div> 
                      <div class="divtxt">
                        <li><b>&emsp; <?php echo $_SESSION['U_name']; ?> </b>
                      <?php if ($_SESSION['role']=='Administrator') {
                        echo '<li><a title="Edit" href="'.web_root.'admin/user/index.php?view=edit&id='. $_SESSION['U_id'] .'">Sửa profile</a></li>';
                       }
                        ?>
                          </li>
                           <li><a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li> 
                  </div>
                    </ul>
                </li>
            </ul> 

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                             <a href="<?php echo web_root; ?>admin/products/index.php"><i class="fa fa-coffee fa-fw"></i>  Sản phẩm </a>
           
                        </li>  
                        <li>
                             <a href="<?php echo web_root; ?>admin/category/index.php" ><i class="fa fa-list-alt fa-fw"></i>  Thể loại </a>
            
                        </li>
                        <li>
                             <a href="<?php echo web_root; ?>admin/locations/index.php" ><i class="fa fa-map-marker fa-fw"></i>  Địa chỉ </a>
            
                        </li>
                        <li>
                             <a href="<?php echo web_root; ?>admin/news/index.php" ><i class="fa fa-newspaper-o fa-fw"></i>  Tin tức </a>
            
                        </li>
                        <?php if ($_SESSION['role']=='Administrator') {
                        ?>
                        <li>
                            <a href="<?php echo web_root; ?>admin/user/index.php" ><i class="fa fa-user fa-fw"></i> Tài khoản </a>
                          
                        </li>
                 <?php }  ?>
                    </ul>
                </div>
            </div>
        </nav>
  

  <div id="page-wrapper">
            <div class="row" >
                <div class="col-lg-12"> 
                    
                    <?php 
                    if ($title<>'Dashboard'){
                       echo   '<p class="breadcrumb" style="margin-top: 8px;"> 
                        <a href="index.php" title="'. $title.'" >'. $title.'</a> 
                        '.(isset($header) ? ' / '. $header : '').'  </p>'  ;
                    } ?>
                        <?php   check_message();  ?> 
                  <?php require_once $content; ?>
                    
                </div>
            </div>
        </div>
    </div>
 
<script src="<?php echo web_root; ?>admin/source/jquery/jquery.min.js"></script>
<script src="<?php echo web_root; ?>admin/source/js/bootstrap.min.js"></script>
<script src="<?php echo web_root; ?>admin/source/js/metisMenu.min.js"></script>
<script src="<?php echo web_root; ?>admin/source/js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>admin/source/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo web_root; ?>source/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>source/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>source/js/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
<script src="<?php echo web_root; ?>admin/source/js/ekko-lightbox.js"></script>
<script src="<?php echo web_root; ?>admin/source/js/sb-admin-2.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>admin/source/js/janobe.js"></script> 

<script type="text/javascript">
  $(document).on("click", ".P_id", function () {
      var P_id = $(this).data('id')
       $(".modal-body #P_id").val( P_id )
      });
</script>

<script>
 $(document).ready(function() {
    $('#dash-table').DataTable({
                responsive: true ,
                  "sort": false
        });
    });
</script>   
</body> 
      <footer><p  style="text-align: center;font-weight: bold;">Copyright &copy; NoiseCha Team 2020 </p></footer>
</html>