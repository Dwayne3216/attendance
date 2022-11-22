
<?php

class crud
{
    // private database object
    private $db; 

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    { //initialising an object of a class

        $this->db = $conn;   //this gives all the private and public attributes within this class
    }                           //CREATE
    public function insertAttendees($firstname, $lastname, $dob, $email, $phone, $specialty, $avatar_path)
    {

        try {
            //define sql statement to be executed
            $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id, avatar_path) VALUES (:firstname, :lastname, :dob, :email, :contact, :specialty, :avatar_path)";

            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);

            //bind all placeholders to the actual values
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $phone);
            $stmt->bindparam(':specialty', $specialty);
            $stmt->bindparam(':avatar_path', $avatar_path);

            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }

    
       
    //EDIT
    public function editAttendee($id, $firstname, $lastname, $dob, $email, $phone, $specialty)
    {

        try {

            $sql = "UPDATE `attendee` SET `firstname`=:firstname,`lastname`=:lastname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:phone,
                `specialty_id`=:specialty WHERE attendee_id =:id";

            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':phone', $phone); 
            $stmt->bindparam(':specialty', $specialty);
            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }




    // READ
    public function getAttendees()
    {

        try {
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getAttendeeDetails($id)
    {
    
        try {
            $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where
                attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    //DELETE Attendee
    public function deleteAttendee($id)
    {
        try {
            $sql = "delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage(); //"e" represents the object of a class
            return false;
        }
    }



    public function getSpecialties()
    {
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }


    public function getSpecialtyById($id)
    {

        try {
            $sql = "SELECT * FROM `specialties` where specialty_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); //"e" represents the object of a class
            return false;
        }
    }
}
?>