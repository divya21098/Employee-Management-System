<?php


 session_start();

$hostname = 'localhost';
 $dbname   = 'payroll';
 $username = 'root';
 $password = '';

 $con=mysqli_connect($hostname, $username, $password) or DIE('NOT Connected!');
 mysqli_select_db($con,$dbname) or DIE('Database name is not available!');
 $login = mysqli_query($con,"SELECT * FROM employee WHERE (lname = '" .addslashes($_POST['email1']) . "') and ( empno = '" .($_POST['password']) . "')");
 $row=mysqli_fetch_array($login);
 $a = mysqli_query($con,"SELECT * FROM admin WHERE (username = '" .addslashes($_POST['email1']) . "') and (password = '" .sha1($_POST['password']) . "')");
 $r=mysqli_fetch_array($a);
 if($row){
 $_SESSION['id'] = $row['empno'];

header ("location: success.php");
	}
	elseif($r){
 $_SESSION['admin'] = $row['id'];

header ("location: admin.php");
	}
	else {
		header ("location: index.php?err");
		}


?>
