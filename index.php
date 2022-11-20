<?php 
    $title = "Index";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>

    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
        <!--First name form -->
        <div class = "form-group">
            <label for="firstname">First Name </label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <!--Last name form -->
        <div class = "form-group">
            <label for="lastname">Last Name </label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <!--Date of birth form -->
        <div class = "form-group">
            <label for="dob">Date of Birth </label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <!--dropdown list form -->
        <div class = "form-group">
            <label for="specialty">Speciality</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value = "<?php echo $r['specialty_id'] ?>"> <?php echo $r['name']; ?></option>

                <?php }?>
            </select>
        
        </div>
        <!--email form -->
        <div class = "form-group">
            <label for="email">Email Address </label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!--phone number form -->
        <div class = "form-group">
            <label for="phonenumber">Phone Number </label>
            <input type="text" class="form-control" id="phonenumber" aria-describedby="phoneHelp" name="phonenumber">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            
        </div>
        <!--Upload file form -->
        <div class = "custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avaatar">Choose file </label>
            <small id="avatar" class="form-text badge text-bg-info">Upload is optional</small>
        </div>
        <br/><br/>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<br>
<br>
<br>
<br>
    <?php require_once 'includes/footer.php' ; ?>