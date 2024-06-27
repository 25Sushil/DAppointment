<?php
    include '../connection.php';
    include '../admin/session.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `patient` WHERE id=$id";
        // $sql = "DELETE FROM `appointment` WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../admin/patients.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>