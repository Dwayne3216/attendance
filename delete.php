<?php 
require_once 'db/conn.php';

    if(!$_GET['id']){
        //echo 'error';
        include 'includes/errorMessage.php';
        header("Location: viewrecords.php");
    }else{
        //Get ID Values
        $id =$_GET['id'];

        //Call Delete Function
        $result = $crud->deleteAttendee($id);

        //Redirect to list
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            //echo 'Error';
            include 'includes/errorMessage.php';
        }

    }




?>