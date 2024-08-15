<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["edmsid"])==0)
{   header('location:logout.php');
} else {
//For Adding categories
if(isset($_POST['submit']))
{
$category=$_POST['category'];
$id=intval($_GET['id']);
$userid=$_SESSION["edmsid"];
$sql=mysqli_query($con,"update tblcategory set categoryName='$category' where id='$id' and  createdBy='$userid'");
echo "<script>alert('Category Details updated');</script>";
echo "<script>window.location.href='manage-categories.php'</script>";
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
       <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/leftbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<?php
$id=intval($_GET['id']);
$userid=$_SESSION["edmsid"];
$query=mysqli_query($con,"select * from tblcategory where id='$id' and  createdBy='$userid'");
while($row=mysqli_fetch_array($query))
{
?>	                            	
<form  method="post">                                
<div class="row">
<div class="col-2">Category Name</div>
<div class="col-4"><input type="text" value="<?php echo  htmlentities($row['categoryName']);?>"  name="category" class="form-control" required></div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>