<?php require_once('../Connections/dbmrov.php'); ?>
<?php @session_start(); 
if($_SESSION['username']==''){
header('location:dbmLoginPIM.php');
}
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'dbmrov_db') 
or die ('Cannot connect to db');


$seen="Seen";
$update=("UPDATE personnel_update SET seen='$seen' where personnel_update.seen='No'");
			if(mysql_query($update))
						{
							echo '';
								 
						} 
						else echo "no";		
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
 </style>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Department of budget and Management</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
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
                             <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>-->
							<li ><a href="dbmIndexPIM.php"><i class="icon-home"></i> Home </a> </li>
							<li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <!-- <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li> -->
									<li class="nav-header">Quick Links :</li>
									 <li><a href="dbmPerAdd.php" ><div class="menu-icon icon-plus">&nbsp; Add personnel</div></a></li>
									 <li><a href="dbmReports.php" ><div class="menu-icon icon-book">&nbsp; Reports</div></a></li>
                                     <li><a href="dbmLeaveAppList.php" ><div class="menu-icon icon-briefcase">&nbsp; Leave Application</div></a></li>
									  <li><a href="dbmPIMAcct.php" ><div class="menu-icon icon-cog">&nbsp; Manage User Accounts</div></a></li>
                                </ul>
                            </li>
                            <li class="active"><?php
								$perId01=$_SESSION['pid'];
								$query01 = "SELECT * FROM personnel where personnel.PerId='$perId01'";
								$result01= mysql_query($query01);	
								while($row01 = mysql_fetch_assoc($result01)) { 
								$per01=$row01['perId'];
								?>
								<!--dbmSeenNotif.php-->
								<a href="dbmPIMNotification.php?perId=<?php echo $per01; ?>"><i class="icon-exclamation-sign"></i> Notification  &nbsp;	<?php } ?>
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
									<li><a href="dbmAdminAccount.php" ><div class="menu-icon icon-cog">&nbsp; Your Account</div></a></li>
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
                            <ul class="widget widget-menu unstyled" style="background-color:#333" >
								
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
                                       <li align="center" ><p></p><img class="img-circular" src="images/user - Copy.png" /> <p></p></li>
									
									<?php } else{ ?>
                                      <li align="center" ><p></p><img align="center" class="img-circular" src="<?php echo 'data:image/'.$type0.';base64,'.base64_encode($img0); ?>"/> <p></p></li>
												
								<?php	} ?>
                                    
							 <li class="active"><a href="dbmPIMpersonnelVIEW.php?perId=<?php echo $p0; ?>" title="View Personnel detail"><i class="menu-icon icon-eye-open"></i>User Profile (<?php echo $f0; ?>)
                                </a></li><?php	}  ?>
							</ul>
							<ul class="widget widget-menu unstyled">
                               <!-- <li class="active"><a href="dbmIndexPIM.php"><i class="menu-icon icon-dashboard"></i>Home
                                </a></li>-->
								  <li><a href="dbmPIMpersonnelLIST.php"><i class="menu-icon icon-user"></i>Personnel<b class="menu-icon pull-right">
                                    <?php
									$query1 = "select * from personnel";
											$result1= mysql_query($query1);	
											$counter1=0;
											while($row1 = mysql_fetch_assoc($result1)) {
												$counter1=$counter1+1;
											} echo '('.$counter1.')';
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
                <td bgcolor="#333"></td>
              </tr>
              <tr>
                <td colspan="3"><h3></td>
              </tr>
            </table> 
						<div class="module message">
							<div class="module-head">
								<h3>Notification</h3>
							</div>
							
							<div class="module-body table">			
									<table class="table table-message">
									<tbody>
										<tr class="heading">
											<td class="cell-icon"></td>
											<td class="cell-title">Content</td>
											<td class="cell-status hidden-phone hidden-tablet">Action</td>
											<td class="cell-time align-right">Date</td>
										</tr>							
								<?php 										
									$pertid1=$_SESSION['pid'];
									$query01 = "SELECT * FROM personnel";
											$result1= mysql_query($query01);	
											while($row1 = mysql_fetch_assoc($result1)) {
											$perId=$row1['perId'];
											$perPosition=$row1['perPosition'];
											$perFname=$row1['perFname'];
											$perMname =$row1['perMname'];
											$perLname =$row1['perLname'];
											$perExtName =$row1['perExtName'];
											$perGender =$row1['perGender'];
											$perAge  =$row1['perAge'];
											$perEmail =$row1['perEmail'];
											$perBday =$row1['perBday'];
											$perBPlace =$row1['perBPlace'];
											$perMobileNo =$row1['perMobileNo'];
											$perTelno =$row1['perTelno'];
											$perHeight =$row1['perHeight'];
											$perWeight =$row1['perWeight'];
											$perBloodType =$row1['perBloodType'];
											$perBIRno =$row1['perBIRno'];
											$perAgenEmpNo =$row1['perAgenEmpNo'];
											$perGSISno =$row1['perGSISno'];
											$perPagIbigNo =$row1['perPagIbigNo'];
											$perPhilHno  =$row1['perPhilHno'];
											$perSSSno =$row1['perSSSno'];
											$perStatus  =$row1['perStatus'];
											$perTransferee  =$row1['perTransferee'];
											$perTINno  =$row1['perTINno'];
											$perAppStat   =$row1['perAppStat'];
											$divId =$row1['divId'];
											$perDateModified =$row1['perDateModified'];
											
													//$pertid1=$_SESSION['pid'];
													$query02 = "SELECT * FROM personnel_update where personnel_update.perId22='$perId' and status2!='Allowed'";
													$result2= mysql_query($query02);	
													while($row2 = mysql_fetch_assoc($result2)) {
													$perId2=$row2['perId2'];
													$perMname2=$row2['perMname2'];
													$perLname2=$row2['perLname2'];
													$perEmail2=$row2['perEmail2'];
													$perMobileNo2 =$row2['perMobileNo2'];
													$perTelno2 =$row2['perTelno2'];
													$perHeight2 =$row2['perHeight2'];
													$perWeight2 =$row2['perWeight2'];
													$perStatus2  =$row2['perStatus2'];
													$perDateModified2 =$row2['perDateModified2'];
													$perId22 =$row2['perId22'];
													$status2 =$row2['status2'];?>
										
										<tr class="task">
											<td class="cell-icon"><i class="icon-checker high"></i></td>
											<td class="cell-title"><div>
											
											<?php if ($perMname2!=$perMname){?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo '<div> '.$perFname3.' would like to change his/her Middle name ( '.$perMname.' ) to <strong class="text-error">'.$perMname2.'</strong></div>';
													} ?>
											<?php } if($perLname2!=$perLname) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo ' <div>'.$perFname3.' would like to change his/her Last name ( '.$perLname.' ) to <strong class="text-error">'.$perLname2.'</strong></div>';
													} ?>
											
											<?php } if($perEmail2!=$perEmail) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo '<div> '.$perFname3.' would like to change his/her Email Address ( '.$perEmail.' ) to <strong class="text-error">'.$perEmail2.'</strong> </div>';
													} ?>
												
												
											<?php } if($perMobileNo2!=$perMobileNo) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo ' <div> '.$perFname3.' would like to change his/her Mobile No. ( '.$perMobileNo.' ) to <strong class="text-error">'.$perMobileNo2.'</strong></div>  ';
													} ?>
											
											<?php } if($perTelno2!=$perTelno) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo ' <div> '.$perFname3.' would like to change his/her Telephone No. ( '.$perTelno.' ) to <strong class="text-error">'.$perTelno2.'</strong></div>  ';
													} ?>
											
											<?php } if($perHeight2!=$perHeight) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo ' <div> '.$perFname3.' would like to change his/her Height( '.$perHeight.' ) to <strong class="text-error">'.$perHeight2.'</strong></div> ';
													} ?>
											<?php } if($perWeight2!=$perWeight) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo '<div> '.$perFname3.' would like to change his/her Weight ( '.$perWeight.' ) to <strong class="text-error">'.$perWeight2.'</strong></div> ';
													} ?>
											
											<?php } if($perStatus2!=$perStatus) {?>
												<?php $query3 = "SELECT * FROM personnel where personnel.perId='$perId22'";
													$result3= mysql_query($query3);	
													while($row3 = mysql_fetch_assoc($result3)) {
														$perFname3=$row3['perFname'];
														echo '<div> '.$perFname3.' would like to change his/her Civil Status ( '.$perStatus.' ) to <strong class="text-error">'.$perStatus2.' </strong></div> ';
													} ?>
										
											<?php }  ?>
											</div></td>
											<td class="cell-status hidden-phone hidden-tablet">
											<p>
												<form action="dbmPIMAllowPer.php?perId=<?php echo $perId;?>&perId2=<?php echo $perId2;?>" method="post" onClick="return confirm('Allow This?')"><button class="btn btn-mini btn-primary">&nbsp;Allow</button></form> 
											</p>
											<div><form action="dbmPIMDelPerUpdate.php?perId=<?php echo $perId2;?>" method="post" onClick="return confirm('Delete This?')"><button class="btn btn-mini btn-danger">Delete</button></form></div>
											</td>
											<td class="cell-time align-right"><small><?php echo $perDateModified2; ?></small></td>
										</tr>
											
									</tbody>
									<?php } } ?>
								</table>

</div>
							</div>
							
						</div>
						
						
					</div><!--/.content-->
				</div><!--/.span9-->

                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
           <div class="container">
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
