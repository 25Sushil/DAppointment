<?php
    include('../connection.php');
    include("../admin/session.php");

    $keyword = isset($_GET['keyword'])  ? $_GET['keyword'] : NULL ; //ternary operator
    if(isset($keyword)){
        $sql = "SELECT pa.id, pa.aid, ap.fullname, sp.title, doc.fname from patient as pa INNER JOIN appointment as ap ON pa.aid = ap.id INNER JOIN specialities as sp ON pa.sid = sp.id INNER JOIN doctor as doc ON pa.did = doc.id where fullname like '%$keyword%'";
    }else{
        $sql = "SELECT pa.id, pa.aid, ap.fullname, sp.title, doc.fname from patient as pa INNER JOIN appointment as ap ON pa.aid = ap.id INNER JOIN specialities as sp ON pa.sid = sp.id INNER JOIN doctor as doc ON pa.did = doc.id";
    }
    $result = mysqli_query($conn, $sql);
    
    // $sql = "SELECT pa.id, pa.aid, ap.fullname, sp.title, doc.fname from patient as pa INNER JOIN appointment as ap ON pa.aid = ap.id INNER JOIN specialities as sp ON pa.sid = sp.id INNER JOIN doctor as doc ON pa.did = doc.id";
    // $result = mysqli_query($conn, $sql);

    $useremail = $_SESSION["username_admin"];
    $usql = "SELECT name FROM admin where email='$useremail';";
    $uresult = mysqli_query($conn, $usql);
    $urow = mysqli_fetch_assoc($uresult);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="stylesheet" href="../assets/dash1.css">
