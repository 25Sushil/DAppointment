<?php
    include '../../connection.php';
    include '../../session.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `register` WHERE email=$id"; 
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../login.php');
        }else{
            echo 'failed to delete';
        }
    }
?>