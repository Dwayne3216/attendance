<?php
$title = 'edit post';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get values from post operation

    if (isset($_POST['submit'])) {
        //extract values from the $POST array
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $emailaddress = $_POST['email'];
        $contactnumber = $_POST['phone'];
        $specialty = $_POST['specialty'];
    

    //Call Crud Function

    $result = $crud->editAttendee($id, $firstname, $lastname, $dob, $emailaddress, $contactnumber, $specialty);

    //Redirect to index.php
    if($result){
        header("Location: viewrecords.php");
    }
    else{ 
       // echo 'error';
       include 'includes/errormessage.php'; 

    }
}
    else{
        //echo 'error';
        include 'includes/errormessage.php'; 
}

?>
<?php require_once 'includes/footer.php'; ?>