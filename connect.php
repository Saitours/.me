<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>ThankYou</title>
</head>
<body>
    
</body>
</html>
<?php

    $firstname = $_POST['firstname'];
    $mail = $_POST['mail'];
    $Adults = $_POST['Adults'];
    $Child = $_POST['Child'];
    $Infant = $_POST['Infant'];
    $Message = $_POST['Message'];


    //database connection
    $conn = new mysqli("localhost","root","","persoanlweb");
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Insert into contactform(firstname,mail,Adults,Child,Infant,Message)
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssiiis",$firstname,$mail,$Adults,$Child,$Infant,$Message);

        $stmt->execute();

        if($stmt){
  
            ?>
    
            <script>
    
            swal({
             title: "Thank you for your review",
             text: "Data insertd",
             icon: "success",
             
             });
    
    
    
            </script>
    
            <?php
    
        }else{
    
            ?>
    
            <script>
    
            swal({
             title: "Failed",
             text: "Data not insertd",
             icon: "error",
             });
    
    
    
            </script>
    
            <?php
    
    
        }
        exit;

        $stmt->close();
        $conn->close();
    }


    header("Location:index.php");
?>