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
#body {  width:947px; align:center;padding:200px;text-decoration-color: black;
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
	margin-top:200px;
	margin-right:-581px;
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





</div>


<div id="body">

</script>
<?php
if (isset($_GET['empno']) && !isset($_GET['field'])) {
 include 'include/dbconnection.php';
 $empno = $_GET['empno'];
 $query = "DELETE FROM employee WHERE empno = $empno";
 $result = mysqli_query($link,$query) or die (mysqli_error());
 $msg = "Record deleted!";
}
$msg = "";
?>
<span style="color:	#ffffff;">


<script type="text/javascript">
 function proceed() {
  return confirm('Delete this record?');
 }
 </script>


<script type="text/javascript"> document.write('<h4>'+Date()+'</h4>') </script>

</i>

<form method="post" action="search.php">
</form>

<table border="1px solid black">
<tr>
  <th>Employee Number</th>
  <th>Lastname</th>
  <th>Firstname</th>
  <th>Basic Pay</th>
  <th>Days Worked</th>
  <th>Overtime Rate/Hr</th>
  <th>OT Hours</th>
  <th>Allowances</th>
  <th>Gross Pay</th>
  <th>W/Tax</th>
  <th>Advances</th>
  <th>Insurance</th>
  <th>Total Deductions</th>
  <th width="200">Net Pay</th>
  <th colspan="2">Action</th>
<tr>
<?php
if (isset($_POST["field"])) {
  $key = strtoupper($_POST["key"]);
  $field = $_POST["field"];
  if (!empty($_POST["key"]))
    if ($field == "empno")
      if (is_numeric($key))
        $query = "SELECT * FROM employee WHERE empno = $key";
      else
        exit('Pls enter a numeric value!');
     else
      $query = "SELECT * FROM employee WHERE UPPER($field) like '$key%'";
  else
    $query = "SELECT * FROM employee";
}
else
  $query = "SELECT * FROM employee";
include 'include/dbconnection.php';
$result = mysqli_query($link,$query) or die (mysqli_error($link));
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  $gross = ($row['pay'] * $row['dayswork']) + ($row['otrate'] * $row['othrs']) + $row['allow'];

  if ($gross>=50000)
   $tax = $gross * .15;
  if ($gross>=30000 && $gross <=49999)
   $tax = $gross * .10;
  if ($gross>=10000 && $gross <=29999)
   $tax = $gross * .05;
  if ($gross>=5000 && $gross <=9999)
   $tax = $gross * .03;
  if ($gross < 5000)
	$tax = 0;

  $totdeduct = $tax + $row['advances'] + $row['insurance'];
  $netpay = $gross - $totdeduct;
  echo '<td>'.$row['empno'].'</td>';
  echo '<td>'.$row['lname'].'</td>';
  echo '<td>'.$row['fname'].'</td>';
  echo '<td>'.$row['pay'].'</td>';
  echo '<td>'.$row['dayswork'].'</td>';
  echo '<td>'.$row['otrate'].'</td>';
  echo '<td>'.$row['othrs'].'</td>';
  echo '<td>'.$row['allow'].'</td>';
  echo '<td><i>'.$gross.'</i></td>';
  echo '<td>'.$tax.'</td>';
  echo '<td>'.$row['advances'].'</td>';
  echo '<td>'.$row['insurance'].'</td>';
  echo '<td>'.$totdeduct.'</td>';
  echo '<td><b>'.$netpay.'</b></td>';
  echo "<td><a href='entry.php?empno=".$row['empno']."'>Edit</td>";
  //echo "<td><a href='search.php?empno=".$row['empno']."'>Delete</td>";
  echo "<td><a href='search.php?empno=";
  echo $row['empno'];
  echo "' onclick=";
  echo "'return proceed()";
  echo "'>Delete</td> </tr>";
}
echo "</table>";
echo "<p><strong>".mysqli_num_rows($result)." record(s).</strong></p>";
?>




</div>
<div id="bodyfooter"></div>
<div id="footer"></div>
</div>
</body>
</html>
