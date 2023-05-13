<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
   <a href="category_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Add Category</h1>
    <form action="" method="POST">

    <div class="col-lg-8">
        <p>Category Name</p>
        <input type="text" class="form-control form-control-sm" name="cName" required>
    </div>

    <p>Description</p>
        
        <textarea name="desc" cols="40" rows="10" required></textarea>
        

   <br>
    <button type="submit" class="btn btn-success" name="submit">Add Category</button>
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
    $category = $_POST['cName'];
    $description = $_POST['desc'];

    $insert = "INSERT INTO `table_categories`(`name`, `description`) VALUES ('$category','$description')";
    $execute = mysqli_query($conn, $insert);

    if($execute){
        echo "<script>
                alert('Category added successfully');
                window.location.href = 'category_display.php';
             </script>";
    }else{
        echo "<script>
        alert('".die(mysqli_error($conn))."');
        window.location.href = 'add_category.php';
     </script>";
    }
}
?>