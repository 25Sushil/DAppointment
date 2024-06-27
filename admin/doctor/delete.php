<?php
    include '../../connection.php';
    include '../../session.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `doctor` WHERE id=$id";
        // $sql = "DELETE FROM `patient` WHERE id=$id";
        // $sql = "DELETE FROM `schedule` WHERE id=$id"; 
        // $sql = "DELETE FROM `appointment` WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../admin/doctor.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>