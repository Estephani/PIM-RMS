<?php require_once('../Connections/dbmrov.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addMother")) {
  $insertSQL = sprintf("INSERT INTO family (famLname, famMname, famFname, famRelationship, famExtName, famMaidenName, famBday, famDateModified, perId) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['famLname'], "text"),
                       GetSQLValueString($_POST['famMname'], "text"),
                       GetSQLValueString($_POST['famFname'], "text"),
                       GetSQLValueString($_POST['famRelationship'], "text"),
                       GetSQLValueString($_POST['famExtName'], "text"),
                       GetSQLValueString($_POST['famMaidenname'], "text"),
					   GetSQLValueString($_POST['famBday'], "date"),
                       GetSQLValueString($_POST['famDateModified'], "date"),
                       GetSQLValueString($_POST['perId'], "int"));

  mysql_select_db($database_dbmrov, $dbmrov);
  $Result1 = mysql_query($insertSQL, $dbmrov) or die(mysql_error());

  $insertGoTo = "dbmPIMFamily.php?perId=" . $row_Recordset1['perId'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "AddFather")) {
  $insertSQL = sprintf("INSERT INTO family (famLname, famMname, famFname, famRelationship, famExtName,famBday, famDateModified, perId) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['famLname'], "text"),
                       GetSQLValueString($_POST['famMname'], "text"),
                       GetSQLValueString($_POST['famFname'], "text"),
                       GetSQLValueString($_POST['famRelationship'], "text"),
                       GetSQLValueString($_POST['famExtName'], "text"),
					   GetSQLValueString($_POST['famBday'], "date"),
                       GetSQLValueString($_POST['famDateModified'], "date"),
                       GetSQLValueString($_POST['perId'], "int"));

  mysql_select_db($database_dbmrov, $dbmrov);
  $Result1 = mysql_query($insertSQL, $dbmrov) or die(mysql_error());

  $insertGoTo = "dbmPIMFamily.php?perId=" . $row_Recordset1['perId'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "AddSpouse")) {
  $insertSQL = sprintf("INSERT INTO family (famLname, famMname, famFname, famRelationship, famExtName, famOccupation, famEmployer, famBussAddress, famTelNo, famBday, famDateModified, perId) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['famLname'], "text"),
                       GetSQLValueString($_POST['famMname'], "text"),
                       GetSQLValueString($_POST['famFname'], "text"),
                       GetSQLValueString($_POST['famRelationship'], "text"),
                       GetSQLValueString($_POST['famExtName'], "text"),
                       GetSQLValueString($_POST['famOccupation'], "text"),
                       GetSQLValueString($_POST['famEmployer'], "text"),
                       GetSQLValueString($_POST['famBussAddress'], "text"),
                       GetSQLValueString($_POST['famTelNo'], "text"),
                       GetSQLValueString($_POST['famBday'], "date"),
                       GetSQLValueString($_POST['famDateModified'], "date"),
                       GetSQLValueString($_POST['perId'], "int"));

  mysql_select_db($database_dbmrov, $dbmrov);
  $Result1 = mysql_query($insertSQL, $dbmrov) or die(mysql_error());

  $insertGoTo = "dbmPIMFamily.php?perId=" . $row_Recordset1['perId'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "AddChild")) {
  $insertSQL = sprintf("INSERT INTO family (famLname, famMname, famFname, famRelationship, famExtName, famBday, famDateModified, perId) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['famLname'], "text"),
                       GetSQLValueString($_POST['famMname'], "text"),
                       GetSQLValueString($_POST['famFname'], "text"),
                       GetSQLValueString($_POST['famRelationship'], "text"),
                       GetSQLValueString($_POST['famExtName'], "text"),
                       GetSQLValueString($_POST['famBday'], "date"),
                       GetSQLValueString($_POST['famDateModified'], "date"),
                       GetSQLValueString($_POST['perId'], "int"));

  mysql_select_db($database_dbmrov, $dbmrov);
  $Result1 = mysql_query($insertSQL, $dbmrov) or die(mysql_error());

  $insertGoTo = "dbmPIMFamily.php?perId=" . $row_Recordset1['perId'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['perId'])) {
  $colname_Recordset1 = $_GET['perId'];
}
mysql_select_db($database_dbmrov, $dbmrov);
$query_Recordset1 = sprintf("SELECT * FROM personnel WHERE perId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $dbmrov) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 @session_start(); 
if($_SESSION['username']==''){
header('location:dbmLoginPIM.php');
}
?>

<?php
$conn = new mysqli('localhost', 'root', '', 'dbmrov_db') 
or die ('Cannot connect to db');
?>
<!DOCTYPE html>
<html lang="en">
<style>
.img-circular{
 width: 200px;
 height: 200px;
 background-size:cover;
 display: block;
 border-radius: 100px;
 -webkit-border-radius: 100px;
 -moz-border-radius: 100px;
 border:thick;
 position:center;
 margin-left: 13%;
}
 .img-circulars{
 width: 160px;
 height: 150px;
 background-size:cover;
 display: block;
 border-radius: 100px;
 -webkit-border-radius: 100px;
 -moz-border-radius: 100px;
 border:thick; 
 }
#mywarning{
display:none;
position: fixed;
left: 0;
top: 0;
width: 100%;
height: 100%;
text-align: center;
z-index: 1000;
background-color: rgba(0,0,0, .3); 
}

