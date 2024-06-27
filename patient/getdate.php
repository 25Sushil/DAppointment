<?php
 ob_start();
    $date = $_GET['date'];

    include '../connection.php';

    $asql = "SELECT * FROM appointment WHERE date='$date';";
    $aresult = mysqli_query($conn, $asql);
    while($arow = mysqli_fetch_assoc($aresult)) { ?>
    <div class="card">
        <div class="title">
            <div class="content">
                <p>Doctor name: <?php $did = $arow['did'];     
                    if($did != ''){
                        $dsql = "SELECT fname FROM doctor where id=$did;";
                        $dresult = mysqli_query($conn, $dsql);
                                            
                        while($drow = mysqli_fetch_assoc($dresult)){
                            echo $drow['fname'];
                        }
                    } ?></p><br>
                <p>Patient name: <?php $name = $arow['fullname'];         
                    echo $name;
                ?></p><br>
                <p>Speciality: <?php $sid = $arow['sid'];   
                    if($sid != ''){
                        $ssql = "SELECT title FROM specialities where id=$sid;";
                        $sresult = mysqli_query($conn, $ssql);
                        
                        while($srow = mysqli_fetch_assoc($sresult)){
                            echo $srow['title'];
                        }
                    }
                ?></p><br>
                <p>Appoint No: <?php echo $arow['id']; ?> </p><br>
                <p>Date: <?php echo $arow['date']; ?></p><br>
                <p>Time: <?php echo $arow['time']; ?></p><br>
            </div>
            <div class="actions">
                <button class="book" type="submit"><a href="../patient/appointment/cancel.php?cancelid=<?php echo $arow['id']; ?>">Cancel Booking</a></button>
            </div>
        </div>
    </div>
<?php }
$output = ob_get_contents();
ob_end_clean();
echo $output;