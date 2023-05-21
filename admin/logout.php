<?php
session_start();
$conn=mysqli_connect("localhost","root","","skriptovacie");
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");