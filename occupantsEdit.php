<?php
    session_start();

    include('connection.php');
    include('fetch-data.php');
    // $haslog = (isset($_SESSION['hasLog'])?$_SESSION['hasLog']:0);

    if (isset($_SESSION['hasLog'])){
        $haslog = $_SESSION['hasLog'];
    }else{
        $haslog = 0;
    }

    if (empty($haslog)){
        header("location: occupants.php");
        exit;
    }

    
?>


<!DOCTYPE html>
<html lang="en">

<?php
    include('header.php');
?>
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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
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

 <?php
                            $id = $_GET['id'];
                            $sql = "select * from occupants where ID = ".$id;
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <form action = "occupantsEditSave.php" method="post" enctype ="multipart/form-data">
                            <input type="hidden" name="hiddenID" value="<?=$id?>">
                        <div class="row">

                            <h3><b><?= isset($id) ? "Edit Student Details" : "Edit Student Details" ?></b></h3>
</div>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
<div class="row justify-content-center" style="margin-top:-2em;">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid">
                    <form action="" id="student-form">
                        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
                            
                        <fieldset class="border-bottom">
                            <legend>Students Information</legend>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Student_ID" class="control-label">Student ID</label>
                                    <input type="text" name="Student_ID" class="form-control form-control-sm rounded-0" value="<?=$row['Student_ID']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="First_Name" class="control-label">First Name</label>
                                    <input type="text" name="First_Name"  class="form-control form-control-sm rounded-0" value="<?=$row['First_Name']?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Last_Name" class="control-label">Last Name</label>
                                    <input type="text" name="Last_Name" class="form-control form-control-sm rounded-0" value="<?=$row['Last_Name']?>">
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Room_Number" class="control-label">Room Number</label>
                                        <select name="Room_Number" id="Room_Number" value="<?= isset($option) ? $option : "" ?>" class="form-control form-control-sm rounded-0" >
                                        <option value="<?=$row['Room_Number']?>">Select Room</option> 
                                        <?php 
                                        foreach ($options as $option) {
                                        ?>
                                        <option><?php echo $option['Room_Number']; ?> </option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Age" class="control-label">Age</label>
                                    <input type="text" name="Age" class="form-control form-control-sm rounded-0" value="<?=$row['Age']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                <label for="Course" class="control-label">Course</label>
                                <select name="Course" class="form-control form-control-sm rounded-0">
                                    <option value="<?=$row['Course']?>">Select Course</option>
                                    <option value="BS-InfoTech">BS-InfoTech</option>
                                    <option value="BIT">BIT</option>
                                    <option value="BSCE">BSCE</option>
                                    <option value="Asso.InfoTech">Asso.InfoTech</option>
                                    <option value="BEED">BEED</option>
                                    <option value="BSCompE">BSCompE</option>
                                    <option value="BSEd">BSEd</option>
                                    <option value="BSEE">BSEE</option>
                                    <option value="BSFT">BSFT</option>
                                    <option value="BSHM">BSHM</option>
                                    <option value="BSME">BSME</option>
                                    <option value="BSTM">BSTM</option>
                                    <option value="CSTECH">CSTECH</option>
                                </select>

                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Phone" class="control-label">Phone</label>
                                    <input type="text" name="Phone" class="form-control form-control-sm rounded-0" value="<?=$row['Phone']?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label for="Address" class="control-label">Address</label>
                                    <input type="text" name="Address"  class="form-control form-control-sm rounded-0" value="<?=$row['Address']?>">
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Year_Level" class="control-label">Year Level</label>
                                        <select name="Year_Level" class="form-control form-control-sm form-control-border rounded-0" >
                                        <option value="<?=$row['Year_Level']?>">Select Year</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        </select>
                                        
                                    </div>
                                </div>



                            </div>


                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </div>
                    </form>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

</body>

</html>                   