<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_ismis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['register'])){
    $fName = $_POST["fName"];
    $MI = $_POST["MI"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $conPass = $_POST["conPass"];
    $userType = $_POST["userType"];

    if (strcmp($pass, $conPass) == 0){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $secPass = hash('sha512', $pass);
            
            $sql ="SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                echo'<div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Email already exists!</div>';
            } else {                
                    $sql = "INSERT INTO users (fName, MI, lName, email, pass, userType) 
                    VALUES ('$fName', '$MI', '$lName', '$email', '$secPass', '$userType')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: ../views/login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo'<div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Please enter a valid email!</div>';
        }
    } else {
        echo '<div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Passwords do not match!</div>';
    }
    
    $conn->close();
}

?>