<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payroll</title>
<style type="text/css">
<style type="text/css">


#wrapper { width:947px; margin:0 auto; clear:both;text-decoration-color: black;
 }
#header { width:947px; height:141px; align:center;text-decoration-color: black;
}
#menu { width:947px; height:100px; align:center;text-decoration-color: black;
}
#body {  width:947px; align:center;padding:200px;text-decoration-color: black;
 }
#bodyfooter {  width:947px; height:42px; align:center;text-decoration-color: black;
 }
#footer { width:947px; height:111px; align:center;text-decoration-color: black;
}
.menu{ float:right; margin-top:91px; margin-right:42px; clear:both; }
.menu ul li a {
	font-size:16px;
	text-decoration:none;
	color:#000;
	font-family:Tahoma, Geneva, sans-serif, cursive;
	outline:none;
}

.menu ul{
	margin:0;
	list-style:none;
	float:right;
}
.menu a{
	display:block;
	float:right;
	outline:none;
}

.menu ul li{
	float:right;
	margin-top:35px;
	margin-right:30px;

}
.navbar-brand{
  float:right;
	margin-top:5px;
	margin-right:30px;

}

.menu ul li.selected a,.menu ul li a:hover{
	color:#0F0;
}
.b {
	float:right;
	margin-top:100px;
	margin-right:210px;
}
body {
   background-image: url("payrolld.jpg");
   background-color: #cccccc;
}

table, th, td {
	  border-collapse: collapse;
    border: 1px solid black;
		background-color: #b3daff;
		text-decoration-color: blue;
		 color: black;

}

</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div id="wrapper">
<div id="header"></div>
<div class="menu">
<nav class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="logo.jpg" alt="logo" width="60px" height="60px"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="logout.php">Logout</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="record.php">My record</a></li>

    </ul>
  </div>

</div>
<div class="b">

<p>
  <?php
$id=$_SESSION['id'];
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db( $con,"payroll");
$sql="SELECT * FROM employee e LEFT JOIN project p ON e.empno=p.eno WHERE e.empno='".$_SESSION['id']."'";
$result = mysqli_query($con,$sql);

echo "<table border='1' style='background:#339900;'>
<tr>
<th>Employee Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>M.I</th>
<th>Gender</th>
<th>B-Day</th>
<th>Department</th>
<th>Position</th>
<th>Project id</th>
<th>Project start</th>
<th>Project end</th>
</tr>";

$row = mysqli_fetch_array($result);

  echo "<tr>";
    echo "<td>" . $row['empno'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['init'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['bdate'] . "</td>";
  echo "<td>" . $row['dept'] . "</td>";
  echo "<td>" . $row['position'] . "</td>";
    echo "<td>" . $row['pid'] . "</td>";
    echo "<td>" . $row['pstart'] . "</td>";
    echo "<td>" . $row['pend'] . "</td>";

  echo "</tr>";

echo "</table>";
 ?>
</p>

<center><h3 style="color:black">Payslip</h3></center>
<center>
<table width="200" border="1" bgcolor="#009900">
  <tr>
    <th>Basic Pay</th>
    <?php echo "<td>" . $row['pay'] . "</td>"; ?>

  </tr>
  <tr>
    <th>Days Of Work</th>
    <?php echo "<td>" . $row['dayswork'] . "</td>"; ?>

  </tr>
  <tr>
    <th>O.T Rate</th>
     <?php echo "<td>" . $row['otrate'] . "</td>"; ?>

  </tr>
   <tr>
    <th>Allowance</th>
    <?php echo "<td>" . $row['allow'] . "</td>"; ?>

  </tr>
   <tr>
    <th>Advances</th>
   <?php echo "<td>" . $row['advances'] . "</td>"; ?>

  </tr>
     <tr>
    <th>Insurance</th>
   <?php echo "<td>" . $row['insurance'] . "</td>"; ?>
  </tr>

</table>
</center>



<?php

mysqli_close($con);
?>


</div>

</div>
<div id="body">

</div>
<div id="bodyfooter"></div>
<div id="footer"></div>
</div>
</body>
</html>
