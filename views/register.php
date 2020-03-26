<?php
    session_start();

    include '../includes/handlers/register_handler.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Register
        </title>
        <link rel="stylesheet" type="text/css" href="../includes/styles/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../includes/styles/form.css">
    </head>
    <body>    
        <div class="registerForm mx-auto myauto">
            <h1>Register</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <fieldset>
                    <div class="form-group mt-4">
                        <input type="text" name="fName" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="MI" class="form-control" placeholder="Middle Initial">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lName" class="form-control" placeholder="Last Name">
                    </div>                
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="conPass" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <select name="userType" class="form-control" id="exampleSelect1">
                            <option value="Student">Student</option>
                            <option value="Faculty">Faculty</option>                            
                        </select>
                    </div>                               
                    <button type="submit" name="register" class="btn btn-outline-primary mt-5">Register</button>
                </fieldset>
            </form>
            <small id="emailHelp" class="form-text text-muted">Already have an account? <a href="login.php">LOGIN</a></small>
        </div>        

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>