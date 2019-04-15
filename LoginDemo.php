<?php
   if($_POST)                         
   {
   
     $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['user_role'];
    $errors = array();
   //start validation
       if(empty($_POST['email']))
       {
           $errors['email'] = "Email is required!";
       }
        if(empty($_POST['password']))
       {
           $errors['password'] = "Password is required!";
       }
        if(empty($_POST['user_role']))
       {
           $errors['user_role'] = "Select User Role!";
       }
      
   
       //check errors
       if(count($errors) == 0)
       {
            $con = mysqli_connect("localhost", "root", "", "hms");
   
   
   if($con === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   
   
   $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password' AND role = '$role'";
   if($result = mysqli_query($con, $sql)){
      if(mysqli_num_rows($result) > 0){
          //echo "Login Successful!";
          while ($row = mysqli_fetch_assoc($result)) {
          
             //echo ($row['role']);
              if ($row['role'] == '1') {
                  
                  header("location:admin.php");
              }
              if ($row['role'] == '2') {
                
                  header("location:admindoctor.php");
              }
              if ($row['role'] == '3') {
               
                  header("location:adminpatient.php");
              }
      }
          mysqli_free_result($result);
      }
       else{
          echo "Login Failed";
      }
   } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
   }
   
   mysqli_close($con);
           exit();
       }
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Log In - Demo Hospital Limited</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="img/shortcut _icon.png">
      <!-- Bootstrap --> 
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/styles.css">
      <style type="text/css">
         p{
         color: red;
         }
      </style>
   </head>
   <body>
      <!-- Content Wrapper -->
      <div class="login-wrapper">
         <div class="container-center">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="view-header">
                     <div class="header-icon">
                        <!--ADDED LATER-->
                        <i></i>
                     </div>
                     <div class="header-title">
                        <h3>Hospital Management</h3>
                        <small><strong>Please Log In</strong></small>
                     </div>
                  </div>
                  <div class="">
                     <br><br>
                     <!-- alert message -->
                     <p><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                     <p><?php if(isset($errors['password'])) echo $errors['password']; ?></p>
                     <p><?php if(isset($errors['user_role'])) echo $errors['user_role']; ?></p>
                  </div>
               </div>
               <div class="panel-body">
                  <form action="" id="loginForm" method="post">
                     <div class="form-group">
                        <label class="control-label" for="email">Email Address</label>
                        <input type="text" placeholder="Email Address" name="email" id="email" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> 
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control"> 
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="user_role">User Role</label>
                        <select name="user_role" class="form-control" id="user_role">
                           <option value="" selected="selected">Select User Role</option>
                           <option value="1">Admin</option>
                           <option value="2">Doctor</option>
                           <option value="3">Patient</option>
                        </select>
                     </div>
                     <div>
                        <button type="reset" class="btn btn-secondary">Reset</button> 
                        <button type="submit" class="btn btn-primary">Log In</button> 
                     </div>
                  </form>
               </div>
               <div class="panel-footer">
                  <table style="cursor:pointer;font-size:12px" class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Email</th>
                           <th>Pass</th>
                           <th>Role</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr data-role="1">
                           <td>admin@gmail.com</td>
                           <td>123</td>
                           <td>Admin</td>
                        </tr>
                        <tr data-role="2">
                           <td>doctor@gmail.com</td>
                           <td>123</td>
                           <td>Doctor</td>
                        </tr>
                        <tr data-role="10">
                           <td>patient@gmail.com</td>
                           <td>123</td>
                           <td>Patient</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>