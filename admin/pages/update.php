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
    $execute = mysqli_query($conn, "select * from table_categories where id = $id");
    $data = mysqli_fetch_array($execute);
}

?>

<div class="container mt-5">
   <a href="category_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Update Category</h1>
    <form action="" method="POST">

    <div class="col-lg-8">
        <p>Category Name</p>
        
        <input type="text" class="form-control form-control-sm" name="cName" value="<?php echo $data[1]?>" required>
    </div>

    <p>Description</p>
        
        <textarea name="desc" cols="40" rows="10" required><?php echo $data[2]?></textarea>
        

   <br>
    <button type="submit" class="btn btn-success" name="submit">Update Category</button>
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

    $update = "update `table_categories` set name='$category', description='$description' where id=$id";
    $execute_query = mysqli_query($conn, $update);

    if($execute_query){
        echo "<script>
                alert('Record updated successfully');
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