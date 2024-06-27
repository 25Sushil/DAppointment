<?php
    include '../../connection.php';
    include '../../session.php';

    if(isset($_GET['cancelid'])){
        $id = $_GET['cancelid'];

        $sql = "DELETE FROM `appointment` WHERE id=$id"; 
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../appoint.php');
        }else{
            echo 'failed to delete';
        }
    }
?>