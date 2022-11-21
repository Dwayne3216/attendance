<?php

$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();

?>

<!-- FORM DESIGN NOTES
    First Name
    Last Name
    Date of Birth (Date Picker)
    Specialty (Database Admin, Software Developer, Web Administrator, Other)
    Email Address 
    Contact Number -->

<h1 class="text-center">Registration for IT Conference</h1>



<form method="post" enctype="multipart/form-data" action="success.php" >
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" placeholder="First Name Only">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="Last Name Only">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class="mb-3">
        <label for="specialty" class="form-label">Specialty</label>
        <!-- <input type="text" class="form-select" id="specialty" name="specialty" aria-describedby="specialty"> -->
        <select class="form-select" aria-label="specialty" id="specialty" name="specialty">
              
        <!-- HARD CODED OPTIONS -->
            <!-- <option selected>Open this select menu</option>
            <option value="1">Database Admin</option>
            <option value="2">Software Developer</option>
            <option value="3">Web Administrator</option>
            <option value="4">Other</option> -->
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>

                    <option  value=" <?php echo $r['specialty_id']; ?>" ><?php echo $r['name']; ?>  </option>
                                         
                <?php } ?>

        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <div id="phoneHelp" class="form-text">We'll never share your contact number.</div>
    </div>
<br>


                    

    <!--Upload file form -->
    <div class = "custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avaatar">Choose file </label>
            <small id="avatar" class="form-text badge text-bg-info">Upload is optional</small>
        </div>


<br>
<br>


    <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>

<br>
<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>