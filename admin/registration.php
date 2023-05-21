<?php
session_start();
$conn=mysqli_connect("localhost","root","","skriptovacie");
if(!empty($_SESSION["id"])){
    header("Location: ../parts/admin.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM admin WHERE pouzivatelske = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO admin VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h2>Registration</h2>
<form class="" action="" method="post" autocomplete="off">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required value=""> <br>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required value=""> <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required value=""> <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required value=""> <br>
    <label for="confirmpassword">Confirm Password:</label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
    <button type="submit" name="submit">Register</button>
</form>
<br>
<a href="login.php">Login</a>
</body>
</html>
