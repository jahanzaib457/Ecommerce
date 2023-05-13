<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
   <style>
    body{
        background-color: lightsteelblue;
    }
    h1{
        
        text-align: center;
        color: red;
        padding: 5px;
        font-family: Rockwell;
        border: 2px solid red;
        border-radius: 10px;
        margin: 10px;
        width: 60%;
        
    }
  form{
    border: 5px solid darkblue;
    padding: 50px;
    border-radius: 20px;
    margin-left: 20%;
    margin-right: 20%;
   
   background-image: url(profileimages/admin-login.jpg);
  }

p, label{
    color: white;
}
   </style>
</head>
<body>


<div class="container mt-5">

<center>

    <form action="" method="POST" style="margin-top: 100px;">
<h1>Login Here</h1>
<br><br>
    <div class="col-lg-8">
        <p>Email</p>
        <input type="text" class="form-control form-control-sm" name="email" autocomplete="off" required>
    </div>

    <div class="col-lg-8">
        <p>Password</p> 
        <input type="password" class="form-control form-control-sm" id="showPassword" name="password" required>
    </div>
    
    <div class="col-lg-8" style="float: left;">
    <input type="checkbox"  onclick="myFunction()"><a style="color: white;"> Show Password</a>

    <script>
        function myFunction() {
  var x = document.getElementById("showPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
    
    </div>
   <br>
   <br>
    <button type="submit" class="btn btn-success" name="login">Login</button>
   
    </form>
    </center>
</div>

</body>
</html>

<?php
include_once 'conn.php';
session_start();
if(isset($_POST['login'])){

   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $fetch_login = "select * from admin_table where email = '$email' AND password = '$password' ";
    $execute_login = mysqli_query($conn, $fetch_login);
    $rows_login = mysqli_num_rows($execute_login);
    $array_login = mysqli_fetch_array($execute_login);
    
    
    if($rows_login > 0){
    $_SESSION["name"] = $array_login[1];
        echo "<script>
            alert('You are logged in successfully');
            window.location.href = 'admin/pages/dashboard.php';
        </script>";
    }else{
        echo "<script>
        alert('Invalid email or password');
        window.location.href = 'admin_login.php';
    </script>";
    }
}




?>