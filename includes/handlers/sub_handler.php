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

if(isset($_POST['subAdd'])){
    $subName = $_POST['subName'];
    $maxStud = $_POST['maxStud'];
    $facultyId = $_POST['facultyId'];

    $sql ="SELECT * FROM subject WHERE subName='$subName'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo'<div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Subject already exists!</div>';
    } else {        
        $sql = "INSERT INTO subject (subName, maxStud, facultyId) 
        VALUES ('$subName', '$maxStud', '$facultyId')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../../views/admin/admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if(isset($_POST['subUpdate'])){
    $id = $_POST['id'];
    if(!empty($_POST['subName'])){
        $subName = $_POST['subName'];       
        $sql = "UPDATE SUBJECT SET subName='$subName' WHERE subjectId='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['maxStud'])){
        $maxStud = $_POST['maxStud'];       
        $sql = "UPDATE SUBJECT SET maxStud='$maxStud' WHERE subjectId='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['facultyId'])){
        $facultyId = $_POST['facultyId'];
        $sql = "UPDATE SUBJECT SET facultyId='$facultyId' WHERE subjectId='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    header("Location: ../../views/admin/admin.php");
}


    
?>