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
#body {  width:947px; margin-left: 550px; margin-top: 100px;align:center;text-decoration-color: black;
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
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">

    </ul>
  </div>





</nav>

</div>

</div>
<div id="body">
<form action="process.php" method="post">
<table border="0"class="reg" width="100">
<i><b></i><tr>
  <td align="center" class="login"><b>
  <h1>LOGIN</h1></b></td></tr></b>
<tr><td align="center" class="login"></td></tr>
<tr><td align="left" class="user">Last Name:</td></tr>
<tr><td ><input type="text" name="email1"/></td></tr>
<tr><td align="left" class="user">Employee Number:</td></tr>
<tr><td><input type="password" name="password" /></td></tr>
<tr><td><input type="submit" name="login" class="ok" value="Login" /></td></tr>
<tr><td>
<?php if(isset($_GET['err']))
		{

				echo '<div class="error"style="color:#060">You are Not A member Pls Try Again</div>';


		} ?></td></tr>

<?php

 if(isset($SESSION['email1']))
 if(isset($_GET['success']))
		{

				echo '<div class="error"style="color:#060">Welcome</div>';


		} ?>
</table>
</form>
</div>
<div id="bodyfooter"></div>
<div id="footer"></div>
</div>
</body>
</html>
