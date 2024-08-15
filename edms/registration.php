<?php include_once('includes/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$emailid=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$npwd=md5($_POST['newpassword']);
$ret=mysqli_query($con,"select id from tblregistration where emailId='$emailid' || mobileNumber='$mobileno'");
$count=mysqli_num_rows($ret);
if($count==0){
$query=mysqli_query($con,"insert into tblregistration(firstName,lastName,emailId,mobileNumber,userPassword) values('$fname','$lname','$emailid','$mobileno','$npwd')");
if($query){
echo "<script>alert('Registration successfull. Please login now');</script>"; 
echo "<script>window.location.href ='login.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>"; 
echo "<script>window.location.href ='registration.php'</script>";
}} else {
echo "<script>alert('Email Id or Mobile Number already registered.Please try again.');</script>"; 
echo "<script>window.location.href ='registration.php'</script>";
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
        <title>e Document Management System | Register </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
          <script type="text/javascript">
function valid()
{
if(document.registration.newpassword.value!= document.registration.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.confirmpassword.focus();
return false;
}
return true;
}
</script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">e-Document Management System</h3></div>
                                 <h3 class="text-center font-weight-light my-4">User Registration</h3>
                                    <div class="card-body">
                                        <form method="post" name="registration" onSubmit="return valid();">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="fname" placeholder="Enter your first name"  required />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="lname" placeholder="Enter your last name" required />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="emailid" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
    <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Enter yout mobile number" name="mobileno" maxlength="10" pattern="[0-9]+"> 
                                                <label for="inputEmail">Mobile Number</label>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="newpassword"  id="newpassword" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirmpassword" id="confirmpassword" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
