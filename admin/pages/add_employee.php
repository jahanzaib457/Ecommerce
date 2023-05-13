<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Eployee</title>
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
   
   background-image: url(images/Employees.jpg);
  }

p{
    color: white;
}
   </style>
</head>
<body>


<div class="container mt-5">
   <a href="employee_display.php"><button type="button" class="btn btn-outline-primary" style="float: right;">Back</button></a>
<center>
<h1>Add New Employee</h1>
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="col-lg-8">
        <p>Employee Name</p>
        <input type="text" class="form-control form-control-sm" name="EName" required>
    </div>

    <div class="col-lg-8">
        <p>Employee ID</p>
        <input type="number" class="form-control form-control-sm" name="E_id" required>
    </div>

    <div class="col-lg-8">
        <p>Designation</p>
        <input type="text" class="form-control form-control-sm" name="designation" required>
    </div>

    <div class="col-lg-8">
        <p>Contact Number</p>
        <input type="number" class="form-control form-control-sm" name="number" required>
    </div>

    <div class="col-lg-8">
        <p>Salary</p>
        <input type="number" class="form-control form-control-sm" name="salary" required>
    </div>

    <div class="col-lg-8">
        <p>Employee Image</p>
        <input type="file" class="form-control form-control-sm" name="E_Image" accept="image/*" required>
    </div>

        

   <br>
    <button type="submit" class="btn btn-success" name="submit">Add product</button>
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
        $insert = "INSERT INTO `table_employee`(`full_name`, 
        `employee_id`, `designation`, `contact_number`, `salary`, `picture`) VALUES
        ('$Ename','$E_id','$designation','$number','$salary','$imagelocation')";
        $execute = mysqli_query($conn, $insert);

        if($execute){
            echo "<script>
            alert('New employee added successfully');
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