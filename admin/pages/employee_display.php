<?php
    require_once 'header.php';
?>
    <div class="container">
    <a href="add_employee.php"><button type="button" style="float: right;" class="btn btn-dark"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Employee</button></a>
    
    <table class="table table-striped table-bordered">
        <style>
            th,td{
                text-align: center;
            }
        </style>
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Full Name</th>
      <th scope="col">Employee Id</th>
      <th scope="col">Designation</th>
      <th scope="col">Number</th>
      <th scope="col">Salary</th>
      <th scope="col">Picture</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
        <?php
        $fetch_query = "select * from table_employee";
        $execute = mysqli_query($conn, $fetch_query);
        $row = mysqli_num_rows($execute);
        $num = 1;
        if($row > 0){
        while($data = mysqli_fetch_array($execute)){

        echo  '<tr style="text-align: justify;">
        <th scope="row">'.$num.'</th>
        <td>'.$data[1].'</td>
        <td>'.$data[2].'</td>
        <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
        <td>'.$data[5].'</td>
        <td><img src="'.$data[6].'" width="100px; height:100px"></td>
        <td>
        <a href="update_employee.php?updateid='.$data[0].'"><button type="submit" class="btn btn-info"><i class="material-icons">&#xe254;</i> Update</button></a>
        <br>
        <a href="delete_employee.php?deleteid='.$data[0].'"><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
        </td>
       </tr>';
       $num++;
        }
        }else{
            echo ' <tr>
            <th colspan="9" scope="row" style="color:red; text-align: center;">No record found</th>
            </tr>';
   
}

?>
 
  </tbody>
</table>
    </div>
    <?php
    require_once 'footer.php';
    ?>