#mywarning div{   
width: 500px;
margin: 200px auto;
background: #fff;    
padding: 0px;
text-align: left;
overflow: hidden;
}
#myalert{
display:none;
position: fixed;
overflow: auto;
left: 0;
top: 0;
width: 100%;
height: 100%;
text-align: center;
z-index: 90;
background-color: rgba(0,0,0, .8); 
 
}

#myalert div{   
width: 700px;
margin: 30px auto;
background: #fff;    
padding: 3px;
text-align: left;
overflow: hidden;
-webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}
#header {
    padding: 2px 16px;
    background: #333;
    color: black;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
}

@-webkit-keyframes animatetop {
    from {top: -300px; opacity: 0} 
    to {top: 0; opacity: 0}
}

@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 0}
	
}
</style>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
		<link type="text/css" href="css/styleLink.css" rel='stylesheet'>
	<script src="sweetalert-master/dist/sweetalert.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

</head>
<body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                 <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="dbmIndexPIM.php"><img src="images/logo.png" class="nav-avatar" /> DBM-ROV</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                         <!--<ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                       <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form> -->
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                             <li><?php
								$perId01=$_SESSION['pid'];
								$query01 = "SELECT * FROM personnel where personnel.PerId='$perId01'";
								$result01= mysql_query($query01);	
								while($row01 = mysql_fetch_assoc($result01)) { 
								$per01=$row01['perId'];
								?>
								<a href="dbmSeenNotif.php?perId=<?php echo $per01; ?>"><i class="icon-exclamation-sign"></i>   Notification  &nbsp;	<?php } ?>
								<?php	$query0 = "SELECT *	FROM personnel_update where personnel_update.seen='No'";
								$result0= mysql_query($query0);	
								$count=0;
								while($row0 = mysql_fetch_assoc($result0)) { 
								$count=$count+1;
								}  
								if($count!=0){
									echo '<b class="label pull-right" style="background-color: red;">'.$count.'</b>';
								}
								 ?></a></li> 
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user - Copy.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <!-- <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li> -->
									<li class="nav-header">HR Admin :</li>
									<li ><?php 
									$f=$_SESSION['fname'];
									$l=$_SESSION['lname'];
									echo '<div align="center"> '.$f.' '.$l.' </div>' ?></li>
									 <li><a href="#" ><div class="menu-icon icon-cog">&nbsp; Account Setting</div></a></li>
									 <li><a href="#" ><div class="menu-icon icon-cog">&nbsp; Review User Acct</div></a></li>
                                    <li class="divider"></li>
                                     <li><a href="logoutPimAdmin.php" ><div class="menu-icon icon-signout">&nbsp; Logout</div></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
