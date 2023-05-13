<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
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
   
   background-image: url(images/update-1.jpg);
  }

p{
    color: white;
}
   </style>
</head>
<body>

<?php
if(isset($_GET['updateid'])){
    $id = $_GET ['updateid'];
    $execute = mysqli_query($conn, "select * from information where id = $id");
    $data = mysqli_fetch_array($execute);
}

?>

<div class="container mt-5">
   <a href="information_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Update Information</h1>
    <form action="" method="POST">

    <div class="col-lg-8">
        <p>Address</p>
        
        <input type="text" class="form-control form-control-sm" name="address" value="<?php echo $data[1]?>" required>
    </div>

    <div class="col-lg-8">
        <p>Email</p>
        
        <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $data[2]?>" required>
    </div>

    <div class="col-lg-8">
        <p>Telephone</p>
        
        <input type="number" class="form-control form-control-sm" name="telephone" value="<?php echo $data[2]?>" required>
    </div>

   <br>
    <button type="submit" class="btn btn-success" name="submit">Update Information</button>
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
    $telephone = $_POST['telephone'];
    

    $update = "update `information` set address='$address', email='$email', telephone='$telephone' where id=$id";
    $execute_query = mysqli_query($conn, $update);

    if($execute_query){
        echo "<script>
                alert('Record updated successfully');
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