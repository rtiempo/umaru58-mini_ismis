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

if(isset($_POST['login'])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $secPass = hash('sha512', $pass);

        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$secPass'";
        $retval = mysqli_query($conn, $sql);

        if($retval->num_rows == 0){
            echo'<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Incorrect email or password!</div>';
        }else{
            if(!isset($_SESSION['id'])){
                $email = $_POST['email'];
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);

                if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fName'] = $row['fName'];
                    $_SESSION['MI'] = $row['MI'];
                    $_SESSION['lName'] = $row['lName'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userType'] = $row['userType'];
                }                
            }        

            switch($_SESSION['userType']){
                case "Student":
                    header("Location: ../views/student/student.php");
                    break;
                case "Faculty":
                    header("Location: ../views/faculty/faculty.php");
                    break;
                case "Admin":
                    header("Location: ../views/admin/admin.php");
                    break;
                default:
                    session_destroy();
                    header("Location: ../views/login.php");
            }
        }
    } else {
        echo'<div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Please enter a valid email!</div>';
    }

    $conn->close();
}


?>