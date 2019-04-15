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
                        <a href="adddoctor.php">Add Doctor</a>
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
      <!-- add doctor.html--> 
      <div class="container">
         <?php
            if ($_POST) {
                          $errors = array();
                           
                           if (empty($_POST['firstname'])) {
                               $errors['firstname'] = "First Name is required!";
                           }
                           if (empty($_POST['lastname'])) {
                               $errors['lastname'] = "Last Name is required!";
                           }
                           if (empty($_POST['email'])) {
                               $errors['email'] = "Email is required!";
                           }
                           if (empty($_POST['password'])) {
                               $errors['password'] = "Password is required!";
                           }
                           if (empty($_POST['designation'])) {
                               $errors['designation'] = "Designation is required!";
                           }
                           if ($_POST['departmentname'] == '0'){
                               $errors['departmentname'] = "Department Name must be selected!";
                           }
                           if (!isset($_POST['sex'])) {
                               $errors['sex'] = "Sex must be selected!";
                           }
                            if (count($errors) == 0) {
                               $firstname = $_POST['firstname'];
                               $lastname = $_POST['lastname'];
                               $email = $_POST['email'];
                               $password = $_POST['password'];
                               $designation = $_POST['designation'];
                               $departmentname = $_POST['departmentname'];
                               $address = $_POST['address'];  
                               $mobile = $_POST['mobile'];
                               $shortbiography = $_POST['shortbiography'];
                               $picture = $_POST['picture'];
                               $specialist = $_POST['specialist'];
                               $sex = $_POST['sex'];  
                               $bloodgroup = $_POST['bloodgroup'];
                               $degree = $_POST['degree'];
                               $status = $_POST['status'];   
               
               
            
               $con = mysqli_connect("localhost", "root", "", "hms");
                
            
               if($con === false){
                   die("ERROR: Could not connect. " . mysqli_connect_error());
               } 
            
               $sql = "INSERT INTO doctor (firstname, lastname, email, password, designation, departmentname, address, mobile, shortbiography, picture, specialist, sex, bloodgroup, degree, status) VALUES ('$firstname', '$lastname', '$email', '$password', '$designation', '$departmentname', '$address', '$mobile', '$shortbiography', '$picture', '$specialist', '$sex', '$bloodgroup', '$degree', '$status')";
               if($result = mysqli_query($con, $sql)){
                 echo "<h5>Data inserted</h5>";
               } else{
                 echo "<p>Already Exist!</p>";
                   echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
               }
                
               mysqli_close($con);
             }
            }
            ?>
         <h2>Add Doctor</h2>
         <p><?php if(isset($errors['firstname'])) echo $errors['firstname']; ?></p>
         <p><?php if(isset($errors['lastname'])) echo $errors['lastname']; ?></p>
         <p><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
         <p><?php if(isset($errors['password'])) echo $errors['password']; ?></p>
         <p><?php if(isset($errors['designation'])) echo $errors['designation']; ?></p>
         <p><?php if(isset($errors['departmentname'])) echo $errors['departmentname']; ?></p>
         <p><?php if(isset($errors['sex'])) echo $errors['sex']; ?></p>

         <form action="" id="addDoctor" method="post">
         <div class="form-group">
            <label for="FirstName">First Name:</label>
            <input type="text" class="form-control" id="FirstName" placeholder="Enter First Name" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
         </div>
         <div class="form-group">
            <label for="LastName">Last Name:</label>
            <input type="text" class="form-control" id="LastName" placeholder="Enter Last Name" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
         </div>
         <div class="form-group">
            <label for="emailAddress">Email Address:</label>
            <input type="email" class="form-control" id="EmailAddress" placeholder="Enter Email Address" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
         </div>
         <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
         </div>
         <div class="form-group">
            <label for="Designation">Designation:</label>
            <input type="text" class="form-control" placeholder="Enter Designation" name="designation" value="<?php if(isset($_POST['designation'])) echo $_POST['designation']; ?>">
         </div>
         <div class="form-group">
            <?php
               //Create connection and select DB
               $con = mysqli_connect('localhost', 'root', '', 'hms');
               
               // Check connection
               if (!$con) {
                   die("Connection failed: " . mysqli_connect_error());
               }
               $sql = "SELECT departmentname FROM department";
                $result = mysqli_query($con, $sql);
               
               ?>
            <label for="sel1">Department:</label>
            <select class="form-control" id="sel1" name="departmentname">
               <option value="0">Select Department</option>
               <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
               <option value = "<?php echo ($row['departmentname']);?>" >
                  <?php echo ($row['departmentname']);?>
               </option>
               <?php
                  }?>
            </select>
         </div>
         <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" rows="5" id="address" name="address"></textarea>
         </div>
         <div class="form-group">
            <label for="Mobile">Mobile:</label>
            <input type="text" class="form-control" id="Mobile" placeholder="Enter Mobile No" name="mobile">
         </div>
         <div class="form-group">
            <label for="address">Short Biography:</label>
            <textarea class="form-control" rows="5" id="shortBiographpy" name="shortbiography"></textarea>
         </div>
         <div class="form-group">
            <label for="exampleInputFile">Picture</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="picture">
         </div>
         <div class="form-group">
            <label for="specialist">Specialist:</label>
            <input type="text" class="form-control" id="specialist" name="specialist">
         </div>
         <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Date</label>
            <div class="col-10">
               <input class="form-control" type="date" id="example-date-input" name="date">
            </div>
         </div>
         <div class="radio">
            <label for="sex">Sex:</label>
            <label><input type="radio" name="sex">Male</label>
            <label><input type="radio" name="sex">Female</label>
         </div>
         <div class="form-group">
            <label for="sel1">Blood Group:</label>
            <select class="form-control" id="" name="bloodgroup">
               <option></option>
               <option>A+</option>
               <option>A-</option>
               <option>B+</option>
               <option>B-</option>
               <option>O+</option>
               <option>O-</option>
               <option>AB+</option>
               <option>AB-</option>
            </select>
         </div>
         <div class="form-group">
            <label for="address">Education / Degree:</label>
            <textarea class="form-control" rows="5" id="education" name="degree"></textarea>
         </div>
         <div class="radio">
            <label for="status">Status:</label>
            <label><input type="radio" name="status" value="1" checked>Active</label>
            <label><input type="radio" name="status" value="0">Inactive</label>
         </div>
         <button type="reset" class="btn btn-dark">Reset</button>
         <button type="submit" class="btn btn-primary">Save</button>
      </form>
         <!-- end doctor.html--> 
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