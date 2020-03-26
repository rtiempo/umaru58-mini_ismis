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


if(isset($_POST['classAdd'])){
    $classDay1 = $_POST["classDay1"];
    $classTime1 = $_POST["classTime1"];
    $classDay2 = $_POST["classDay2"];
    $classTime2 = $_POST["classTime2"];
    $subjectId = $_POST["subjectId"];  

    if($classDay1 == $classDay2){
        echo'<div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    You cannot have 2 schedules for a class on the same day!</div>';
    } else {
        $sql = "INSERT INTO class (classDay1, classTime1, classDay2, classTime2, subjectId) 
        VALUES ('$classDay1', '$classTime1', '$classDay2', '$classTime2', '$subjectId') ";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../admin/admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }    
        
}

if(isset($_POST['classUpdate'])){
    $classId = $_POST['classId'];
    // $classDay1 = $_POST["classDay1"];
    // $classTime1 = $_POST["classTime1"];
    // $classDay2 = $_POST["classDay2"];
    // $classTime2 = $_POST["classTime2"];
    // $subjectId = $_POST["subjectId"];
    // $facultyId = $_POST["facultyId"];
    
    // $sql = "SELECT * FROM class WHERE facultyId='$facultyId' AND ((schedDay1='$schedDay1' AND schedTime1='$schedTime1') 
    //                                                         OR (schedDay2='$schedDay2' AND schedTime2='$schedTime2')
    //                                                         OR (schedDay1='$schedDay2' AND schedTime1='$schedTime2')
    //                                                         OR (schedDay2='$schedDay1' AND schedTime2='$schedTime1'))";
    // $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result) > 0){                
    //     echo'<div class="alert alert-dismissible alert-warning">
    //         <button type="button" class="close" data-dismiss="alert">&times;</button>
    //         This will overlap with current schedule!</div>';
    // } else {                
    //     $sql = "INSERT INTO class (schedDay1, schedTime1, schedDay2, schedTime2, subjectId, facultyId) 
    //     VALUES ('$schedDay1', '$schedTime1', '$schedDay2', '$schedTime2', '$subjectId', $facultyId) ";

    //     if ($conn->query($sql) === TRUE) {
    //         header("Location: ../views/admin/admin.php");
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // }

    if(!empty($_POST['classDay1'])){
        $classDay1 = $_POST['classDay1'];       
        $sql = "UPDATE class SET classDay1='$classDay1' WHERE classId='$classId'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['classTime1'])){
        $classTime1 = $_POST['classTime1'];       
        $sql = "UPDATE class SET classTime1='$classTime1' WHERE classId='$classId'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['classDay2'])){
        $classDay2 = $_POST['classDay2'];       
        $sql = "UPDATE class SET classDay2='$classDay2' WHERE classId='$classId'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['classTime2'])){
        $classTime2 = $_POST['classTime2'];       
        $sql = "UPDATE class SET classTime2='$classTime2' WHERE classId='$classId'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['subjectId'])){
        $subjectId = $_POST['subjectId'];       
        $sql = "UPDATE class SET subjectId='$subjectId' WHERE classId='$classId'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(!empty($_POST['facultyId'])){
        $facultyId = $_POST['facultyId'];       
        $sql = "UPDATE class SET facultyId='$facultyId' WHERE classId='$classId'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    header("Location: ../../views/admin/admin.php");
}

?>