<?php
    include '../connection.php';
    include '../../admin/session.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `appointment` WHERE id=$id"; 
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../admin/appoint.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>