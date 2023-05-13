<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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
   
   background-image: url(images/about-1.jpg);
  }

p{
    color: white;
}
   </style>
</head>
<body>


<div class="container mt-5">
   <a href="about_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Add About</h1>
    <form action="" method="POST">

    <div class="col-lg-8">
        <p>Heading</p>
        <input type="text" class="form-control form-control-sm" name="heading" required>
    </div>

    <p>Description</p>
        
        <textarea name="desc" cols="40" rows="10" required></textarea>
        

   <br>
    <button type="submit" class="btn btn-success" name="submit">Add About</button>
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
    $heading = $_POST['heading'];
    $description = $_POST['desc'];

    $insert = "INSERT INTO `about`(`heading`, `description`) VALUES ('$heading','$description')";
    $execute = mysqli_query($conn, $insert);

    if($execute){
        echo "<script>
                alert('About added successfully');
                window.location.href = 'about_display.php';
             </script>";
    }else{
        echo "<script>
        alert('".die(mysqli_error($conn))."');
        window.location.href = 'create_about.php';
     </script>";
    }
}
?>