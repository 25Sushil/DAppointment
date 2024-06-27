<?php
    include '../connection.php';
    include '../../admin/session.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `schedule` WHERE id=$id"; 
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../admin/schedule.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>