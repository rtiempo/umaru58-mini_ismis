<?php
    session_start();

    if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Student'){
        // echo '<div class="alert alert-dismissible alert-warning">
        // <button type="button" class="close" data-dismiss="alert">&times;</button>
        // You need to login with an account that have enough permissions to access the contents of this page.</div>';
        include '../../includes/handlers/logout_handler.php';        
    }

    include '../../includes/handlers/stud_handler.php';

    if(isset($_POST['drop'])){
        $classId = $_POST['classId'];
        $id = $_SESSION['id'];
        $sql = "DELETE FROM schedule WHERE classId='$classId' AND id='$id'";
        if (!mysqli_query($conn, $sql)) {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Student
        </title>
        <link rel="stylesheet" type="text/css" href="../../includes/styles/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../includes/styles/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="student.php">Student</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="student.php">Schedule <span class="sr-only">(current)</span></a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="enrollment.php">Enrollment</a>
                    </li>                     
                </ul>       
                <form action="../../includes/handlers/logout_handler.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-primary ml-auto">Logout</button>
                </form>         
            </div>
        </nav>

        <div class="content">
            <table class="table table-hover mt-3">
                <thead>
                    <th scope="col"><?php echo $_POST['subName']; ?></th>
                    <th scope="col"></th>
                    <th scope="col"><a href="classAdd.php">New Class</a></th>                    
                </thead>
            </table>
            <table class="table table-hover">
                <thead>                
                    <tr>
                        <th scope="col">Class ID</th>
                        <th scope="col">Day 1</th>
                        <th scope="col">Day 1 Time</th>                    
                        <th scope="col">Day 2</th>
                        <th scope="col">Day 2 Time</th>
                        <th scope="col">Assigned Faculty</th>
                        <th scope="col">No. of Students</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $subjectId = $_POST['subjectId'];
                        $sql = "SELECT * FROM class WHERE subjectId='$subjectId'";
                        $result = mysqli_query($conn, $sql);                
                    ?>
                    <?php if(mysqli_num_rows($result) > 0) : ?>                
                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td> <?php echo $row["classId"]." "; ?></td>
                                <td><?php echo $row["classDay1"]; ?></td>
                                <td><?php echo $row["classTime1"]; ?></td>
                                <td><?php echo $row["classDay2"]; ?></td>
                                <td><?php echo $row["classTime2"]; ?></td>                                                                                            
                                <td><?php echo $row["facultyId"]; ?></td>
                                <td>
                                    <?php
                                        $classId = $row["classId"];
                                        $subjectId = $_POST['subjectId'];
                                    
                                        $sql = "SELECT COUNT(*) as total FROM schedule WHERE classId='$classId'";
                                        $result = mysqli_query($conn, $sql);                
                                        $data = mysqli_fetch_assoc($result);

                                        $sql = "SELECT * FROM subject WHERE subjectId='$subjectId'";
                                        $result2 = mysqli_query($conn, $sql);

                                        if($row2 = mysqli_fetch_assoc($result2)){
                                            echo $data['total']." / ".$row2['maxStud'];
                                        }
                                    ?>
                                </td>                                                               
                                <td><form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <input type="hidden" name="classId" value="<?php echo $row["classId"]; ?>">
                                    <input type="hidden" name="subjectId" value="<?php echo $_POST['subjectId']; ?>">
                                    <input type="hidden" name="totalEnrolled" value="<?php $data['total']; ?>">
                                    <button class ="btn btn-primary btn-sm" type="submit" name='classEnroll' value="Submit">Enroll</button> 
                                </form></td>                                                    
                            </tr>                
                        <?php endwhile; ?>
                    <?php endif; ?>        
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>