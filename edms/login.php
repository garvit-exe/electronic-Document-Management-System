<?php session_start();
include_once('includes/config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['logindetail'];
    $password=md5($_POST['userpassword']);
    $query=mysqli_query($con,"select mobileNumber,emailId,id from tblregistration where  (emailId='$emailcon' || mobileNumber='$emailcon') && userPassword='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['edmsid']=$ret['id'];
    $_SESSION['uemail']=$ret['emailId'];
      echo "<script>window.location.href='dashboard.php'</script>";
    }
    else{
 echo "<script>alert('Invalid details');</script>";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>e-Document Management System</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">e-Document Management System</h3></div>
                                    <h3 class="text-center font-weight-light my-4">User Login</h3>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="logindetail" placeholder="Registered Email id / Mobile Number" required />
                                                <label for="inputEmail">Email address / Mobile Number</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="userpassword" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password-recovery.php">Forgot Password?</a>
                                                <button  class="btn btn-primary"  type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="registration.php">Need an account? Sign up!</a></div>
                                        <hr />
                                           <div class="small"><a href="index.php">Back to Home Page</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
  <?php include_once('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
