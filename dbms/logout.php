<?php
 session_start();
unset($_SESSION['id']);
 header('Location:welcome.php');

unset($_SESSION['admin']);
 header('Location:welcome.php');

?>
