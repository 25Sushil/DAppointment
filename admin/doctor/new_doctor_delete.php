<?php
    include '../../connection.php';
    include '../../session.php';

    if(isset($_GET['deletedid'])){
        $id = $_GET['deletedid'];

        $sql = "DELETE FROM `new_doctor` WHERE id=$id";
        // $sql = "DELETE FROM `patient` WHERE id=$id";
        // $sql = "DELETE FROM `schedule` WHERE id=$id"; 
        // $sql = "DELETE FROM `appointment` WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../admin/doctor.php');
            // echo "<script>alert('Doctor Deleted Successfully');</script>";
        }else{
            echo $query;
            die(mysqli_error($conn));
            // echo 'failed to delete';
        }
    }
?>