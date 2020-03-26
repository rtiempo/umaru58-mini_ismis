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

if(isset($_POST['classEnroll'])){
    $id = $_SESSION['id'];
    $subjectId = $_POST['subjectId'];
    $classId = $_POST['classId'];
    $totalEnrolled = $_POST['totalEnrolled'];

    $sql = "SELECT * FROM schedule WHERE subjectId='$subjectId' AND id='$id'";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM subject WHERE subjectId='$subjectId'";
    $result2 = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result2);


    if(mysqli_num_rows($result) > 0){
        echo'<div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            You are already enrolled in this subject!</div>';
    } else {                        
        // $sql = "SELECT a.*, b.* FROM users a LEFT JOIN class b ON a.id = b.facultyId WHERE a.userType = 'Faculty'
        //                                         AND ((b.classDay1!='$classDay1' AND b.classTime1!='$classDay1') 
        //                                         OR (b.classDay2!='$classDay2' AND b.classTime2!='$classTime2')
        //                                         OR (b.classDay1!='$classDay2' AND b.classTime1!='$classTime2')
        //                                         OR (b.classDay2!='$classDay1' AND b.classTime2!='$classDay1'))
        //         UNION
        //         SELECT a.*, b.* FROM users a LEFT JOIN class b ON a.id = b.facultyId WHERE B.facultyId IS NULL AND a.userType = 'Faculty'";
        // $sql = "SELECT a.* b.* FROM class a WHERE classId='$classId'";

        $result = mysqli_query($conn, $sql); 

        if($data['maxStud'] > $totalEnrolled){
            $sql = "INSERT INTO schedule (id, classId, subjectId) 
            VALUES ('$id', '$classId', '$subjectId') ";
        
            if ($conn->query($sql) === TRUE) {
                header("Location: ../student/student.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo'<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Class is already full!</div>';
        }
    }
  
}

?>