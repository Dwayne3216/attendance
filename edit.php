<?php 
    $title = "Edit Record";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isSet($_GET['id'])){

        //echo 'Error';
        include 'includes/errorMessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $attendee =$crud->getAttendeeDetails(); 

    
    
?>

    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type= "hidden" name= "id" value = <?php echo $attendee['attendee_id'] ?> />

        <!--First name form -->
        <div class = "form-group">
            <label for="firstname">First Name </label>
            <input type="text" class="form-control" value = "<?php echo $attendee['firstname'] ?> id="firstname" name="firstname">
        </div>
        <!--Last name form -->
        <div class = "form-group">
            <label for="lastname">Last Name </label>
            <input type="text" class="form-control" value = "<?php echo $attendee['lastname'] ?> id="lastname" name="lastname">
        </div>
        <!--Date of birth form -->
        <div class = "form-group">
            <label for="dob">Date of Birth </label>
            <input type="text" class="form-control" value = "<?php echo $attendee['dateofbirth'] ?> id="dob" name="dob">
        </div>
        <!--dropdown list form -->
        <div class = "form-group">
            <label for="specialty">Speciality</label>
            <select class="form-control" value = "<?php echo $attendee['specialty'] ?> id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option selected value = "<?php echo $r['specialty_id'] ?>"
                    <?php if($r['specialty_id'] == $attendee ['specialty_id']) echo 'selected' ?>
                    >
                         <?php echo $r['name']; ?>
                    </option>

                <?php }?>
            </select>
        
        </div>
        <!--email form -->
        <div class = "form-group">
            <label for="email">Email Address </label>
            <input type="email" class="form-control" value = "<?php echo $attendee['emailaddress'] ?> id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!--email form -->
        <div class = "form-group">
            <label for="phonenumber">Phone Number </label>
            <input type="text" class="form-control" value = "<?php echo $attendee['contactnumber'] ?> id="phonenumber" aria-describedby="phoneHelp" name="phonenumber">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>

        <a href= "viewrecords.php" class="btn btn-primary">Back to list</button>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
        
    </form>
<?php } ?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php' ; ?>