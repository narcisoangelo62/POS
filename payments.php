<?php
    session_start();

    include('connection.php');
    // $haslog = (isset($_SESSION['hasLog'])?$_SESSION['hasLog']:0);

    if (isset($_SESSION['hasLog'])){
        $haslog = $_SESSION['hasLog'];
    }else{
        $haslog = 0;
    }

    if (empty($haslog)){
        header("location: login.php");
        exit;
    }

    $sql = "select p.ID, p.Student_ID, CONCAT(p.First_Name,' ', p.Last_Name) as StudName, c.Room_Number,p.Amount_Paid,p.Date_Paid from occupants c right join payments p on c.Student_ID = p.Student_ID ";

    $results = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<?php
    include('header.php');
?>






<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include ('menu.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " ".$_SESSION['Name']." ";?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
    <div class="card card-outline rounded-0 card-maroon">
    <div class="card-header">
        <h3 class="card-title"><b>Payments</b></h3>
        <div class = "btn-group">
        <div class="card-tools">
           <a href ="paymentsAdd.php"><button class="btn btn-primary mb-0 mt-0" style="margin-left:5px" >Add Payment</button> </a>
        </div>
        
           <a href ="paymentsDelete.php"><button class="btn btn-danger mb-0 mt-0" style="margin-left:5px">Delete all</button> </a>
        </div>


    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped table-bordered text-center" id="example">
                
                <thead>
                    <tr class="bg-primary text-white  ">
                    
                        <th class = "text-center">Action</th>
                        <th class = "text-center">Student ID</th>
                        <th class = "text-center">Student Name</th>
                        <th class = "text-center">Room Number</th>
                        <th class = "text-center">Date Paid</th>
                        
                        
                        


                        

                        
                        
                    </tr>
                </thead>
                <tbody>

                <?php
                                foreach ($results as $result) {
                                    echo '<tr>
                                            <td>
                                            <a href = "paymentsDeleteSingle.php?id='.$result['ID'].'">
                                                <i class = "fa fa-trash text-danger"></i>
                                                </a>
                                            </td>   
                                            <td>'.$result['Student_ID'].'</td>
                                            <td>'.$result['StudName'].'</td>
                                            <td>'.$result['Room_Number'].'</td>
                                            <td>'.$result['Date_Paid'].'</td>
                                            
                                            
                                            
                                            

                                        </tr>';
                                }

                            ?>

                       
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>   
    
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="assetsDT/js/bootstrap.bundle.min.js"></script>
    <script src="assetsDT/js/jquery-3.6.0.min.js"></script>
    <script src="assetsDT/js/pdfmake.min.js"></script>
    <script src="assetsDT/js/vfs_fonts.js"></script>
    <script src="assetsDT/js/custom.js"></script>
    <script src="assetsDT/js/datatables.min.js"></script>

<script src="js/sweetalert2.all.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script src="js/delete.js"></script>

<?php
   if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>
      <script>
      swal({
      title: "<?php echo $_SESSION['status'];?>",
      icon: "<?php echo $_SESSION['status_code'];?>",
       });
 </script>
 <?php
      unset($_SESSION['status']);
   }
?>

</body>

</html>