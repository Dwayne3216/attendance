<?php 
    $title = "Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

        //error here submit
    if(isset($_POST['submt'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $specialty = $_POST['specialty'];

        //upload files and stores them
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $filedest = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file, $filedest);


        //call function to insert and track if successful or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $phonenumber, $specialty, $filedest);
        $specialty = $crud->getSpecialties($speciality);
            
            if($isSuccess){
                include 'includes/successMessage.php';
            }
            else{
                include 'includes/errorMessage.php';
            }
   
        }
?>




<!-- Code used for getting values passed to the action page using method="get" -->
<!-- <div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET['firstname']. ' ' .$_GET['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php // echo $_GET['specialty']  ?></h6>
    <p class="card-text"> 
        Date of Birth: <?php // echo $_GET['dob']  ?>
    </p>
    <p class="card-text"> 
       Email Address: <?php  //echo $_GET['email']  ?>
    </p>
    <p class="card-text"> 
        Contact Number: <?php  //echo $_GET['phonenumber']  ?>
    </p>


  </div>
</div> -->

<img src="<?php echo $filedest ?>"class="img-fluid rounded-start" />

 <div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname']. ' ' .$_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php  echo $_POST['specialty']  ?></h6>
    <p class="card-text"> 
        Date of Birth: <?php  echo $_POST['dob']  ?>
    </p>
    <p class="card-text"> 
       Email Address: <?php  echo $_POST['email']  ?>
    </p>
    <p class="card-text"> 
        Contact Number: <?php  echo $_POST['phonenumber']  ?>
    </p>


  </div>
</div> 


<br>
<br>
<br>
<br>
    <?php require_once 'includes/footer.php' ; ?>