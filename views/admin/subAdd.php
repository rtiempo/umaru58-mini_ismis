<?php
    session_start();

    if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin'){
        // echo '<div class="alert alert-dismissible alert-warning">
        // <button type="button" class="close" data-dismiss="alert">&times;</button>
        // You need to login with an account that have enough permissions to access the contents of this page.</div>';
        include '../../includes/handlers/logout_handler.php';        
    }

    include '../../includes/handlers/sub_handler.php';    

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
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Subject <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="classAdd.php">Class</a>
                    </li>                            
                </ul>       
                <form action="../../includes/handlers/logout_handler.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-primary ml-auto">Logout</button>
                </form>         
            </div>
        </nav>
        
        <div class="subForm mt-3">
            <h1>ADD SUBJECT</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <fieldset>
                    <div class="form-group mt-4">
                        <label for="subName">Subject Name</label>
                        <input type="text" name="subName" class="form-control" id="subName" placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="maxstud">Max Students</label>
                        <input type="number" name="maxStud" class="form-control" id="maxStud" placeholder="Max Students">
                    </div>                    
                    <!-- <div class="form-group">
                        <label for="facultyId">Assigned Faculty ID</label>
                        <select name="facultyId" class="form-control" id="facultyId">
                            <?php
                                // $sql = "SELECT s.facultyId, u.* FROM users u LEFT JOIN subject s ON s.facultyId = u.id WHERE s.facultyId IS NULL AND u.userType ='Faculty';";
                                // $result = mysqli_query($conn, $sql);                                
                            ?>
                            <?php // if(mysqli_num_rows($result) > 0) : ?>                
                                <?php // while($row = mysqli_fetch_assoc($result)) : ?>
                                    <option value="<?php // echo $row['id']; ?>"><?php // echo $row['lName'].", ";echo $row['fName']; ?></option>                                    
                                <?php // endwhile; ?>
                            <?php // endif; ?>                            
                        </select>
                    </div>                                         -->
                    <button type="submit" name="subAdd" class="btn btn-outline-primary mt-5">Add</button>
                </fieldset>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>