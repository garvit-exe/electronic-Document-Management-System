<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION["edmsid"])==0)
{   header('location:logout.php');
} else {

// For updating the note    
if(isset($_POST['submit'])){
$nid=$_GET['noteid'];
$userid=$_SESSION["edmsid"];
$ndetails=$_POST['remark'];
mysqli_query($con,"insert into tblnoteshistory(noteId,userId,noteDetails) values('$nid','$userid','$ndetails')");
echo "<script>alert('Note details added');</script>";
echo "<script>window.location.href='manage-notes.php'</script>";
          }


   // For deleting    
if($_GET['del']){
$nid=$_GET['nhid'];
$userid=$_SESSION["edmsid"];
mysqli_query($con,"delete from tblnoteshistory where id ='$nid' and  userId='$userid'");
echo "<script>alert('Note Deleted');</script>";
echo "<script>window.location.href='manage-notes.php'</script>";
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
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/leftbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Note Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Note Details</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Notes Details
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                           
                         
                               
                                    <tbody>
<?php 
$userid=$_SESSION["edmsid"];
$nid=$_GET['noteid'];
$query=mysqli_query($con,"select * from tblnotes where createdBy='$userid' && id='$nid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr style="font-size:18px;">
                                    <th width="250">Note Title</th>
                                    <td><?php echo htmlentities($row['noteTitle']);?></td>
                                      </tr>
                                       <tr>
                                    <th>Note Category</th>
                                    <td><?php echo htmlentities($row['noteCategory']);?></td>
                                      </tr>
                                          <tr>
                                    <th>Creation Date</th>
                                    <td><?php echo htmlentities($row['creationDate']);?></td>
                                      </tr>

                
                                   
                                            <tr>
                                    <th>Note Details</th>
                                    <td><?php echo htmlentities($row['noteDescription']);?></td>
                                      </tr>
                                       <?php } ?>


                                    </tbody>
                                </table>


   <table class="table table-bordered">
<tr>
    <th>Note Details</th>
    <th width="200">Date</th>
    <th></th>
</tr>
<?php $ret=mysqli_query($con,"select * from tblnoteshistory where userId='$userid' && noteId='$nid'");
while($row=mysqli_fetch_array($ret))
{ ?>
<tr>
    <td><?php echo htmlentities($row['noteDetails']);?></td>
    <td><?php echo htmlentities($row['postingDate']);?></td>
    <td>   <a href="view-note.php?nhid=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
</tr>

<?php } ?>
   </table>
                           



                                <div align="center"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add More Note</button>
</div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
<form method="post" name="takeaction">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note Details</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

<p>
<textarea class="form-control" required name="remark" placeholder="Enter Note Details" rows="5"></textarea></p>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="submit">Save changes</button></div>
        </div>
    </form>
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
<?php }  ?>