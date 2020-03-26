<?php
    session_start();

    if(isset($_SESSION['id'])){
        switch($_SESSION['userType']){
            case "Student":
                header("Location: ./student/student.php");
                break;
            case "Faculty":
                header("Location: ./faculty/faculty.php");
                break;
            case "Admin":
                header("Location: ./admin/admin.php");
                break;
            default:
                session_destroy();
                header("Location: ./login.php");
        }
    }
    
    require '../includes/handlers/login_handler.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" type="text/css" href="../includes/styles/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../includes/styles/form.css">
    </head>
    <body>
        <div class="loginForm mx-auto my-auto">
            <h1>Login</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <fieldset>                
                    <div class="form-group mt-4">
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-outline-primary mt-5">Login</button>
                </fieldset>
            </form>
            <small id="emailHelp" class="form-text text-muted">Don't have an account? <a href="register.php">SIGN UP</a></small>
        </div>        
    
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>