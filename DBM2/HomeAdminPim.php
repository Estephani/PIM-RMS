<?php require_once('../Connections/dbmrov.php'); ?>
<?php //@session_start(); 
//if($_SESSION['username']==''){
//header('location:dbmLoginPIM.php');
//}else{
//header('location:dbmIndexPIM.php');
//}
?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "dbmIndexPIM.php";
  $MM_redirectLoginFailed = "dbmLoginPIM.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_dbmrov, $dbmrov);
  
  $LoginRS__query=sprintf("SELECT accUsername, accPassword, accPrivilege FROM account WHERE accUsername=%s AND accPassword=%s AND accPrivilege=1",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $dbmrov) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Your log-in was unsuccessful!')
        window.location.href='dbmLoginPIM.php'
        </SCRIPT>");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<style>

.container1{
 margin:0px auto;
 width:750px;
 height:600px;
 text-align:center;
 background-color:white;
 background-size:cover;
 border:6px solid #BFBFBF;
 box-shadow:0px 0px 3px #BFBFBF;
}
.container2{
 margin:0px auto;
 width:500px;
 height:250px;
 text-align:center;
 background-color:white;
 background-size:cover;
 border:6px solid #BFBFBF;
 box-shadow:0px 0px 3px #BFBFBF;
}
 
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container" style="background-color: #FFFF; width:100%; height: 100%;">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">
						<li><a href="#">
							Forgot Password ?
						</a></li>
						<li>
							
							<ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Switch User
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="dbmLoginPIM.php">Human Resources (HR) Admin</a></li>
                                    <li><a href="dbmLoginRECORD.php">Records Admin</a></li>
                                </ul>
                            </li>
                        </ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
			<div class="container" style="background-color:#333; width:100%; height: 100%;">
			  	<p class="brand">
			     <img src="images\dbmseal.png" height="100px" width="120px;" style="margin-top: 2px; margin-left: 80px;"> 
				 <img src="images\label.png" height="100px" width="400px;" style="margin-top: 2px; margin-left: 9px;"> 
				
			  	</p>

				
			</div>
			
			
			
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper"  >
		<div class="container" >
			<div class="row" >
				<div class="container1"> 
					<img src="images/PIMS.png" height="450px" width="700px;" style="margin-top: 20px; margin-bottom: 30px; "> 
					<div class="container2"> 
					<form ACTION="<?php echo $loginFormAction; ?>" method="POST" class="form-vertical" id="loginform">
						
						<div class="module-head">
							<h3>Login as: <small>Human Resource(HR) Admin<small/></h3> 
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid"><span id="sprytextfield1">
								  <input class="span12" type="text" id="inputEmail" placeholder="Username" name="username">
							    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid"><span id="sprytextfield2">
								  <input class="span12" type="password" id="inputPassword" placeholder="Password" name="password">
							    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-large btn-inverse pull-right" name="logbtn">Login</button>
									<label class="checkbox" align="left">
										<input type="checkbox"> Remember me
									</label>
								</div>
							</div>
						</div>
						<?php
							if (isset($_POST['logbtn'])){
							$logU = $_POST['username'];
							$logP = $_POST['password'];
							$qry = mysql_query("SELECT account.accId, 
												account.perId,
												personnel.perId,
												personnel.perFname,
												personnel.perLname,
												personnel.perMname,
												personnel.perExtName,
												account.accUsername, 
												account.accPassword 	
												FROM account, personnel 
												WHERE account.accUsername = '$logU'
												AND account.accPassword = '$logP' 
												AND account.perId=personnel.perId ");
							while($row = mysql_fetch_assoc($qry)){
									$_SESSION['fname'] = $row['perFname'];
									$_SESSION['lname'] = $row['perLname'];
									$_SESSION['mname'] = $row['perMname'];
									$_SESSION['extname'] = $row['perExtName'];
									$_SESSION['username'] = $row['accUsername'];
									$_SESSION['pass'] = $row['accPassword'];
									$_SESSION['aid'] = $row['accId'];
									$_SESSION['pid'] = $row['perId'];
							}
							}
						?>                    
					</form>
				  </div>
					<p>&nbsp;</p>
					<table align="center" width="700px" >
					<tr>
					<td bgcolor="#333">&nbsp;<div align="center"></td>
					</tr>
					</table>
			  </div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2017 Department of Budget and Management Regional Office V</b> - All rights reserved.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>