<?php
    include('../connection.php');
    include("../session.php");

    $sql = "SELECT * FROM register";

    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    $useremail = $_SESSION["username"];
    $usql = "SELECT fullname FROM register where email='$useremail';";
    $uresult = mysqli_query($conn, $usql);
    $urow = mysqli_fetch_assoc($uresult);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/dash1.css">
    <script src="../assets/script.js"></script>
</head>
<body>
    <section class="dashboard">
        <div class="sidebar">
            <!-- <span class="menu-toggle js-menu-toggle">
                <svg class="icon icon-bars"><use xlink:href="#icon-bars"></use></svg>
            </span> -->
            <header>
                <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
                <h1><?php echo $urow['fullname']; ?></h1>
                <p><?php echo "". $email.""; ?></p><br>
                <a href="../logout.php">Log Out</a>
            </header>
            <hr>
            <div class="sidebar-items">
                <ul>
                    <li class="active"><a href="../patient/dash.php"><svg class="icon icon-dashboard"><use xlink:href="#icon-dashboard"></use></svg>Dashboard</a></li>
                    <li><a href="../patient/form.php"><svg class="icon icon-text-document"><use xlink:href="#icon-text-document"></use></svg>Appoint Now</a></li>
                    <li><a href="../patient/doctor.php"><svg class="icon icon-medical_services"><use xlink:href="#icon-medical_services"></use></svg>Doctors</a></li>
                    <li><a href="../patient/schedule.php"><svg class="icon icon-access_alarms"><use xlink:href="#icon-access_alarms"></use></svg>Schedule</a></li>
                    <li><a href="../patient/appoint.php"><svg class="icon icon-bookmark_outline"><use xlink:href="#icon-bookmark_outline"></use></svg>Appointment</a></li>
                    <li><a href="../patient/config.php"><svg class="icon icon-cog"><use xlink:href="#icon-cog"></use></svg>Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="head">

                <div class="head-bar">
                    <h2>Dashboard</h2>
                </div>

                <div class="date-container">
                    <h1>Today's Date</h1>
                    <p id="date"></p><br>
                </div>
            </div>

            <div class="banner hasbg bgfull-fixed" style="background-image: url('../assets/img/doctorgrd.jpg'); color: white;">
                <h2>Welcome!</h2>
                <h3><?php echo $urow['fullname']; ?>.</h3>
                <p>Thank's for joining with us. <br> We always trying to get you a complete service .</p>

                <div class="button" style="display: flex; justify-content: space-around;">
                    <button class="view"><a href="../patient/appoint.php">View My Appointments</a></button>
                    <button class="view"><a href="../patient/form.php">Appoint Now</a></button>
                    <button class="view"><a href="../patient/doctor.php">View Doctors</a></button>
                    <button class="view"><a href="../patient/schedule.php">View Schedule</a></button>
                </div>
            </div><br>
                
            <div class="status">
                <div class="status-bar">
                    <h2>Status</h2>
                </div>
                <div class="dash-collection">
            
                    <div class="doc">
                        <?php
                            $dsql = "SELECT * FROM doctor";
                            $dresult = mysqli_query($conn, $dsql);

                            if($drow = mysqli_num_rows($dresult)){
                                echo '<h3>'.$drow.'</h3>';
                            }else{
                                echo '<h3>0</h3>';
                            }
                        ?>
                        <svg class="icon icon-medical_services"><use xlink:href="#icon-medical_services"></use></svg><br>
                        <h4>Doctor's</h4><br>
                    </div>
            
                    <div class="doc">
                        <?php
                            $psql = "SELECT * FROM patient";
                            $presult = mysqli_query($conn, $psql);

                            if($prow = mysqli_num_rows($presult)){
                                echo '<h3>'.$prow.'</h3>';
                            }else{
                                echo '<h3>0</h3>';
                            }
                        ?>
                        <svg class="icon icon-accessible_forward"><use xlink:href="#icon-accessible_forward"></use></svg><br>
                        <h4>Patient's</h4><br>
                    </div>
            
                    <div class="doc">
                        <?php
                            $asql = "SELECT * FROM appointment";
                            $aresult = mysqli_query($conn, $asql);

                            if($arow = mysqli_num_rows($aresult)){
                                echo '<h3>'.$arow.'</h3>';
                            }else{
                                echo '<h3>0</h3>';
                            }
                        ?>
                        <svg class="icon icon-bookmark_outline"><use xlink:href="#icon-bookmark_outline"></use></svg><br>
                        <h4>Appointment's</h4><br>
                    </div>

                    <div class="doc">
                        <?php
                            $ssql = "SELECT * FROM schedule";
                            $sresult = mysqli_query($conn, $ssql);

                            if($srow = mysqli_num_rows($sresult)){
                                echo '<h3>'.$srow.'</h3>';
                            }else{
                                echo '<h3>0</h3>';
                            }
                        ?>
                        <svg class="icon icon-activity"><use xlink:href="#icon-activity"></use></svg><br>
                        <h4>Schedule's</h4><br>
                    </div>
                </div>
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
            <symbol id="icon-search" viewBox="0 0 32 32">
                <path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path>
            </symbol>
            <symbol id="icon-text-document" viewBox="0 0 20 20">
                <path d="M16 1h-12c-0.553 0-1 0.447-1 1v16c0 0.552 0.447 1 1 1h12c0.553 0 1-0.448 1-1v-16c0-0.552-0.447-1-1-1zM15 17h-10v-14h10v14zM13 5h-6v2h6v-2zM13 13h-6v2h6v-2zM13 9h-6v2h6v-2z"></path>
            </symbol>
            <symbol id="icon-cog" viewBox="0 0 20 20">
                <path d="M16.783 10c0-1.049 0.646-1.875 1.617-2.443-0.176-0.584-0.407-1.145-0.692-1.672-1.089 0.285-1.97-0.141-2.711-0.883-0.741-0.74-0.968-1.621-0.683-2.711-0.527-0.285-1.088-0.518-1.672-0.691-0.568 0.97-1.595 1.615-2.642 1.615-1.048 0-2.074-0.645-2.643-1.615-0.585 0.173-1.144 0.406-1.671 0.691 0.285 1.090 0.059 1.971-0.684 2.711-0.74 0.742-1.621 1.168-2.711 0.883-0.285 0.527-0.517 1.088-0.691 1.672 0.97 0.568 1.615 1.394 1.615 2.443 0 1.047-0.645 2.074-1.615 2.643 0.175 0.584 0.406 1.144 0.691 1.672 1.090-0.285 1.971-0.059 2.711 0.682s0.969 1.623 0.684 2.711c0.527 0.285 1.087 0.518 1.672 0.693 0.568-0.973 1.595-1.617 2.643-1.617 1.047 0 2.074 0.645 2.643 1.617 0.584-0.176 1.144-0.408 1.672-0.693-0.285-1.088-0.059-1.969 0.683-2.711 0.741-0.74 1.622-1.166 2.711-0.883 0.285-0.527 0.517-1.086 0.692-1.672-0.973-0.569-1.619-1.395-1.619-2.442zM10 13.652c-2.018 0-3.653-1.635-3.653-3.652 0-2.018 1.636-3.654 3.653-3.654s3.652 1.637 3.652 3.654c0 2.018-1.634 3.652-3.652 3.652z"></path>
            </symbol>
            <symbol id="icon-bars" viewBox="0 0 24 28">
                <path fill="currentColor" d="M24 21v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 13v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 5v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1z"></path>
            </symbol>
        </defs>
    </svg>

    <script>
        document.getElementById('date').innerText = new Date().toDateString();
    </script>
</body>
</html>