<?php
include '../../conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $delete = "delete from table_employee where id = $id";
    $execute = mysqli_query($conn, $delete);
    if($execute){
        echo "<script>
        alert('Record deleted successfully');
        window.location.href = 'employee_display.php';
     </script>";
    }else{
        echo "<script>
        alert('".die(mysqli_error($conn))."');
        window.location.href = 'employee_display.php';
     </script>";
        
    }
}

?>