<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
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
    $execute_employee = mysqli_query($conn, "select * from table_employee where id = $id");
    $data = mysqli_fetch_array($execute_employee);
}

?>


<div class="container mt-5">
   <a href="employee_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Update Employee</h1>
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="col-lg-8">
        <p>Employee Name</p>
        <input type="text" class="form-control form-control-sm" name="EName" value="<?php echo $data[1];?>" required>
    </div>

    <div class="col-lg-8">
        <p>Employee ID</p>
        <input type="number" class="form-control form-control-sm" name="E_id" value="<?php echo $data[2];?>" required>
    </div>

    <div class="col-lg-8">
        <p>Designation</p>
        <input type="text" class="form-control form-control-sm" name="designation" value="<?php echo $data[3];?>" required>
    </div>

    <div class="col-lg-8">
        <p>Contact Number</p>
        <input type="number" class="form-control form-control-sm" name="number" value="<?php echo $data[4];?>" required>
    </div>

    <div class="col-lg-8">
        <p>Salary</p>
        <input type="number" class="form-control form-control-sm" name="salary" value="<?php echo $data[5];?>" required>
    </div>

    <div class="col-lg-8">
        <p>Product Image</p>
        <input type="file" class="form-control form-control-sm" name="E_Image" accept="image/*" required>
    </div>

        

   <br>
    <button type="submit" class="btn btn-success" name="submit">Update Employee</button>
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

    $filename = $_FILES['E_Image']['name'];
    $filetmp_name = $_FILES['E_Image']['tmp_name'];
    $filesize = $_FILES['E_Image']['size'];

    $Ename = $_POST['EName'];
    $E_id = $_POST['E_id'];
    $designation = $_POST['designation'];
    $number = $_POST['number'];
    $salary = $_POST['salary'];

    $imagelocation = "../../profileimages/". $filename;
    
    if($filesize <= 1000000){
        move_uploaded_file($filetmp_name, $imagelocation);
        $update_employee = "UPDATE `table_employee` SET `full_name`='$Ename',`employee_id`='$E_id',
        `designation`='$designation',`contact_number`='$number',`salary`='$salary',`picture`='$imagelocation' WHERE id=$id";
        $execute = mysqli_query($conn, $update_employee);

        if($execute){
            echo "<script>
            alert('Employee updates successfully');
            window.location.href = 'employee_display.php';
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