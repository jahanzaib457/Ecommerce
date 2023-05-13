<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Products</title>

  </head>
  <body>
  <?php
    require_once 'header.php';
    ?>
    <div class="container">
    <a href="add_product.php"><button type="button" style="float: right;" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</button></a>
    
    <table class="table table-striped table-bordered">
        <style>
            th,td{
                text-align: center;
            }
        </style>
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Image</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
$fetch_query = "select * from table_product";
$execute = mysqli_query($conn, $fetch_query);
$row = mysqli_num_rows($execute);
$num = 1;
if($row > 0){
while($data = mysqli_fetch_array($execute)){
$fetch_category = "SELECT * FROM table_categories where id= $data[4]";
$run = mysqli_query($conn, $fetch_category);
$array_cat = mysqli_fetch_array($run);
echo  '<tr style="text-align: justify;">
        <th scope="row">'.$num.'</th>
        <td>'.$data[1].'</td>
        <td>'.$data[2].'</td>
        <td>'.$data[3].'</td>
        <td>'.$array_cat[1].'</td>
        <td><img src="'.$data[5].'" width="100px; height:100px"></td>
        <td>
        <a href="update_product.php?updateid='.$data[0].'"><button type="submit" class="btn btn-info"><i class="material-icons">&#xe254;</i> Update</button></a>
        <br>
        <a href="delete_product.php?deleteid='.$data[0].'"><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
        </td>
       </tr>';
       $num++;
}
}else{
    echo ' <tr>
      <th colspan="7" scope="row" style="color:red; text-align: center;">No record found</th>
    </tr>';
   
}

?>
 
  </tbody>
</table>

    </div>
    <?php
    require_once 'footer.php';
    ?>

 </body>
</html>
