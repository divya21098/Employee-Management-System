<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payroll</title>
<style type="text/css">
body {
   background-image: url("payrolld.jpg");
   background-color: #cccccc;
}

#wrapper { width:947px; margin:0 auto; clear:both;text-decoration-color: black;
 }
#header { width:947px; height:141px; align:center;text-decoration-color: black;
}
#menu { width:947px; height:100px; align:center;text-decoration-color: black;
}
#body {  width:97px; height:200px;text-decoration-color: black;
 }
#bodyfooter {  width:947px; height:42px; align:center;text-decoration-color: black;
 }
#footer { width:947px; height:111px; align:center;text-decoration-color: black;
}
.menu{ float:right; margin-top:71px; margin-right:42px; clear:both; }
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

}.navbar-brand{
  float:right;
	margin-top:5px;
	margin-right:30px;

}


.menu ul li.selected a,.menu ul li a:hover{
	color:#0F0;
}
.b {
	float:right;
	margin-top:40px;
	margin-right:200px;
	padding-bottom: 10px;
color: black;
}

table {
    width: 100%;
}

th {
    height: 50px;
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
      <li><a href="members.php">Members Name</a></li>
      <li><a href="entry.php">Entry</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="admin.php">Home</a></li>
    </ul>
  </div>





</nav>


</div>

<div class="b">
<center><h3>Members List </h3></center>
<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db($con,"payroll");

$result = mysqli_query($con,"SELECT * FROM employee");

echo "<table border='1' bgcolor='#006600'>
<tr>
<th>Employee Id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Gender</th>
<th>B-Day</th>

<th>Position</th>

</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['empno'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['bdate'] . "</td>";
  echo "<td>" . $row['position'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

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
