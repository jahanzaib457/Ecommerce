<?php
include_once '../../conn.php';


if(isset($_POST['button'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $insert = "INSERT INTO `user_contact_us`(`name`, `email`, `subject`, `message`) 
    VALUES ('$name','$email','$subject','$message')";
    $execute = mysqli_query($conn , $insert);

    if($execute){
        echo "<script>
            alert('Message sent successfully');
            window.location.href = 'contact.php';
        </script>";
    }else{
        echo "<script>
        alert('".die(mysqli_error($conn))."');
        window.location.href = 'contact.php';
    </script>";
    }
}

?>