<?php
    session_start();

    if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin'){
        // echo '<div class="alert alert-dismissible alert-warning">
        // <button type="button" class="close" data-dismiss="alert">&times;</button>
        // You need to login with an account that have enough permissions to access the contents of this page.</div>';
        include '../../includes/handlers/logout_handler.php';        
    }

    include '../../includes/handlers/class_handler.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" type="text/css" href="../../includes/styles/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../includes/styles/button.css">
        <link rel="stylesheet" type="text/css" href="../../includes/styles/form.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="admin.php">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="classAdd.php">Class <span class="sr-only">(current)</span></a>
                    </li>                            
                </ul>       
                <form action="../../includes/handlers/logout_handler.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-primary ml-auto">Logout</button>
                </form>         
            </div>
        </nav>
            
        <div class="classForm mt-3">
            <h1>UPDATE CLASS</h1>
            <?php
                $classId = $_POST['classId'];
                $sql = "SELECT * FROM class WHERE classId='$classId'";
                $result = mysqli_query($conn, $sql);
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <fieldset>          
                <?php if(mysqli_num_rows($result) > 0) : ?>                
                    <?php if($row = mysqli_fetch_assoc($result)) : ?>                  
                        <div class="form-group">
                            <label for="classDay1">Day 1</label>
                            <input type="hidden" name="classId" value="<?php echo $_POST["classId"]; ?>">
                            <select name="classDay1" class="form-control" id="classDay1">
                                <option value="<?php echo $row['classDay1'] ?>" disabled selected><?php echo $row['classDay1'] ?></option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="classTime1">Day 1 Time</label>
                            <select name="classTime1" class="form-control" id="classTime1">
                                <option value="<?php echo $row['classTime1'] ?>" disabled selected><?php echo $row['classTime1'] ?></option>
                                <option value="7:30 am - 9:00 am">7:30 am - 9:00 am</option>
                                <option value="9:00 am - 10:30 am">9:00 am - 10:30 am</option>
                                <option value="10:30 am - 12:00 pm">10:30 am - 12:00 pm</option>
                                <option value="12:00 pm - 1:30 pm">12:00 pm - 1:30 pm</option>
                                <option value="1:30 pm - 3:00 pm">1:30 pm - 3:00 pm</option>
                                <option value="3:00 pm - 4:30 pm">3:00 pm - 4:30 pm</option>
                                <option value="4:30 pm - 6:00 pm">4:30 pm - 6:00 pm</option>
                                <option value="6:00 pm - 7:30 pm">6:00 pm - 7:30 pm</option>                            
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="classDay2">Day 2</label>
                            <select name="classDay2" class="form-control" id="classDay2">
                                <option value="<?php echo $row['classDay2'] ?>" disabled selected><?php echo $row['classDay2'] ?></option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="classTime2">Day 2 Time</label>
                            <select name="classTime2" class="form-control" id="classTime2">
                                <option value="<?php echo $row['classTime2'] ?>" disabled selected><?php echo $row['classTime2'] ?></option>
                                <option value="7:30 am - 9:00 am">7:30 am - 9:00 am</option>
                                <option value="9:00 am - 10:30 am">9:00 am - 10:30 am</option>
                                <option value="10:30 am - 12:00 pm">10:30 am - 12:00 pm</option>
                                <option value="12:00 pm - 1:30 pm">12:00 pm - 1:30 pm</option>
                                <option value="1:30 pm - 3:00 pm">1:30 pm - 3:00 pm</option>
                                <option value="3:00 pm - 4:30 pm">3:00 pm - 4:30 pm</option>
                                <option value="4:30 pm - 6:00 pm">4:30 pm - 6:00 pm</option>
                                <option value="6:00 pm - 7:30 pm">6:00 pm - 7:30 pm</option>                            
                            </select>
                        </div>                                          
                        <div class="form-group">
                            <label for="subjectId">Subject ID</label>
                            <select name="subjectId" class="form-control" id="subjectId">
                                <option value="<?php echo $row['subjectId'] ?>" disabled selected><?php echo $row['subjectId'] ?></option>
                                <?php
                                    $sql = "SELECT * FROM subject";
                                    $result2 = mysqli_query($conn, $sql);                                
                                ?>
                                <?php if(mysqli_num_rows($result2) > 0) : ?>                
                                    <?php while($row2 = mysqli_fetch_assoc($result2)) : ?>
                                        <option value="<?php echo $row['subjectId']; ?>"><?php echo $row2['subName']; ?></option>                                    
                                    <?php endwhile; ?>
                                <?php endif; ?>                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="facultyId">Faculty ID</label>
                            <select name="facultyId" class="form-control" id="facultyId">
                                <?php
                                    // $sql = "SELECT * FROM users WHERE id IN (SELECT facultyId FROM class WHERE (!='$schedDay1' AND schedTime1!='$schedTime1') 
                                    // OR (schedDay2!='$schedDay2' AND schedTime2!='$schedTime2')
                                    // OR (schedDay1!='$schedDay2' AND schedTime1!='$schedTime2')
                                    // OR (schedDay2!='$schedDay1' AND schedTime2!='$schedTime1'))";
                                    $classDay1 = $row['classDay1'];
                                    $classDay2 = $row['classDay2'];
                                    $classTime1 = $row['classTime1'];
                                    $classTime2 = $row['classTime2'];

                                    $sql = "SELECT a.*, b.* FROM users a LEFT JOIN class b ON a.id = b.facultyId WHERE a.userType = 'Faculty'
                                                AND ((b.classDay1!='$classDay1' AND b.classTime1!='$classDay1') 
                                                OR (b.classDay2!='$classDay2' AND b.classTime2!='$classTime2')
                                                OR (b.classDay1!='$classDay2' AND b.classTime1!='$classTime2')
                                                OR (b.classDay2!='$classDay1' AND b.classTime2!='$classDay1'))
                                            UNION
                                            SELECT a.*, b.* FROM users a LEFT JOIN class b ON a.id = b.facultyId WHERE B.facultyId IS NULL AND a.userType = 'Faculty'";
                                    $result = mysqli_query($conn, $sql);                                
                                ?>
                                <?php if(mysqli_num_rows($result) > 0) : ?>                
                                    <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['lName'].", "; echo $row['fName']; ?></option>                                    
                                    <?php endwhile; ?>
                                <?php endif; ?>                            
                            </select>
                        </div>                                            
                        <button type="submit" name="classUpdate" class="btn btn-outline-primary mt-5">Update</button>
                    <?php endif; ?>
                <?php endif; ?>
                </fieldset>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>