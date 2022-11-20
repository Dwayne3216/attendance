<?php
    class crud{
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;

        }
         
       //function to insert a new record into the attendee datebase 
        public function insertAttendees($fname, $lname, $dob, $email, $phonenumber, $specialty, $filedest){
                try {
                    //define sql statement to be executed and given placeholders values 
                    $sql = "INSERT INTO attendee(firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id, filedest) VALUES (:fname, :lname, :dob, :email, :phonenumber, :specialty, :filedest)";
                    //prepare the sql statement for execution 
                    $stmt = $this->db->prepare($sql);
                    //binds all placeholders to the actual values 
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':lname',$lname);
                    $stmt->bindparam(':dob',$dob);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':contactnumber',$phonenumber);
                    $stmt->bindparam(':specialty',$specialty);
                    $stmt->bindparam(':filedest',$filedest);

                    $stmt->execute();
                    return true;

                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }

        }  
        //function to edit records 
        public function editAttendees($id, $fname, $lname, $dob, $email, $phonenumber, $specialty){
          try{
                $sql = "UPDATE `attendee` SET ,`firstname`= :fname,`lastname`=:lname,`dateofbirth`=:dob,
                    `emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE :id";
                    $stmt = $this->db->prepare($sql);
                    //binds all placeholders to the actual values
                    $stmt->bindparam(':id',$id);
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':lname',$lname);
                    $stmt->bindparam(':dob',$dob);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':contactnumber',$phonenumber);
                    $stmt->bindparam(':specialty',$specialty);

                    $stmt->execute();
                    return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }
        }

        // function to read records from attendees database
        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee`a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    
        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        public function getSpecialtyById($id){
            try{
                $sql = "SELECT * FROM `specialties` where specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false; 
            }



        }

        public function getAttendeeDetail($id){
            try{
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";    
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }


        public function deleteAttendee($id){
            try{
            $sql = "delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            }
            catch(PDOException $e) {
                echo $e->getMessage();
                return false;

            }
        }

    }

?>