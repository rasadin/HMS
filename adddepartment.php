<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>HMS Admin</title>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
      <style type="text/css">
         p{
         color: red;
         }
         h5{
         color: green;
         }
      </style>
   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
         <a class="navbar-brand" href="#">Admin Panel</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Department">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDepartment" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-wrench"></i>
                  <span class="nav-link-text">Department</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="collapseDepartment">
                     <li>
                        <a href="addDepartment.php">Add Department</a>
                     </li>
                     <li>
                        <a href="departmentList.php">Department List</a>
                     </li>
                  </ul>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doctor">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDoctor" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-wrench"></i>
                  <span class="nav-link-text">Doctor</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="collapseDoctor">
                     <li>
                        <a href="addDoctor.php">Add Doctor</a>
                     </li>
                     <li>
                        <a href="doctorList.php">Doctor List</a>
                     </li>
                  </ul>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patient">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePatient" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-wrench"></i>
                  <span class="nav-link-text">Patient</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="collapsePatient">
                     <li>
                        <a href="addPatient.php">Add Patient</a>
                     </li>
                     <li>
                        <a href="patientList.php">Patient List</a>
                     </li>
                  </ul>
               </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
               <li class="nav-item">
                  <a class="nav-link text-center" id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
                  </a>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <small style="color: white;">Admin</small>
                  <i class="fa fa-fw fa-sign-out"></i>Logout</a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="content-wrapper">
      <div class="container-fluid">
      <!-- add department.html--> 
      <div class="container">
         <?php
            if ($_POST) {
                $errors = array();
                
                if (empty($_POST['departmentName'])) {
                    $errors['departmentName'] = "Department Name is required!";
                }
                if (empty($_POST['description'])) {
                    $errors['description'] = "Description is required!";
                }
                if (!isset($_POST['radio'])) {
                    $errors['radio'] = "Status must be selected!";
                }
                
                
                //check errors
                if (count($errors) == 0) {
                    $departmentName = $_POST['departmentName'];
                    $description    = $_POST['description'];
                    $radio          = $_POST['radio'];
                    $con            = mysqli_connect("localhost", "root", "", "hms");
                    
                    
                    if ($con === false) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    
                    $sql = "INSERT INTO department (departmentname, description, status) VALUES ('$departmentName', '$description', '$radio');";
                    if ($result = mysqli_query($con, $sql)) {
                        echo "<h5>Data inserted</h5>";
                    } else {
                        echo "<p>Already Exist!</p>";
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    }
                    
                    mysqli_close($con);
                }
            }
         ?>
         <h2>Add Department</h2>
         <form action="" id="addDepartment" method="post">
            <div class="form-group">
               <label for="departmentName">Department Name:</label>
               <input type="text" class="form-control" id="departmentName" placeholder="Enter Department Name" name="departmentName" value="<?php if(isset($_POST['departmentName'])) echo $_POST['departmentName']; ?>">
            </div>
            <div class="form-group">
               <label for="description">Description:</label>
               <textarea class="form-control" rows="5" id="description" name="description" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>"></textarea>
            </div>
            <div class="radio">
               <label for="status">Status:</label>
               <label><input type="radio" name="radio" value="1">Active</label>
               <label><input type="radio" name="radio" value="0">Inactive</label>
            </div>
            <button type="reset" class="btn btn-dark">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
            <p><?php if(isset($errors['departmentName'])) echo $errors['departmentName']; ?></p>
            <p><?php if(isset($errors['description'])) echo $errors['description']; ?></p>
            <p><?php if(isset($errors['radio'])) echo $errors['radio']; ?></p>
         </form>
         <!-- end department.html--> 
         <!-- /.container-fluid-->
         <!-- /.content-wrapper-->
         <footer class="sticky-footer">
            <div class="container">
               <div class="text-center">
                  <small>Copyright © Your Website 2017</small>
               </div>
            </div>
         </footer>
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <!-- Logout Modal-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <a class="btn btn-primary" href="LoginDemo.php">Logout</a>
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
         <!-- Custom scripts for this page-->
         <script src="js/sb-admin-datatables.min.js"></script>
         <script src="js/sb-admin-charts.min.js"></script>
      </div>
   </body>
</html>