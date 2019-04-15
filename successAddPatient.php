
<?php
 if ($_POST) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $bloodgroup = $_POST['bloodgroup'];
        $sex = $_POST['sex'];
        $dob = $_POST['dob'];
        $picture = $_POST['picture'];
        $document = $_POST['document'];
        $address = $_POST['address'];  
    }
    

    $con = mysqli_connect("localhost", "root", "", "hms");
     

    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO patient (firstname, lastname, email, password, mobile, bloodgroup, sex, dateofbirth, picture, documents, address) VALUES ('$firstname', '$lastname', '$email', '$password', '$mobile', '$bloodgroup', '$sex', '$dob', '$picture', '$document', '$address')";
    if($result = mysqli_query($con, $sql)){
       echo "data inserted";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    mysqli_close($con);
?>