<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
   <style>
    body{
        background-color: lightblue;
    }
    h1{
        background-color: white;
        text-align: center;
        color: black;
        padding: 10px;
        font-family: cursive;
        border: 5px solid maroon;
        border-radius: 20px;
        margin: 10px;
        width: 60%;
        
    }
  form{
    border: 5px solid maroon;
    padding: 50px;
    border-radius: 20px;
    margin-left: 20%;
    margin-right: 20%;
   
   background-image: url(images/category.jpg);
  }

p{
    color: white;
}
   </style>
</head>
<body>


<div class="container mt-5">
   <a href="information_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Add Information</h1>
    <form action="" method="POST">

    <div class="col-lg-8">
        <p>Address</p>
        <input type="text" class="form-control form-control-sm" name="address" required>
    </div>

    <div class="col-lg-8">
        <p>Email</p>
        <input type="text" class="form-control form-control-sm" name="email" required>
    </div>

    <div class="col-lg-8">
        <p>Telephone</p>
        <input type="text" class="form-control form-control-sm" name="Telephone" required>
    </div>

   <br>
    <button type="submit" class="btn btn-success" name="submit">Add Information</button>
    </form>
    </center>
</div>

</body>
</html>
<?php
require_once 'footer.php';
?>

<?php

if(isset($_POST['submit'])){
    $address = $_POST['address'];
    $email = $_POST['email'];
    $telephone = $_POST['Telephone'];

    $insert = "INSERT INTO `information`(`address`, `email`, `telephone`) VALUES ('$address','$email', '$telephone')";
    $execute = mysqli_query($conn, $insert);

    if($execute){
        echo "<script>
                alert('Information added successfully');
                window.location.href = 'information_display.php';
             </script>";
    }else{
        echo "<script>
        alert('".die(mysqli_error($conn))."');
        window.location.href = 'information_create.php';
     </script>";
    }
}
?>