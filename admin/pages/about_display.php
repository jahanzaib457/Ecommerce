<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>About</title>

  </head>
  <body>
  <?php
    require_once 'header.php';
    ?>
    <div class="container">
    <a href="create_about.php"><button type="button" style="float: right;" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Craete About</button></a>
    
    <table class="table table-striped table-bordered">
        <style>
            th,td{
                text-align: center;
            }
        </style>
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Heading</th>
      <th scope="col">Description</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
$fetch_query = "select * from about";
$execute = mysqli_query($conn, $fetch_query);
$row = mysqli_num_rows($execute);
$num = 1;
if($row > 0){
while($data = mysqli_fetch_array($execute)){

echo  '<tr style="text-align: justify;">
        <th scope="row">'.$num.'</th>
        <td>'.$data[1].'</td>
        <td class="text-wrap text-justify">'.$data[2].'</td>
        <td>
        <a href="about_update.php?updateid='.$data[0].'"><button type="submit" class="btn btn-info"><i class="material-icons">&#xe254;</i> Update</button></a>
        <br>
        <a href="about_delete.php?deleteid='.$data[0].'"><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
        </td>
       </tr>';
       $num++;
}
}else{
    echo ' <tr>
      <th colspan="4" scope="row" style="color:red; text-align: center;">No record found</th>
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
