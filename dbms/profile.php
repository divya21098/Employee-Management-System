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
	margin-top:35px;
	margin-right:30px;

}

.menu ul li.selected a,.menu ul li a:hover{
	color:#0F0;
}
.b {
	float:right;
	margin-top:170px;
	margin-right:230px;
}

table, th, td {
	  border-collapse: collapse;
    border: 1px solid black;
		background-color: #b3daff;
		text-decoration-color: blue;
		 color: black;

}
.navbar-brand{
  float:right;
	margin-top:5px;
	margin-right:30px;

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



</div>
<div class="b">
<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db($con,"payroll");

$result = mysqli_query($con,"SELECT * FROM employee WHERE empno='".$_SESSION['id']."'");
while($row = mysqli_fetch_array($result))
  {@$image=$row ['photo']; ?>

  <table width="220" border="0" style="color:#FFF; margin-left:20px;" align="left" >
  <tr>
    <td  colspan="2">
  <a href="?profile&change">
  <?php if($image){ ?>
  <img src="images/<?php echo $image; ?>" height="225" width="225">
  <?php }else{ ?>
    <img src="images/p.jpg" height="225" width="225">

  <?php } ?></a>
  </td><td> <?php if(isset($_GET['change'])){ ?>

<table border="0" class="create" >
<tr>
<td colspan="0">
<form name="form" action="" method="post" enctype="multipart/form-data" class="insert">
<input type="file" name="file"/><input type="submit" name="create" value="Save Changes">
</form>
</td>
</tr>
</table>


<?php
include('config/config.php');
if(@$_POST ['create'])
{
$file = $_FILES ['file'];
$name = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name'];
if($name!="")
{
if(move_uploaded_file ($tmppath, 'images/'.$name))//image is a folder in which you will save image
{

$query="UPDATE employee set photo='$name'  WHERE empno='".$_SESSION['id']."'";

mysqli_query ($con,$query) or die ('could not updated:'.mysqli_error($con));
@$image=$row ['image'];
		echo "<script>window.location='profile.php'</script>";
	}

}else{
	echo 'Invalid';
	}
}
?>

  <?php } ?>
  <tr>
    <td>Employee Number</td>
    <td>:</td>
    <td><?php echo $row['empno']; ?></td>
  </tr>

  <tr>
    <td>Last Name</td>
    <td>:</td>
    <td><?php echo $row['lname']; ?></td>
  </tr>
  <tr>
    <td>First Name</td>
    <td>:</td>
    <td><?php echo $row['fname']; ?></td>
  </tr>
  <tr>
    <td>Middle Initial</td>
    <td>:</td>
    <td><?php echo $row['init']; ?></td>
  </tr>

</table>


<?php

  }

  ?>

</div>

</div>
<div id="body">


</div>
<div id="bodyfooter"></div>
<div id="footer">
</div>
</div>
</body>
</html>
