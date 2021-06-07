
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Diary || Admin panel</title>

 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <link  rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 <script src="js/bootstrap.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
 <script src="js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
</head>

<body>
<!--header start-->
<div class="row logo">
<div class="col-md-6">
<h1><span style="color:#FFCA82">My&nbsp;Diary</span>&nbsp;<span style="font-size:15px; color:#fff;">Soft copy of my feeling...</span></h1>

</div>
<div class="col-md-2">
</div><div class="col-md-4">
 <?php
 include_once 'dbConnection.php';
session_start();
  if($_SESSION['key']!="sunny7785068889"){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Hello,</span> <a href="adminpanel.php?q=1" class="log log1">'.$name.'</a>&nbsp;&nbsp;|<a href="logout.php?q=adminpanel.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
</div></div>
<!--header end-->

<div class="row">
<div class="menu col-md-2"><!--menu start-->
<ul>

<li>
<div class="camenu <?php if(@$_GET['q']==1) echo 'active';?>">
<a href="adminpanel.php?q=1"><span class="glyphicon glyphicon-user caf" aria-hidden="true"></span>
<span class="cas">Users</span></a>
</div>
</li>

<li>
<div class="camenu <?php if((@$_GET['q']==2) ) echo 'active';?>">
<a href="adminpanel.php?q=2"><span class="glyphicon glyphicon-share-alt caf" aria-hidden="true"></span>
<span class="cas">shared</span></a>
</div>
</li>

<li>
<div class="camenu <?php if(@$_GET['q']==3) echo 'active';?>">
<a href="adminpanel.php?q=3"><span class="glyphicon glyphicon-star-empty caf" aria-hidden="true"></span>
<span class="cas">Feedback</span></a>
</div>
</li>

<li>
<div class="camenu">
<a href="logout.php?q=adminpanel.php"><span class="glyphicon glyphicon-log-out caf" aria-hidden="true"></span>
<span class="cas">Signout</span></a>
</div>
</li>
</ul>
</div>
<!--menu closed-->
<div class="col-md-10">
<div class="bich">
<!--content area start-->
<!--users start-->
<?php if(@$_GET['q']==1) {
$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:480px; line-height:35px;padding:5px;"><table class="table table-striped">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Age</b></td><td><b>Gender</b></td><td><b>Email</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$age = $row['age'];
	$gender = $row['gender'];
    $email = $row['email'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$email.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div>';

}?>
<!--user end-->

<!-- shared article start-->
<?php if(@$_GET['q']==2) {
$result = mysqli_query($con,"SELECT * FROM `articles` WHERE share = 1 ORDER BY `articles`.`date` DESC") or die('Error');
echo  '<div class="mCustomScrollbar area" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:480px; line-height:35px;padding:5px;"><table class="table table-striped">
<tr><td><b>S.N.</b></td><td><b>Title</b></td><td><b>Date</b></td><td><b>Time</b></td><td></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$title = $row['title'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open article" href="adminpanel.php?aid='.$id.'">'.$title.'</a></td><td>'.$date.'</td><td>'.$time.'</td>
	<td><a title="Open Article" href="adminpanel.php?aid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Get printable view" target="_blank" href="update.php?pid='.$id.'"><b><span class="glyphicon glyphicon-print" aria-hidden="true"></span></b></a></td>
	<td><a title="Delete Article" href="update.php?did='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div>';


}
?>

<!--shared article closed-->

<!--article start-->
<?php if(@$_GET['aid']) {
$id=@$_GET['aid'];
$result = mysqli_query($con,"SELECT * FROM articles WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$article = $row['article'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$mail = $row['email'];
	$result1 = mysqli_query($con,"SELECT name FROM user WHERE email='$mail' ") or die('Error');
	while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
}
echo '<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$title.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$article.'</div>';}
}?>
<!--article closed-->

<!--content area closed-->
</div>

</div>
</div><!--middle area closed-->

<!--Footer start-->
<div class="row footer">

</div>


</div>


</body>
</html>