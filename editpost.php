<?php
    require_once 'db/conn.php';

     //error here submit
     if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['ID'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $specialty = $_POST['specialty'];

        //Call crud fucntion 
        $result = $crud-> editAttendees($id, $fname, $lname, $dob, $email, $phonenumber, $specialty);

        // redirect to index.php
        if($result){
            header("location: viewrecords.php");
        }
        else{
            //echo 'Error';
            include 'includes/errorMessage.php';
        }
        
    }
     else {
        
     }


?>