</head>
<body>
    <section class="dashboard">
        <div class="sidebar">
            <header>
                <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
                <h1><?php echo $urow['name']; ?></h1>
                <p><?php echo "". $_SESSION["username_admin"].""; ?></p><br>
                <a href="../admin/logout.php">Log Out</a>
            </header>
            <hr>
            <div class="sidebar-items">
                <ul>
                    <li><a href="../admin/dash.php"><svg class="icon icon-dashboard"><use xlink:href="#icon-dashboard"></use></svg>Dashboard</a></li>
                    <li><a href="../admin/doctor.php"><svg class="icon icon-medical_services"><use xlink:href="#icon-medical_services"></use></svg>Doctors</a></li>
                    <li><a href="../admin/add_doctors.php"><svg class="icon icon-person_add_alt_1"><use xlink:href="#icon-person_add_alt_1"></use></svg>Add Doctor's</a></li>
                    <li class="active"><a href="../admin/patients.php"><svg class="icon icon-accessible_forward"><use xlink:href="#icon-accessible_forward"></use></svg>Patients</a></li>
                    <li><a href="../admin/schedule.php"><svg class="icon icon-access_alarms"><use xlink:href="#icon-access_alarms"></use></svg>Schedule</a></li>
                    <li><a href="../admin/add_schedule.php" ><svg class="icon icon-update"><use xlink:href="#icon-update"></use></svg>Add Schedule</a></li>
                    <li><a href="../admin/speciality.php"><svg class="icon icon-injection"><use xlink:href="#icon-injection"></use></svg>Speciality</a></li>
                    <li><a href="../admin/add_speciality.php"><svg class="icon icon-user-plus"><use xlink:href="#icon-user-plus"></use></svg>Add Speciality</a></li>
                    <li><a href="../admin/appoint.php"><svg class="icon icon-bookmark_outline"><use xlink:href="#icon-bookmark_outline"></use></svg>Appointment</a></li>
                </ul>
            </div>
        </div>
        <section class="main">
            <div class="head">
                <form action="#" method="get" class="search-bar">
                    <input type="text" name="keyword" placeholder="Search..">
                    <button type="submit" class="search"><svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg></button>
                </form>
                <div class="date-container">
                    <h1>Today's Date</h1>
                    <p id="date"></p>
                </div>
            </div>
                
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

            <div class="tabular">
                <h2>Patient Detail's</h2><br>
                <table class="table-container">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Speciality</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php 
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td class="event">
                                    <button><a href="../admin/patient/update.php?updateid=<?php echo $row['id']; ?>"><svg class="icon icon-pencil"><use xlink:href="#icon-pencil"></use></svg></a></button>
                                    <button><a href="../admin/patient/delete.php?deleteid=<?php echo $row['id']; ?>"><svg class="icon icon-trash"><use xlink:href="#icon-trash"></use></svg></a></button>
                                    <button><a href="../admin/patient/complete.php?completeid=<?php echo $row['aid']; ?>"><svg class="icon icon-checkmark"><use xlink:href="#icon-checkmark"></use></svg></a></button>
                                </td>
                        </tr>
                            <?php   
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
    
    <script>
        document.getElementById('date').innerText = new Date().toDateString();
    </script>

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
            <symbol id="icon-eye" viewBox="0 0 24 24">
                <path d="M0.106 11.553c-0.136 0.274-0.146 0.603 0 0.894 0 0 0.396 0.789 1.12 1.843 0.451 0.656 1.038 1.432 1.757 2.218 0.894 0.979 2.004 1.987 3.319 2.8 1.595 0.986 3.506 1.692 5.698 1.692s4.103-0.706 5.698-1.692c1.315-0.813 2.425-1.821 3.319-2.8 0.718-0.786 1.306-1.562 1.757-2.218 0.724-1.054 1.12-1.843 1.12-1.843 0.136-0.274 0.146-0.603 0-0.894 0 0-0.396-0.789-1.12-1.843-0.451-0.656-1.038-1.432-1.757-2.218-0.894-0.979-2.004-1.987-3.319-2.8-1.595-0.986-3.506-1.692-5.698-1.692s-4.103 0.706-5.698 1.692c-1.315 0.813-2.425 1.821-3.319 2.8-0.719 0.786-1.306 1.561-1.757 2.218-0.724 1.054-1.12 1.843-1.12 1.843zM2.14 12c0.163-0.281 0.407-0.681 0.734-1.158 0.41-0.596 0.94-1.296 1.585-2.001 0.805-0.881 1.775-1.756 2.894-2.448 1.35-0.834 2.901-1.393 4.647-1.393s3.297 0.559 4.646 1.393c1.119 0.692 2.089 1.567 2.894 2.448 0.644 0.705 1.175 1.405 1.585 2.001 0.328 0.477 0.572 0.876 0.734 1.158-0.163 0.281-0.407 0.681-0.734 1.158-0.41 0.596-0.94 1.296-1.585 2.001-0.805 0.881-1.775 1.756-2.894 2.448-1.349 0.834-2.9 1.393-4.646 1.393s-3.297-0.559-4.646-1.393c-1.119-0.692-2.089-1.567-2.894-2.448-0.644-0.705-1.175-1.405-1.585-2.001-0.328-0.477-0.572-0.877-0.735-1.158zM16 12c0-1.104-0.449-2.106-1.172-2.828s-1.724-1.172-2.828-1.172-2.106 0.449-2.828 1.172-1.172 1.724-1.172 2.828 0.449 2.106 1.172 2.828 1.724 1.172 2.828 1.172 2.106-0.449 2.828-1.172 1.172-1.724 1.172-2.828zM14 12c0 0.553-0.223 1.051-0.586 1.414s-0.861 0.586-1.414 0.586-1.051-0.223-1.414-0.586-0.586-0.861-0.586-1.414 0.223-1.051 0.586-1.414 0.861-0.586 1.414-0.586 1.051 0.223 1.414 0.586 0.586 0.861 0.586 1.414z"></path>
            </symbol>
            <symbol id="icon-trash" viewBox="0 0 20 20">
                <path d="M6 2l2-2h4l2 2h4v2h-16v-2h4zM3 6h14l-1 14h-12l-1-14zM8 8v10h1v-10h-1zM11 8v10h1v-10h-1z"></path>
            </symbol>
            <symbol id="icon-person_add_alt_1" viewBox="0 0 24 24">
                <path d="M12.984 8.016q0-1.125-0.539-2.039t-1.43-1.453-2.016-0.539-2.016 0.539-1.43 1.453-0.539 2.039q0 1.078 0.539 1.992t1.43 1.453 2.016 0.539 2.016-0.539 1.43-1.453 0.539-1.992zM15 9.984v2.016h3v3h2.016v-3h3v-2.016h-3v-3h-2.016v3h-3zM0.984 18v2.016h16.031v-2.016q0-0.797-0.563-1.43t-1.477-1.125-1.992-0.797-2.133-0.469-1.852-0.164-1.852 0.164-2.133 0.469-1.992 0.797-1.477 1.125-0.563 1.43z"></path>
            </symbol>
            <symbol id="icon-search" viewBox="0 0 32 32">
                <path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path>
            </symbol>
            <symbol id="icon-user-plus" viewBox="0 0 24 24">
                <path d="M17 21v-2c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464h-7c-1.38 0-2.632 0.561-3.536 1.464s-1.464 2.156-1.464 3.536v2c0 0.552 0.448 1 1 1s1-0.448 1-1v-2c0-0.829 0.335-1.577 0.879-2.121s1.292-0.879 2.121-0.879h7c0.829 0 1.577 0.335 2.121 0.879s0.879 1.292 0.879 2.121v2c0 0.552 0.448 1 1 1s1-0.448 1-1zM13.5 7c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464-2.632 0.561-3.536 1.464-1.464 2.156-1.464 3.536 0.561 2.632 1.464 3.536 2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536zM11.5 7c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121 0.335-1.577 0.879-2.121 1.292-0.879 2.121-0.879 1.577 0.335 2.121 0.879 0.879 1.292 0.879 2.121zM23 10h-2v-2c0-0.552-0.448-1-1-1s-1 0.448-1 1v2h-2c-0.552 0-1 0.448-1 1s0.448 1 1 1h2v2c0 0.552 0.448 1 1 1s1-0.448 1-1v-2h2c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path>
            </symbol>
            <symbol id="icon-injection" viewBox="0 0 32 32">
                <path d="M24.16 9.207c0.378 0.377 0.378 0.989 0 1.367s-0.685 0.684-0.685 0.684l0.685 0.684c0.755 0.755 0.755 1.979 0 2.735l-10.255 10.253c-0.756 0.756-1.98 0.756-2.735 0l-0.684-0.684-2.734 2.736 1.367 1.367c0.378 0.377 0.378 0.988 0 1.367-0.378 0.377-0.99 0.377-1.367 0l-5.47-5.471c-0.377-0.377-0.377-0.988 0-1.367 0.378-0.377 0.99-0.377 1.367 0l1.367 1.367 2.735-2.734-0.684-0.684c-0.756-0.754-0.756-1.979 0-2.734l10.256-10.254c0.756-0.756 1.979-0.756 2.734 0l0.684 0.684c0 0 0.307-0.307 0.684-0.684 0.378-0.378 0.99-0.378 1.367 0l0.342 0.342 5.47-5.47v1.367l-4.786 4.786 0.342 0.343zM19.374 8.523c-0.377-0.378-0.989-0.378-1.367 0l-2.051 2.051 1.367 1.367-0.684 0.684-1.367-1.367-2.051 2.051 1.367 1.368-0.684 0.684-1.368-1.368-0.684 0.684 2.735 2.734-0.684 0.684-2.735-2.734-2.049 2.049 2.734 2.734-0.684 0.684-2.734-2.734-0.684 0.684c-0.378 0.377-0.378 0.99 0 1.367l4.102 4.102c0.378 0.379 0.99 0.379 1.368 0l10.254-10.254c0.379-0.377 0.379-0.989 0-1.367l-4.101-4.103zM16.64 9.89l0.684-0.684 2.734 2.734-0.684 0.684-2.734-2.734zM16.64 15.359l-2.734-2.735 0.684-0.684 2.734 2.735-0.684 0.684zM9.803 16.727l0.684-0.684 1.367 1.367-0.684 0.684-1.367-1.367zM29.942 9.386c0 0.725-0.588 1.312-1.312 1.312-0.726 0-1.313-0.588-1.313-1.312 0-0.726 1.313-2.708 1.313-2.708s1.312 1.983 1.312 2.708z"></path>
            </symbol>
            <symbol id="icon-update" viewBox="0 0 24 24">
                <path d="M12.516 8.016v4.219l3.469 2.109-0.703 1.219-4.266-2.578v-4.969h1.5zM21 10.125h-6.797l2.766-2.813q-2.063-2.063-4.945-2.086t-4.945 1.992q-0.844 0.844-1.453 2.273t-0.609 2.602 0.609 2.602 1.453 2.273 2.297 1.453 2.625 0.609 2.648-0.609 2.32-1.453q2.016-2.016 2.016-4.875h2.016q0 3.703-2.625 6.281-2.625 2.625-6.375 2.625t-6.375-2.625q-2.625-2.578-2.625-6.258t2.625-6.305q1.078-1.078 2.93-1.852t3.398-0.773 3.398 0.773 2.93 1.852l2.719-2.813v7.125z"></path>
            </symbol>
            <symbol id="icon-pencil" viewBox="0 0 20 20">
                <path d="M14.69 2.661c-1.894-1.379-3.242-1.349-3.754-1.266-0.144 0.023-0.265 0.106-0.35 0.223l-6.883 9.497c-0.277 0.382-0.437 0.836-0.462 1.307l-0.296 5.624c-0.021 0.405 0.382 0.698 0.76 0.553l5.256-2.010c0.443-0.17 0.828-0.465 1.106-0.849l6.88-9.494c0.089-0.123 0.125-0.273 0.1-0.423-0.084-0.526-0.487-1.802-2.357-3.162zM8.977 15.465l-2.043 0.789c-0.080 0.031-0.169 0.006-0.221-0.062-0.263-0.335-0.576-0.667-1.075-1.030-0.499-0.362-0.911-0.558-1.31-0.706-0.080-0.030-0.131-0.106-0.126-0.192l0.122-2.186 0.549-0.755c0 0 1.229-0.169 2.833 0.998 1.602 1.166 1.821 2.388 1.821 2.388l-0.55 0.756z"></path>
            </symbol>
            <symbol id="icon-checkmark" viewBox="0 0 32 32">
                <path d="M28.998 8.531l-2.134-2.134c-0.394-0.393-1.030-0.393-1.423 0l-12.795 12.795-6.086-6.13c-0.393-0.393-1.029-0.393-1.423 0l-2.134 2.134c-0.393 0.394-0.393 1.030 0 1.423l8.924 8.984c0.393 0.393 1.030 0.393 1.423 0l15.648-15.649c0.393-0.392 0.393-1.030 0-1.423z"></path>
            </symbol>
        </defs>
    </svg>

</body>
</html>