<div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="span3">
        <div class="sidebar">
          <ul class="widget widget-menu unstyled" style="background-color:#333">
            
            <?php 										
									$accountid=$_SESSION['aid'];
									$pertid=$_SESSION['pid'];
									$query0 = "SELECT *	FROM account, personnel, profile_pics 
												WHERE account.accId = '$accountid'
												AND account.perId = '$pertid' 
												AND account.perId=personnel.perId 
												AND profile_pics.perId=personnel.perId";
											$result0= mysql_query($query0);	
											while($row0 = mysql_fetch_assoc($result0)) {
											$p0=$row0['perId'];
											$f0=$row0['perFname'];
											$img0=$row0['image']; 
											$type0=$row0['picType'];?>
            <?php if($img0==null){ ?>
            <li align="center" ><p></p><img class="img-circular" src="images/user - Copy.png" /><p></p> </li>
            
            <?php } else{ ?>
            <li align="center" style="background-color:#333" ><p></p> <img class="img-circular" src="<?php echo 'data:image/'.$type0.';base64,'.base64_encode($img0); ?>"/> <p></p></li>
            
            <?php	} ?>
            
            <li class="active"><a href="dbmPIMpersonnelVIEW.php?perId=<?php echo $p0; ?>" title="View Personnel detail"><i class="menu-icon icon-eye-open"></i>User Profile (<?php echo $f0; ?>)
              </a></li><?php	}  ?>
          </ul>
          <ul class="widget widget-menu unstyled">
            <li class="active"><a href="dbmIndexPIM.php"><i class="menu-icon icon-dashboard"></i>Home
              </a></li>
            <li><a href="dbmPIMpersonnelLIST.php"><i class="menu-icon icon-user"></i>Personnel<b class="menu-icon pull-right">
              <?php
									$query = "select * from personnel";
											$result= mysql_query($query);	
											$counter=0;
											while($row = mysql_fetch_assoc($result)) {
												$counter=$counter+1;
											} echo '('.$counter.')';
									?></b></a></li>
             <li><a href="dbmPIMNotification.php"><i class="menu-icon icon-exchange"></i>Pending<b class="label green pull-right">
                                     <?php
									$query1 = "select * from personnel_update where personnel_update.status2='Pending'";
											$result1= mysql_query($query1);	
											$counter1=0;
											while($row1 = mysql_fetch_assoc($result1)) {
												$counter1=$counter1+1;
											} echo $counter1; ?></b> </a></li>
          </ul>
          <!--/.widget-nav-->
          <ul class="widget widget-menu unstyled">
            <li><a href="dbmLeaveAppList.php"><i class="menu-icon icon-briefcase"></i> Leave Application </a></li>
            <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>201 File </a></li>
          </ul>
          <!--/.widget-nav-->
          <ul class="widget widget-menu unstyled">
            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
              </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
              </i>Requirements (201 file)</a>
              <ul id="togglePages" class="collapse unstyled">
                <li><a href="other-login.html"><i class="icon-inbox"></i>Appointment </a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Assumption to Duty </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Leave Balances</a></li>
                <li><a href="other-login.html"><i class="icon-inbox"></i>Clearance</a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Contract Services </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Eligibilities </a></li>
                <li><a href="other-login.html"><i class="icon-inbox"></i>Diplomas, Commendations & Awards</a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Disciplinary Actions</a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Marriage Contract</a></li>
                <li><a href="other-login.html"><i class="icon-inbox"></i>Designations</a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Medical Certificates</a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>NBI Clearance</a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Notices </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Oaths </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>PDF </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>PDS </a></li>
              </ul>
            </li>
            <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
          </ul>
        </div>
        <!--/.sidebar-->
      </div>
      <!--/.span3--> 
      <div class="span9">
        <div class="content">
          <div class="module">
            <table bgcolor="#333" width="100%">
              <tr>
                <td bgcolor="#333" width="13%"><h3> <img src="images/logo.png" height="70px" width="70px;" style="margin-top: 10px; margin-bottom: 10px; margin-left: 30px;  "></h3></td>
                <td bgcolor="#333" width="71%" align="left"><div><strong><font color="white">Department of Budget and Management</font></strong></div>
                  <div>Regional Office V</div>
                  <div>Legazpi City</div></td>
                <td bgcolor="#333"><img src="images/pimlogo.png" height="70px" width="70px;" style="margin-top: 10px; margin-bottom: 10px; margin-left: 30px; "></td>
              </tr>
              <tr>
                <td colspan="3"><h3></td>
              </tr>
            </table>
            <div class="module-body">
              <div class="profile-head media">
                <?php 
											$Per1=mysql_real_escape_string($_GET['perId']);
											$query = "select * from personnel, profile_pics where personnel.perId=$Per1 and profile_pics.perId=personnel.perId";
											$result= mysql_query($query);	
											while($row = mysql_fetch_assoc($result)) {
											$persid=$row['perId'];
											$first=$row['perFname'];
											$middle=$row['perMname'];
											$last=$row['perLname'];
											$ext=$row['perExtName'];
											$position=$row['perPosition'];
											$tel=$row['perTelno'];
											$mob=$row['perMobileNo'];
											$em=$row['perEmail'];
											$img=$row['image'];
											$type=$row['picType'];
											
									?>
                <?php if($img==null){ ?>
                <img class="img-circulars pull-left"  src="images/user - Copy.png">
                <?php } else{ ?>
                <img class="img-circulars pull-left" src="<?php echo 'data:image/'.$type.';base64,'.base64_encode($img); ?>" width="200" height="200"/>
                <?php	}?>
                <div class="media-body">
                  <h4>
                    <?php
					echo $first.' '.$middle.' '.$last.' '.$ext.''; ?>
                  </h4>
                  <div class="profile-brief"> <strong> <?php  
					$queryPos="select * from positions where positions.posId='$position'";
					$resultPos= mysql_query($queryPos);	
					 while($rowpos = mysql_fetch_assoc($resultPos)) { 	
					 $posname=$rowpos['posName'];
					 echo $posname;
					 } 
					 ?></strong></div>
                  <div class="profile-brief">
                    <?php if($tel!=NULL){
											  echo ' <strong>  Tel. No :</strong> '.$tel.' - ';
										  }
										  if($mob!=NULL){
											  echo ' <strong>  Mobile No :</strong> '.$mob.' - ';
										  }
										  if($em!=NULL){
											  echo ' <strong> Email No :</strong> '.$em.' ';
										  }
										  ?>
                    </strong></div>
                  <div class="profile-brief"> Department of Budget and Management </div>
                  <div class="profile-brief"> Regional Office V </div>
                  <div class="profile-brief"> Legazpi City </div>
                  <div class="profile-details muted">
                    <form name="formprofile" method="POST" action="">
                      <button class="btn" name="profile" id="profile"><i class="icon-plus shaded"></i> Change Profile Picture</button>
                    </form>
                    <?php
						$display="block";
						if(isset($_POST['profile'])){ ?>
                    <div id="myalert"  style="display:<?php echo $display ?>;">
                      <div id="header">
                        <form action="dbmPIMFamily.php?perId=<?php echo $persid;?>" method="post">
                          <button type="submit" class="close">&times;&nbsp;&nbsp;&nbsp;</button>
                        </form>
                        <p>&nbsp;</p>
                        <center>
                          <h2 class="modal-title"><b> &nbsp;Change Profile Picture</b></h2>
                        </center>
                        <hr>
                        <form id="uploadform"  action ="dbmpicture.php" method="post" enctype="multipart/form-data">
                          <table  width="100%" width="100%">
                          <tr>
                            <td align="center" colspan=3 bgcolor="black" ><font color="white">Current Profile Picture</font></td>
                          </tr>
                          <tr>
                            <td colspan=3 ><p>&nbsp;</p></td>
                          </tr>
                          <tr>
                            <td align="center" colspan=3><?php if($img==null){ ?>
                              <img class="img-circulars" align="center" src="images/user - Copy.png">
                              <?php } else{ ?>
                              <img class="img-circulars" src="<?php echo 'data:image/'.$type.';base64,'.base64_encode($img); ?>" width="200" height="200"/>
                              <?php }
													?></td>
                          </tr>
                          <tr>
                            <td colspan=3 ><p>&nbsp;</p></td>
                          </tr>
                          <tr>
                            <td bgcolor="grey" ><input type="hidden" name="perId" id="perId" value="<?php echo $persid ?>" /></td>
                            <td bgcolor="grey"><input class="btn btn-large btn-inverse" type="file" name="file_img" id="file_img" value=" " required/></td>
                            <td bgcolor="grey" ><input type="submit" name="btn_upload" id="btn_upload" value="upload" class="btn btn-large btn-inverse"></td>
                          </tr>
                          <tr>
                            <td align="center" colspan=3 bgcolor="black"><p>&nbsp;</p></td>
                          </tr>
                          </table>
                        </form>
                      </div>
                    </div>
                    <?php  } ?>
                  </div>
                </div>
               
              </div>
              <ul class="profile-tab nav nav-tabs">
               <li ><a href="dbmPIMpersonnelView.php?perId=<?php echo $persid; ?>" >Personal</a></li>
                <li class="active"><a href="dbmPIMFamily.php?perId=<?php echo $persid; ?>" >Family </a></li>
				<li><a href="dbmPIMAddress.php?perId=<?php echo $persid; ?>">Address</a></li>
                <li><a href="dbmPIMEducation.php?perId=<?php echo $persid; ?>">Education</a></li>
				<li><a href="dbmPIMEligibility.php?perId=<?php echo $persid; ?>">Eligibility</a></li>
				<li><a href="dbmPIMWork.php?perId=<?php echo $persid; ?>">Work Experience</a></li>
              </ul>
			  
             
			 		
									<table width="100%">
									<tbody>
										<tr class="heading" >
											<td class="cell-icon" colspan=5 align="left"><?php
					echo "<strong>".$first." 's Family Background</strong>"; ?></td>
											
										</tr>
									</tbody>
								</table> <?php } ?>
								<p></p>
									<table align="center" class="table table-striped table-bordered table-condensed">
										<tbody>
										<tr>
											<td><h4>Mother</h4></td>
										</tr>
										<tr>
										<td>
										<table align="center" class="table table-striped table-bordered table-condensed">
												<tr>

											 <?php 
											$perIdm=$row_Recordset1['perId'];
											$querym = "select * from family where family.perId=$perIdm and family.famRelationship='Mother'";
											$resultm= mysql_query($querym);	
											$countm=0;
											while($rowm = mysql_fetch_assoc($resultm)) {
											$countm=$countm+1;
											$fname=$rowm['famFname'];
											$mname=$rowm['famMname'];
											$Bday=$rowm['famBday'];
											$lname=$rowm['famLname'];
											$Maidenname=$rowm['famMaidenName'];
											$ext=$rowm['famExtName'];
											$bday=$rowm['famBday'];
											$relation=$rowm['famRelationship'];
											$badd=$rowm['famBussAddress'];
											$employ=$rowm['famEmployer'];
											$occu=$rowm['famOccupation'];
											$telno=$rowm['famTelNo'];?>
											
											<td ><?php echo '<div><strong> Name : </strong>'.$fname.' '.$mname.' '.$lname.' '.$ext.'</div>';
													if ($Maidenname!=NULL){
														echo '<div><strong> Maiden Name : </strong>'.$Maidenname.'</div>';
													}
													echo '<div><strong> Birthday :</strong>'.$Bday.'</div>';
													?></td>
												
											<td width="10%"><button class="btn btn-mini btn-primary">Update</button></td>
										</tr>
											<?php } ?>
										<?php if ($countm==0){?>
										<tr>
											<td colspan=3><div align="center">NO RECORD FOUND</div>
											<div align="center"><form method="post" action=" "><button name="btnMother" id="btnMother" class="btn btn-large btn-info">Add <i class="icon-plus"></i></button></form></div>
											</td>
										</tr>
										<?php } ?>
											</table>
										  </td>
										</tr>
										</tbody>
									</table>
										</td>
										</tr>
									</table>		
										
								<?php if(isset($_POST['btnMother'])){ ?>
										<div id="myalert"  style="display:<?php echo $display ?>;">
										  <div id="header">
											<form action="dbmPIMFamily.php?perId=<?php echo $perIdm; ?>" method="post">
											  <button type="submit" class="close">&times;&nbsp;&nbsp;&nbsp;</button>
											</form>
											<p>&nbsp;</p>
											<center>
											  <h3 class="modal-title"><b> &nbsp;Mother</b></h3>
											</center>
											<hr>
											<center>
                                              <form action="<?php echo $editFormAction; ?>" name="addMother" method="POST">
                                              <table align="center" width="100%" border=0>
                                                <tr align="center" >
                                                  <td >Firstname : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    <input type="text" placeholder="Required..." name="famFname" id="famFname" class="span3" required>
                                                    <input type="hidden" placeholder="Required..." name="famRelationship" id="famRelationship" value="Mother">
                                                  
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td>Middlename :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famMname" id="famMname"  class="span3" required>
                                                
                                                  </td>
                                                </tr>
                                                <tr align="center">
                                                  <td>Lastname : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famLname" id="famLname" class="span3" required>
                                                
                                                </tr>
                                                <tr  align="center">
                                                  <td>Extension Name :
                                                    <input type="text" placeholder="If Applicable..." name="famExtName" id="famExtName" class="span3" >
                                               
                                                </tr>
                                                <tr align="center">
                                                  <td>Maiden Name : &nbsp;&nbsp;&nbsp;
                                                    <input placeholder=" If Applicable..." class="span3" type="text" min="0" id="famMaidenname" name="famMaidenname"  /></td>
                                                </tr>
												<tr align="center">
                                                  <td>Birthday : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="span3" type="date" id="famBday" name="famBday"  /></td>
                                                </tr>
                                                <tr align="center">
                                                
                                                  <td><input name="famDateModified" id="famDateModified" type="hidden" value="<?php echo date('Y-m-d'); ?>">
                                                    <input name="perId" id="perId" type="hidden" value="<?php echo $row_Recordset1['perId']; ?>">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="fambtn"type="submit" value="Add To Family" class="btn btn-large btn-inverse pull-center"></td>
                                                </tr>
                                                <tr align="center">
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </table>
											<input type="hidden" name="MM_insert" value="addMother">
												</form>
												<p></p>
											</center>
											  </div>
												</div>
											<?php } ?>
											
											
											
								<!-------father -->			
										
									<table align="center" class="table table-striped table-bordered table-condensed">
										<tbody>
										<tr>
											<td><h4>Father</h4></td>
										</tr>
										<tr>
										<td>
										<table align="center" class="table table-striped table-bordered table-condensed">
												<tr>

											 <?php 
											$perIdm=$row_Recordset1['perId'];
											$querym = "select * from family where family.perId=$perIdm and family.famRelationship='Father'";
											$resultm= mysql_query($querym);	
											$countm=0;
											while($rowm = mysql_fetch_assoc($resultm)) {
											$countm=$countm+1;
											$fname=$rowm['famFname'];
											$mname=$rowm['famMname'];
											$lname=$rowm['famLname'];
											$Maidenname=$rowm['famMaidenName'];
											$ext=$rowm['famExtName'];
											$bday=$rowm['famBday'];
											$relation=$rowm['famRelationship'];
											$badd=$rowm['famBussAddress'];
											$employ=$rowm['famEmployer'];
											$occu=$rowm['famOccupation'];
											$telno=$rowm['famTelNo'];?>
											
											<td ><?php echo '<div><strong> Name : </strong>'.$fname.' '.$mname.' '.$lname.' '.$ext.'</div>';
													echo '<div><strong> Birthday : </strong>'.$bday.'</div>';
													?></td>
												
											<td width="10%"><button class="btn btn-mini btn-primary">Update</button></td>
										</tr>
											<?php } ?>
										<?php if ($countm==0){?>
										<tr>
											<td colspan=3><div align="center">NO RECORD FOUND</div>
											<div align="center"><form method="post" action=" "><button name="btnFather" id="btnFather" class="btn btn-large btn-info">Add <i class="icon-plus"></i></button></form></div>
											</td>
										</tr>
										<?php } ?>
											</table>
										  </td>
										</tr>
										</tbody>
									</table>
										</td>
										</tr>
									</table>		
										
								<?php if(isset($_POST['btnFather'])){ ?>
										<div id="myalert"  style="display:<?php echo $display ?>;">
										  <div id="header">
											<form action="dbmPIMFamily.php?perId=<?php echo $perIdm; ?>" method="post">
											  <button type="submit" class="close">&times;&nbsp;&nbsp;&nbsp;</button>
											</form>
											<p>&nbsp;</p>
											<center>
											  <h3 class="modal-title"><b> &nbsp;Father</b></h3>
											</center>
											<hr>
											<center>
                                              <form action="<?php echo $editFormAction; ?>" name="AddFather" method="POST">
                                              <table align="center" width="100%" border=0>
                                                <tr align="center" >
                                                  <td >Firstname : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famFname" id="famFname" class="span3" required>
                                                    <input type="hidden" placeholder="Required..." name="famRelationship" id="famRelationship" value="Father">
                                                  
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td>Middlename : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famMname" id="famMname"  class="span3" required>
                                                 
                                                </tr>
                                                <tr align="center">
                                                  <td>Lastname : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famLname" id="famLname" class="span3" required>
													
                                                  
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td>Extension Name : 
                                                    <input type="text" placeholder="If Applicable..." name="famExtName" id="famExtName" class="span3" >
                                                  </td>
												   <tr  align="center">
                                                  <td>Birthday : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="date" placeholder="If Applicable..." name="famBday" id="famBday" class="span3" >
                                                 
                                                  </td>
                                                </tr>
                                                <tr align="center">
                                                  
                                                  <td><input name="famDateModified" id="famDateModified" type="hidden" value="<?php echo date('Y-m-d'); ?>">
                                                    <input name="perId" id="perId" type="hidden" value="<?php echo $row_Recordset1['perId']; ?>">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="fambtn"type="submit" value="Add to Family" class="btn btn-large btn-inverse pull-center"></td>
                                                </tr>
                                             
                                                <tr align="center">
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </table>
                                              <input type="hidden" name="MM_insert" value="AddFather">
                                              
                                              </form>
												<p></p>
											</center>
											  </div>
												</div>
											<?php } ?>		
											
											
											
			 
			 
			 
			 <table align="center" class="table table-striped table-bordered table-condensed">
										<tbody>
										<tr>
											<td><h4>Spouse</h4></td>
										</tr>
										<tr>
										<td>
										<table align="center" class="table table-striped table-bordered table-condensed">
												<tr>

											 <?php 
											$perIdm=$row_Recordset1['perId'];
											$querym = "select * from family where family.perId=$perIdm and family.famRelationship='Spouse'";
											$resultm= mysql_query($querym);	
											$countm=0;
											while($rowm = mysql_fetch_assoc($resultm)) {
											$countm=$countm+1;
											$fname=$rowm['famFname'];
											$mname=$rowm['famMname'];
											$lname=$rowm['famLname'];
											$Maidenname=$rowm['famMaidenName'];
											$ext=$rowm['famExtName'];
											$bday=$rowm['famBday'];
											$relation=$rowm['famRelationship'];
											$badd=$rowm['famBussAddress'];
											$employ=$rowm['famEmployer'];
											$occu=$rowm['famOccupation'];
											$telno=$rowm['famTelNo'];?>
											
											<td ><?php echo '<div> Name : '.$fname.' '.$mname.' '.$lname.' '.$ext.'</div>';
													?></td>
											<td width="50%"><?php if(($occu==null)||($occu==' ')){
												echo '<div>Occupation : N/A </div>';
												}else {
													echo '<div>Occupation : '.$occu.'</div>';
												} if(($employ==null)||($employ==' ')){
												echo '<div>Employer : N/A </div>';
												}else {
													echo '<div>Employer :'.$employ.'</div>';
												} if(($badd==null)||($badd==' ')){
												echo '<div>Business Address : N/A </div>';
												}else {
													echo '<div>Business Address : '.$badd.'</div>';
												} if(($telno==null)||($telno==' ')){
												echo '<div>Telephone No : N/A </div>';
												}else {
													echo '<div>Telephone No : '.$telno.'</div>';
												}
											?></td>	
											<td width="10%"><button class="btn btn-mini btn-primary">Update</button></td>
										</tr>
											<?php } ?>
										<?php if ($countm==0){?>
										<tr>
											<td colspan=3><div align="center">NO RECORD FOUND</div>
											<div align="center"><form method="post" action=" "><button name="btnSpouse" id="btnSpouse" class="btn btn-large btn-info">Add <i class="icon-plus"></i></button></form></div>
											</td>
										</tr>
										<?php } ?>
											</table>
										  </td>
										</tr>
										</tbody>
									</table>
										</td>
										</tr>
									</table>		
										
								<?php if(isset($_POST['btnSpouse'])){ ?>
										<div id="myalert"  style="display:<?php echo $display ?>;">
										  <div id="header">
											<form action="dbmPIMFamily.php?perId=<?php echo $perIdm; ?>" method="post">
											  <button type="submit" class="close">&times;&nbsp;&nbsp;&nbsp;</button>
											</form>
											<p>&nbsp;</p>
											<center>
											  <h3 class="modal-title"><b> &nbsp;Spouse</b></h3>
											</center>
											<hr>
											<center>
                                              <form action="<?php echo $editFormAction; ?>" name="AddSpouse" method="POST">
                                              <table align="center" width="100%" border=0>
                                                <tr align="center" >
                                                  <td ><label  for="famFname">Firstname</label>
                                                    <input type="text" placeholder="Required..." name="famFname" id="famFname" class="span3" required>
                                                    <input type="hidden" placeholder="Required..." name="famRelationship" id="famRelationship" value="Spouse">
                                                  <td><label  for="famBday">Birthday</label>
                                                    <input type="Date"  name="famBday" id="famBday" class="span3" required></td>
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td><label for="famMname">Middlename</label>
                                                    <input type="text" placeholder="Required..." name="famMname" id="famMname"  class="span3" required>
                                                  <td><label  for="famOccupation">Occupation</label>
                                                    <input placeholder=" If Applicable..." class="span3" type="text" min="0" id="famOccupation" name="famOccupation" /></td>
                                                  </td>
                                                </tr>
                                                <tr align="center">
                                                  <td><label  for="famLname">Lastname</label>
                                                    <input type="text" placeholder="Required..." name="famLname" id="famLname" class="span3" required>
													
                                                  <td><label  for="famEmployer">Employer/Business Name</label>
                                                    <input placeholder=" If Applicable..." class="span3" type="text" min="0" id="famEmployer" name="famEmployer" /></td>
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td><label for="famExtName">Extension Name</label>
                                                    <input type="text" placeholder="If Applicable..." name="famExtName" id="famExtName" class="span3" >
                                                  <td><label  for="famBussAddress">Business Address</label>
                                                    <input placeholder=" If Applicable..." class="span3" type="text" min="0" id="famBussAddress" name="famBussAddress" /></td>
                                                  </td>
                                                </tr>
                                                <tr align="center">
                                                  <td><label  for="famTelNo">Telephone No.</label>
                                                    <input placeholder=" If Applicable..." class="span3" type="text" min="0" id="famTelNo" name="famTelNo"  /></td>
                                                  <td><input name="famDateModified" id="famDateModified" type="hidden" value="<?php echo date('Y-m-d'); ?>">
                                                    <input name="perId" id="perId" type="hidden" value="<?php echo $row_Recordset1['perId']; ?>">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="fambtn"type="submit" value="Add to family" class="btn btn-large btn-inverse pull-center"></td>
                                                </tr>
                                             
                                                <tr align="center">
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </table>
                                              <input type="hidden" name="MM_insert" value="AddSpouse">

                                              </form>
												<p></p>
											</center>
											  </div>
												</div>
											<?php } ?>		
			 
			 
			 
			  <table align="center" class="table table-striped table-bordered table-condensed">
										<tbody>
										<tr>
											<td><h4>Children</h4></td>
										</tr>
										<tr>
										<td>
										<table align="center" class="table table-striped table-bordered table-condensed">
												<tr>

											 <?php 
											$perIdm=$row_Recordset1['perId'];
											$querym = "select * from family where family.perId=$perIdm and family.famRelationship='Children'";
											$resultm= mysql_query($querym);	
											$countm=0;
											while($rowm = mysql_fetch_assoc($resultm)) {
											$countm=$countm+1;
											$fname=$rowm['famFname'];
											$mname=$rowm['famMname'];
											$lname=$rowm['famLname'];
											$Maidenname=$rowm['famMaidenName'];
											$ext=$rowm['famExtName'];
											$bday=$rowm['famBday'];
											$relation=$rowm['famRelationship'];
											$badd=$rowm['famBussAddress'];
											$employ=$rowm['famEmployer'];
											$occu=$rowm['famOccupation'];
											$telno=$rowm['famTelNo'];?>
											
											<td ><?php echo '<div> Name : '.$fname.' '.$mname.' '.$lname.' '.$ext.'</div>';
														echo '<div> Birthday : '.$bday.'</div>';
													?>
													</td>
											<td width="10%"><button class="btn btn-mini btn-primary">Update</button></td>
										</tr>
											<?php } ?>
										<?php if ($countm==0){?>
										<tr>
											<td colspan=3><div align="center">NO RECORD FOUND</div>
											<div align="center"><form method="post" action=" "><button name="btnChild" id="btnChild" class="btn btn-large btn-info">Add <i class="icon-plus"></i></button></form></div>
											</td>
										</tr>
										<?php } else{ ?>
											<tr>
											<td colspan=3>
											<div align="center"><form method="post" action=" "><button name="btnChild" id="btnChild" class="btn btn-large btn-info">Add <i class="icon-plus"></i></button></form></div>
											</td>
										</tr>
										<?php } ?>
										
											</table>
										  </td>
										</tr>
										</tbody>
									</table>
										</td>
										</tr>
									</table>		
										
								<?php if(isset($_POST['btnChild'])){ ?>
										<div id="myalert"  style="display:<?php echo $display ?>;">
										  <div id="header">
											<form action="dbmPIMFamily.php?perId=<?php echo $perIdm; ?>" method="post">
											  <button type="submit" class="close">&times;&nbsp;&nbsp;&nbsp;</button>
											</form>
											<p>&nbsp;</p>
											<center>
											  <h3 class="modal-title"><b> &nbsp;Children</b></h3>
											</center>
											<hr>
											<center>
                                              <form action="<?php echo $editFormAction; ?>" name="AddChild" method="POST">
                                              <table align="center" width="100%" border=0>
                                                <tr align="center" >
                                                  <td >Firstname : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famFname" id="famFname" class="span3" required>
                                                    <input type="hidden" placeholder="Required..." name="famRelationship" id="famRelationship" value="Children">
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td>Middlename : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famMname" id="famMname"  class="span3" required>
                                                 
                                                  </td>
                                                </tr>
                                                <tr align="center">
                                                  <td>Lastname : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" placeholder="Required..." name="famLname" id="famLname" class="span3" required>
                                                 
                                                  </td>
                                                </tr>
                                                <tr  align="center">
                                                  <td>Extension Name : 
                                                    <input type="text" placeholder="If Applicable..." name="famExtName" id="famExtName" class="span3" >
                                                  </td>
                                                </tr>
                                                <tr align="center">
                                                 <td>Birthday : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="Date"  name="famBday" id="famBday" class="span3" required></td>
                                                </tr>
                                                <tr align="center">
                                                   <td><input name="famDateModified" id="famDateModified" type="hidden" value="<?php echo date('Y-m-d'); ?>">
                                                    <input name="perId" id="perId" type="hidden" value="<?php echo $row_Recordset1['perId']; ?>">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="fambtn"type="submit" value="Add to family" class="btn btn-large btn-inverse pull-center"></td>
                                                </tr>
                                              </table>
                                              <input type="hidden" name="MM_insert" value="AddChild">
                                              </form>
												<p></p>
											</center>
											  </div>
												</div>
											<?php } ?>		
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			
			 
			 
			 
			 </div>
			 
          </div>
          <!--/.module-->
        </div>
        <!--/.content-->
      </div>
      <!--/.span9-->
    </div>
  </div>
  </div>
          <!--/.container-->
        <!--/.wrapper-->
        <div class="footer" style="background-color:white;">
           <div class="container" >
			<b class="copyright">&copy; 2017 Department of Budget and Management Regional Office V</b> - All rights reserved.
		</div>
		</div>

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

<?php
mysql_free_result($Recordset1);
?>
