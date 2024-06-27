<?php
    include '../../admin/connection.php';
    include '../../admin/session.php';

    $useremail = $_SESSION["username"];
    $usql = "SELECT name FROM admin where email='$useremail';";
    $uresult = mysqli_query($conn, $usql);
    $urow = mysqli_fetch_assoc($uresult);

    $id = $_GET['updateid'];
    $sql = "SELECT * FROM `patient` where id=$id";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $speciality = $row['sid'];
    $doctor = $row['did'];

    if(isset($_POST['submit'])){
        $speciality = $_POST['speciality'];
        $doctor = $_POST['doctor'];

        $sql = "UPDATE `patient` SET sid=$speciality, did='$doctor' where id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header ('location: ../../admin/patients.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../../assets/dash1.css">
    <link rel="stylesheet" href="../../assets/appoint.css">
</head>
<body>
    <section class="dashboard">
        <div class="sidebar">
            <header>
                <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
                <h1><?php echo $urow['name']; ?></h1>
                <p><?php echo "". $_SESSION["username"].""; ?></p><br>
                <a href="../admin/logout.php">Log Out</a>
            </header>
            <hr>
            <div class="sidebar-items">
                <ul>
                    <li><a href="../../admin/dash.php"><svg class="icon icon-dashboard"><use xlink:href="#icon-dashboard"></use></svg>Dashboard</a></li>
                    <li><a href="../../admin/doctor.php"><svg class="icon icon-medical_services"><use xlink:href="#icon-medical_services"></use></svg>Doctors</a></li>
                    <li><a href="../../admin/add_doctors.php"><svg class="icon icon-person_add_alt_1"><use xlink:href="#icon-person_add_alt_1"></use></svg>Add Doctor's</a></li>
                    <li><a href="../../admin/patients.php"><svg class="icon icon-accessible_forward"><use xlink:href="#icon-accessible_forward"></use></svg>Patients</a></li>
                    <li><a href="../../admin/schedule.php"><svg class="icon icon-access_alarms"><use xlink:href="#icon-access_alarms"></use></svg>Schedule</a></li>
                    <li><a href="../../admin/appoint.php"><svg class="icon icon-bookmark_outline"><use xlink:href="#icon-bookmark_outline"></use></svg>Appointment</a></li>
                    <li class="active"><a href="../../doctor/update.php"><svg class="icon icon-upload"><use xlink:href="#icon-upload"></use></svg>Update</a></li>
                </ul>
            </div>
        </div>
        <div class="main">     
            <h2 style="color:  black;">Update</h2><br>
            <div class="container">
                <form action="" name="update" method="post">

                    <div class="input-group">
                        <select name="speciality" id="speciality">
                            <option value="speciality">Select Speciality</option>
                            <?php
                                    $ssql = "SELECT id, title FROM specialities";

                                    $s_result = mysqli_query($conn, $ssql);

                                    while($row  = mysqli_fetch_assoc($s_result)){
                                        echo "<option value='" . $row['id'] . "'>" . $row['title']  . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                
                    <div class="input-group">
                        <select name="doctor" id="doctor" required>
                            <option value="doctor">Select Doctor</option>
                            <?php
                                    $ssql = "SELECT id, fname FROM doctor";

                                    $s_result = mysqli_query($conn, $ssql);

                                    while($row  = mysqli_fetch_assoc($s_result)){
                                        echo "<option value='" . $row['id'] . "'>" . $row['fname']  . "</option>";
                                    }
                                ?>
                        </select>
                    </div> 
    
                    <div class="form-footer">
                        <button type="submit" name="submit">Update</button>
                    </div>
            
                </form>
            </div>
        </div>
    </section>

    <svg style="position: absolute; z-index: 1; height: 0; width: 0; overflow: hidden;">
        <defs>
            <symbol id="icon-user" viewBox="0 0 24 32">
                <path d="M12 16c-6.625 0-12 5.375-12 12 0 2.211 1.789 4 4 4h16c2.211 0 4-1.789 4-4 0-6.625-5.375-12-12-12zM6 6c0-3.314 2.686-6 6-6s6 2.686 6 6c0 3.314-2.686 6-6 6s-6-2.686-6-6z"></path>
            </symbol>
            <symbol id="icon-accessible_forward" viewBox="0 0 24 24">
                <path d="M17.016 13.5q0.797 0 1.383 0.609t0.586 1.406v5.484h-1.969v-5.016h-5.016q-1.078 0-1.688-0.961t-0.141-1.945l1.828-4.078h-2.203l-0.656 1.547-1.922-0.563 0.656-1.781q0.516-1.219 1.875-1.219h5.203q1.125 0 1.734 0.938t0.141 1.922l-1.688 3.656h1.875zM14.016 17.016q0 2.063-1.477 3.516t-3.539 1.453-3.539-1.453-1.477-3.516 1.477-3.539 3.539-1.477v2.016q-1.219 0-2.109 0.891t-0.891 2.109 0.891 2.109 2.109 0.891 2.109-0.891 0.891-2.109h2.016zM15 4.547q0-0.844 0.586-1.43t1.43-0.586 1.406 0.586 0.563 1.43-0.563 1.43-1.406 0.586-1.43-0.586-0.586-1.43z"></path>
            </symbol>
            <symbol id="icon-access_alarms" viewBox="0 0 24 24">
                <path d="M12 20.016q2.906 0 4.945-2.063t2.039-4.969-2.039-4.945-4.945-2.039-4.945 2.039-2.039 4.945 2.039 4.969 4.945 2.063zM12 3.984q3.75 0 6.375 2.625t2.625 6.375-2.625 6.375-6.375 2.625-6.375-2.625-2.625-6.375 2.625-6.375 6.375-2.625zM12.516 8.016v5.297l3.984 2.391-0.797 1.219-4.688-2.906v-6h1.5zM7.922 3.422l-4.641 3.797-1.266-1.5 4.594-3.797zM21.984 5.719l-1.266 1.5-4.641-3.938 1.313-1.5z"></path>
            </symbol>
            <symbol id="icon-add_alarm" viewBox="0 0 24 24">
                <path d="M12.984 9v3h3v2.016h-3v3h-1.969v-3h-3v-2.016h3v-3h1.969zM12 20.016q2.906 0 4.945-2.063t2.039-4.969-2.039-4.945-4.945-2.039-4.945 2.039-2.039 4.945 2.039 4.969 4.945 2.063zM12 3.984q3.75 0 6.375 2.648t2.625 6.352-2.625 6.352-6.375 2.648-6.375-2.648-2.625-6.352 2.625-6.352 6.375-2.648zM21.984 5.719l-1.266 1.547-4.594-3.891 1.266-1.5zM7.875 3.375l-4.594 3.844-1.266-1.5 4.594-3.844z"></path>
            </symbol>
            <symbol id="icon-bookmark_outline" viewBox="0 0 24 24">
                <path d="M17.016 18v-12.984h-10.031v12.984l5.016-2.203zM17.016 3q0.797 0 1.383 0.609t0.586 1.406v15.984l-6.984-3-6.984 3v-15.984q0-0.797 0.586-1.406t1.383-0.609h10.031z"></path>
            </symbol>
            <symbol id="icon-medical_services" viewBox="0 0 24 24">
                <path d="M20.016 6h-4.031v-2.016q0-0.797-0.586-1.383t-1.383-0.586h-4.031q-0.797 0-1.383 0.586t-0.586 1.383v2.016h-4.031q-0.797 0-1.383 0.586t-0.586 1.43v12q0 0.797 0.586 1.383t1.383 0.586h16.031q0.797 0 1.383-0.586t0.586-1.383v-12q0-0.844-0.586-1.43t-1.383-0.586zM9.984 3.984h4.031v2.016h-4.031v-2.016zM15.984 15h-3v3h-1.969v-3h-3v-2.016h3v-3h1.969v3h3v2.016z"></path>
            </symbol>
            <symbol id="icon-accessible_forward" viewBox="0 0 24 24">
                <path d="M17.016 13.5q0.797 0 1.383 0.609t0.586 1.406v5.484h-1.969v-5.016h-5.016q-1.078 0-1.688-0.961t-0.141-1.945l1.828-4.078h-2.203l-0.656 1.547-1.922-0.563 0.656-1.781q0.516-1.219 1.875-1.219h5.203q1.125 0 1.734 0.938t0.141 1.922l-1.688 3.656h1.875zM14.016 17.016q0 2.063-1.477 3.516t-3.539 1.453-3.539-1.453-1.477-3.516 1.477-3.539 3.539-1.477v2.016q-1.219 0-2.109 0.891t-0.891 2.109 0.891 2.109 2.109 0.891 2.109-0.891 0.891-2.109h2.016zM15 4.547q0-0.844 0.586-1.43t1.43-0.586 1.406 0.586 0.563 1.43-0.563 1.43-1.406 0.586-1.43-0.586-0.586-1.43z"></path>
            </symbol>
            <symbol id="icon-bookmark_outline" viewBox="0 0 24 24">
                <path d="M17.016 18v-12.984h-10.031v12.984l5.016-2.203zM17.016 3q0.797 0 1.383 0.609t0.586 1.406v15.984l-6.984-3-6.984 3v-15.984q0-0.797 0.586-1.406t1.383-0.609h10.031z"></path>
            </symbol>
            <symbol id="icon-activity" viewBox="0 0 24 24">
                <path d="M22 11h-4c-0.439 0-0.812 0.283-0.949 0.684l-2.051 6.154-5.051-15.154c-0.175-0.524-0.741-0.807-1.265-0.633-0.31 0.103-0.535 0.343-0.633 0.633l-2.772 8.316h-3.279c-0.552 0-1 0.448-1 1s0.448 1 1 1h4c0.423-0.003 0.81-0.267 0.949-0.684l2.051-6.154 5.051 15.154c0.098 0.29 0.323 0.529 0.632 0.632 0.524 0.175 1.090-0.109 1.265-0.632l2.773-8.316h3.279c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path>
            </symbol>
            <symbol id="icon-dashboard" viewBox="0 0 28 28">
                <path d="M6 18c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM9 11c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM15.687 18.516l1.578-5.969c0.125-0.531-0.187-1.078-0.719-1.219v0c-0.531-0.141-1.078 0.187-1.219 0.719l-1.578 5.969c-1.234 0.094-2.312 0.953-2.656 2.219-0.422 1.609 0.547 3.25 2.141 3.672 1.609 0.422 3.25-0.547 3.672-2.141 0.328-1.266-0.203-2.547-1.219-3.25zM26 18c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM16 8c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM23 11c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM28 18c0 2.688-0.766 5.281-2.203 7.547-0.187 0.281-0.5 0.453-0.844 0.453h-21.906c-0.344 0-0.656-0.172-0.844-0.453-1.437-2.25-2.203-4.859-2.203-7.547 0-7.719 6.281-14 14-14s14 6.281 14 14z"></path>
            </symbol>
            <symbol id="icon-person_add_alt_1" viewBox="0 0 24 24">
                <path d="M12.984 8.016q0-1.125-0.539-2.039t-1.43-1.453-2.016-0.539-2.016 0.539-1.43 1.453-0.539 2.039q0 1.078 0.539 1.992t1.43 1.453 2.016 0.539 2.016-0.539 1.43-1.453 0.539-1.992zM15 9.984v2.016h3v3h2.016v-3h3v-2.016h-3v-3h-2.016v3h-3zM0.984 18v2.016h16.031v-2.016q0-0.797-0.563-1.43t-1.477-1.125-1.992-0.797-2.133-0.469-1.852-0.164-1.852 0.164-2.133 0.469-1.992 0.797-1.477 1.125-0.563 1.43z"></path>
            </symbol>
            <symbol id="icon-upload" viewBox="0 0 24 24">
                <path d="M20 15v4c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293h-14c-0.276 0-0.525-0.111-0.707-0.293s-0.293-0.431-0.293-0.707v-4c0-0.552-0.448-1-1-1s-1 0.448-1 1v4c0 0.828 0.337 1.58 0.879 2.121s1.293 0.879 2.121 0.879h14c0.828 0 1.58-0.337 2.121-0.879s0.879-1.293 0.879-2.121v-4c0-0.552-0.448-1-1-1s-1 0.448-1 1zM11 5.414v9.586c0 0.552 0.448 1 1 1s1-0.448 1-1v-9.586l3.293 3.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5-5c-0.092-0.092-0.202-0.166-0.324-0.217-0.245-0.101-0.521-0.101-0.766 0-0.118 0.049-0.228 0.121-0.324 0.217l-5 5c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0z"></path>
            </symbol>
        </defs>
    </svg>

    <script src="../../assets/update.js"></script>
</body>
</html>