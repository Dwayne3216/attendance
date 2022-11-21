<?php

$title = 'Success';

require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendemail.php'; 


if (isset($_POST['submit'])) {
    //extract values from the $POST array
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];



    //Uploading Images
    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

    //exit();  //THIS STOP THE CODE 

    //Call function to insert and track if succes or not
    $isSuccess = $crud->insertAttendees($firstname, $lastname, $dob, $email, $contact, $specialty, $destination);
    //FUNCTION ADDED FOR CONFIRMATION EMAILS
    $specialtyName = $crud->getSpecialtyById($specialty);


    if ($isSuccess) {
        SendEmail::SendMail($email, 'Welcome to IT Conference 2022', 'You have successfuly registered for his year\'s IT Conference'); 
        include 'includes/successmessage.php'; 
    } else {
        include 'includes/errormessage.php'; 
    }
}

?>

<!-- <h1 class="text-center text-success">Thanks For Registering</h1> -->


<!-- this prints out values that were passed to the action page using the method "GET"  -->
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php
        // echo $_GET['firstname'] . ' ' . $_GET['lastname'];
        ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php
        //echo $_GET['specialty']; 
        ?>
    </h6>
    <p class="card-text">
     Date of Birth: <?php
                    //echo $_GET['dob']; 
                    ?>

    </p>
    
    <p class="card-text">
     Email Address: <?php
                    //echo $_GET['email']; 
                    ?>

    </p>

    <p class="card-text">
    Contact Number: <?php
                    //echo $_GET['phone']; 
                    ?>

    </p>
     </div>
</div> -->

<?php

//    echo $_GET['firstname'];
//    echo $_GET['lastname'];
//    echo $_GET['dob'];
//    echo $_GET['specialty'];
//    echo $_GET['email'];
//    echo $_GET['phone'];

?>
<img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 50%; height: 50%"/>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php
            echo $_POST['firstname'] . ' ' . $_POST['lastname'];
            ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php
            echo $specialtyName['name']; //Placed here For Email Confirmation
            ?>
        </h6>
        <p class="card-text">
            Date of Birth: <?php
                            echo $_POST['dob'];
                            ?>

        </p>

        <p class="card-text">
            Email Address: <?php
                            echo $_POST['email'];
                            ?>

        </p>

        <p class="card-text">
            Contact Number: <?php
                            echo $_POST['phone'];
                            ?>

        </p>
    </div>
</div>

<br />

<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<!-- <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a> -->
<a onclick="return confirm('Are you sure you want to delete');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>

<br>
<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>