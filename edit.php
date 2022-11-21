<?php

$title = 'Edit Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();


//EDIT
if (!isset($_GET['id'])) {
   // echo 'error';
   include 'includes/errormessage.php'; //generic Error Message
   header("Location: viewrecords.php ");
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

?>



    <h1 class="text-center">Edit Record</h1>



    <form method="post" action="editpost.php">

        <div class="mb-3">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        
        <label for="firstname" class="form-label">First Name</label>

        <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname" aria-describedby="firstname" placeholder="First Name Only">

        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname" aria-describedby="lastname" placeholder="Last Name Only">

        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>

            <select class="form-select" aria-label="specialty" value="<?php echo $attendee['specialty'] ?>" id="specialty" name="specialty">


                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value=" <?php echo $r['specialty_id']; ?>" <?php if ($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your contact number.</div>
        </div>

        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>


<?php } ?>

<br>
<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>
