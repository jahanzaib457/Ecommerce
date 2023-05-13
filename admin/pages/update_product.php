<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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
    $execute_product = mysqli_query($conn, "select * from table_product where id = $id");
    $data = mysqli_fetch_array($execute_product);
}

?>


<div class="container mt-5">
   <a href="display_product.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>update product</h1>

    <form action="" method="POST" enctype="multipart/form-data">

    <div class="col-lg-8">
        <p>Product Image</p> 
       

        <input type="file" class="form-control form-control-sm" name="pImage" accept="image/*"
        onchange="document.getElementById('myimg').src=window.URL.createObjectURL(this.files[0])"/>
    </div>
    <img src="<?php echo $data[5]; ?>" width="100" height="100" id="myimg" /> 

    <div class="col-lg-8">
        <p>Product Name</p>
        <input type="text" class="form-control form-control-sm" name="pName" value="<?php echo $data[1]?>" required>
    </div>

    <div class="col-lg-8">
        <p>Product Price</p>
        <input type="number" class="form-control form-control-sm" name="pPrice" value="<?php echo $data[2]?>"  required>
    </div>

    <div class="col-lg-8">
        <p>Product Quantity</p>
        <input type="number" class="form-control form-control-sm" name="pQuantity" value="<?php echo $data[3]?>"  required>
    </div>

    <div class="col-lg-8">
        <p>product Category</p>
       <select name="Pcategory">
        <?php
        $fetch_product = "select * from table_categories";
        $execute = mysqli_query($conn,$fetch_product);
        if(mysqli_num_rows($execute) ==  0){
            echo '<option value="">No category available</option>';
        }else{
            while($data = mysqli_fetch_array($execute)){
                echo '<option value='.$data[0].'>'.$data[1].'</option>';
            }
        }
        ?>
       </select>
    </div>

    
   
   
   <br>
    <button type="submit" class="btn btn-success" name="submit">Update product</button>
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

    $filename = $_FILES['pImage']['name'];
    $filetmp_name = $_FILES['pImage']['tmp_name'];
    $filesize = $_FILES['pImage']['size'];

    $Pname = $_POST['pName'];
    $Pprice = $_POST['pPrice'];
    $Pquantity = $_POST['pQuantity'];
    $Pcategory = $_POST['Pcategory'];

    $imagelocation = "../../profileimages/". $filename;
    
    if($filesize <= 1000000){
        move_uploaded_file($filetmp_name, $imagelocation);
        $update_product = "UPDATE `table_product` SET `product_Name`='$Pname',`product_Price`='$Pprice',
        `product_Quantity`='$Pquantity',`product_Category`='$Pcategory',`product_Image`='$imagelocation' WHERE id=$id";
        $execute_update = mysqli_query($conn, $update_product);

        if($execute_update){
            echo "<script>
            alert('Product updated successfully');
            window.location.href = 'display_product.php';
        </script>";
        }else{
            echo "<script>
            alert('".die(mysqli_error($conn))."');
        </script>";
        }
    }else{
       echo "<script>
                alert('Image size must be equal or less than 1MB');
            </script>";

    }
}
?>