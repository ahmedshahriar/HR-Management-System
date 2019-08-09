<?php 
    session_start();
    if (isset($_SESSION['abc'])||isset($_SESSION['def'])) 
    {
        myf();
    }
    else
    {
        header("location: login.php");
    }
    function myf(){
    require "db.php";
    $conn = DBconnection();
    $sql1 = "select * from department_info";
   
    $dept_id="";
    $dept_desc="";
    $dept_name="";
    $dept_place="";
    $dept_type="";

    $id="";
    $desc="";
    $name="";
    $place="";
    $type="";
   

    $result1 = oci_parse($conn, $sql1);
     oci_execute($result1);
    

if (isset($_GET['id'])||isset($_GET['desc'])||isset($_GET['name'])||isset($_GET['place'])||isset($_GET['type'])) {
    $dept_id=$_GET['id'];
    $dept_desc=$_GET['desc'];
    $dept_name=$_GET['name'];
    $dept_place=$_GET['place'];
    $dept_type=$_GET['type'];
}
else{
    $dept_id="";
    $dept_desc="";
    $dept_name="";
    $dept_place="";
    $dept_type="";
}
  if (isset($_POST['submit'])) {
    $id=$_POST['id'];
    $desc=$_POST['desc'];
    $name=$_POST['name'];
    $place=$_POST['place'];
    $type=$_POST['type'];
  
  

  $sqlUpdate="Update department_info set dept_desc='$desc',dept_name='$name',dept_place='$place',dept_type='$type' where dept_id='$id'";
  $result2 = oci_parse($conn, $sqlUpdate);
  oci_execute($result2);
  header('location:department.php');
  
 /* if($updateInfo=mysqli_query($con,$sqlUpdate))
  {
    header('location:profile.php');
  }*/
    
  }
  else
  {
    $id="";
    $desc="";
    $name="";
    $place="";
    $type="";


  }




  
  
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HR</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.php">HR Management System</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
              
                </div>
            </div>
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
              
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
                <?php include "dropitem.php"; ?>
            </li>
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Department Information</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                       <th>DEPT_ID</th>
                                        <th>DEPT_DESC</th>
                                        <th>DEPT_NAME</th>
                                        <th>DEPT_PLACE</th>
                                        <th>DEPT_TYPE</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    while($view = oci_fetch_assoc($result1)) {
                    ?>
                       <tr class="table-row">
                       <td><?php echo $view["DEPT_ID"]; ?></td>
                       <td ><?php echo $view["DEPT_DESC"]; ?></td>
                       <td><?php echo $view["DEPT_NAME"]; ?></td>
                       <td ><?php echo $view["DEPT_PLACE"]; ?></td>
                       <td> <?php echo $view["DEPT_TYPE"]; ?></td>

                        <?php  
                                               // echo "<td><a href=\"edit.php?id=$view[id]\">EDIT</a>||<a href=\"delete.php?id=$view[id]\">DELETE</a></td></tr>";
                      echo "  <td><a href=\"department.php?id=$view[DEPT_ID]&desc=$view[DEPT_DESC]&name=$view[DEPT_NAME]&place=$view[DEPT_PLACE]&type=$view[DEPT_TYPE]\">Update</a>||<a href=\"delete.php?did=$view[DEPT_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a> </td> "; ?>
                      </tr>
                         <?php } ?>

                                </tbody>
                            </table>
                        <div style="float:left;width: 45%;">
                            <div class="col-md-12">
                                <legend>Update Information</legend>
                                <form method="post" action="department.php" onsubmit="return validForm()">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input readonly="readonly" type="text" name="id" id="id" class="form-control" placeholder="Emp ID" value="<?=$dept_id?>">
                                            <label for="input">Dept_ID</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input  type="text" name="desc" id="desc" class="form-control" placeholder="Dept Desc" value="<?=$dept_desc?>">
                                            <label for="input">Dept_Desc</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input  type="text" name="name" id="name" class="form-control" placeholder="Dept Name" value="<?=$dept_name?>">
                                            <label for="input">dept_name</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input  type="text" name="place" id="place" class="form-control" placeholder="Dept Place" value="<?=$dept_place?>">
                                            <label for="input">dept_place</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input  type="text" name="type" id="type" class="form-control" placeholder="Dept Type" value="<?=$dept_type?>">
                                            <label for="input">dept_type</label>
                                        </div>
                                    </div>

                                        


                                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update" />

                                </form>
                            </div>
                          </div>
                        <div style="float:right;width: 45%;">
                            <div class="col-md-12">
                                <legend>Add Data</legend>
                                <form method="post" action="insert.php">
                                    <div class="form-group">
                                            <input readonly="readonly"  type="text" name="id" id="id" class="form-control" placeholder="Dept ID" >
                                    </div>
                                    <div class="form-group">
                                        
                                            <input  type="text" name="desc" id="desc" class="form-control" placeholder="DEPT_DESC" >
                                            
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="text" name="name" id="name" class="form-control" placeholder="DEPT_NAME" required="required" >
                                            
                                        
                                    </div>
                                    <div class="form-group" >
                                        
                                            <input type="text" name="place" id="place" class="form-control" placeholder="DEPT_PLACE" required="required" >
                                            
                                        
                                    </div>
                                    <div class="form-group" >
                                        
                                            <input type="text" name="type" id="type" class="form-control" placeholder="DEPT_TYPE" required="required" >
                                            
                                        
                                    </div>


                                    <input type="submit" class="btn btn-primary btn-block" name="submit3" value="Insert" />

                                </form>
                                
                            </div>

                        </div>

                        

                        </div>

                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © HR Management System 2018</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
      

function validForm()
  { 
  var mob=document.getElementById('desc').value;
  var pass=document.getElementById('name').value;
  var email=document.getElementById('place').value;


    if (email==""||mob==""||pass=="") {
      alert("invalid");
      return false;
    }
  }   

    </script>

</body>

</html>
<?php } ?>