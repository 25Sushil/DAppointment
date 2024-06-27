<?php
    include("../connection.php");
    include("../admin/session.php");

    $error = 0;
    $err = [];

    if(isset($_POST['submit'])){
        if(empty($_POST['title'])){
            $err['title'] = "Enter title";
            $error ++;
        }else{
            $title = $_POST['title'];
        }

        if(empty($_POST['doctor'])){
            $err['doctor'] = "Enter doctor";
            $error ++;
        }else{
            $doctor = $_POST['doctor'];
        }

        if(empty($_POST['time'])){
            $err['time'] = "Enter time";
            $error ++;
        }else{
            $time = $_POST['time'];
        }

        if(empty($_POST['date'])){
            $err['date'] = "Enter date";
            $error ++;
        }else{
            $date = $_POST['date'];
        }

        if($error == 0){
            $title =$_POST['title'];
            $doctor =$_POST['doctor'];
            $speciality =$_POST['speciality'];
            $patients =$_POST['patients'];
            $time =$_POST['time'];
            $date =$_POST['date'];

            $sql = "INSERT INTO `session`(`title`, `doctor`, `speciality`, `patients`, `time`, `date`) VALUES ('$title','$doctor', '$speciality', '$patients','$time','$date')";

            $result = mysqli_query($conn, $sql);

            if($result){
                echo "Inserted Succesfully";
            }else{
                echo "Failed to Insert";
            }
            header('location: ../admin/schedule.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Session</title>
    <link rel="stylesheet" href="../assets/dash1.css">
    <link rel="stylesheet" href="../assets/session.css">
</head>
<body>
    
<section class="dashboard">
        <div class="sidebar">
            <header>
                <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
                <h1>Administrator</h1>
                <p><?php echo "". $_SESSION["username"].""; ?></p><br>
                <a href="../admin/logout.php">Log Out</a>
            </header>
            <hr>
            <div class="sidebar-items">
                <ul>
                    <li><a href="../admin/dash.php"><svg class="icon icon-dashboard"><use xlink:href="#icon-dashboard"></use></svg>Dashboard</a></li>
                    <li><a href="../admin/doctor.php"><svg class="icon icon-medical_services"><use xlink:href="#icon-medical_services"></use></svg>Doctors</a></li>
                    <li><a href="../admin/add_doctors.php"><svg class="icon icon-person_add_alt_1"><use xlink:href="#icon-person_add_alt_1"></use></svg>Add Doctor's</a></li>
                    <li><a href="../admin/patients.php"><svg class="icon icon-accessible_forward"><use xlink:href="#icon-accessible_forward"></use></svg>Patients</a></li>
                    <li><a href="../admin/schedule.php"><svg class="icon icon-access_alarms"><use xlink:href="#icon-access_alarms"></use></svg>Schedule</a></li>
                    <li class="active"><a href="../admin/add_session.php"><svg class="icon icon-add_alarm"><use xlink:href="#icon-add_alarm"></use></svg>Add Sessions</a></li>
                    <li><a href="../admin/add_speciality.php"><svg class="icon icon-user-plus"><use xlink:href="#icon-user-plus"></use></svg>Add Speciality</a></li>
                    <li><a href="../admin/appoint.php"><svg class="icon icon-bookmark_outline"><use xlink:href="#icon-bookmark_outline"></use></svg>Appointment</a></li>
                </ul>
            </div>
        </div>
        <div class="main">     
            <h2>Add New Session</h2><br>
            <div class="container">
                <form action="#" name="add_session" method="post">
                    
                    <div class="input-group">
                        <label for="title">Session Title:</label><br>
                        <input type="text" id="title" name="title" placeholder="for eg: Dermatologist" value="<?php echo isset($title) ? $title:''; ?>">
                        <span><?php echo isset($err['title'])? $err['title']: ''; ?></span>
                    </div><br>
            
                    <div class="input-group">
                        <label for="doctor">Select Doctor:</label><br>
                        <select name="doctor" id="doctor" value="<?php echo isset($title) ? $$title:''; ?>">
                        <option value="">Choose Doctor</option>
                            <?php
                                $ssql = "SELECT id, fname FROM doctor";

                                $s_result = mysqli_query($conn, $ssql);

                                while($row  = mysqli_fetch_assoc($s_result)){
                                    echo "<option value='" . $row['id'] . "'>" . $row['fname']  . "</option>";
                                }
                            ?>
                        </select>
                    </div><br>

                    <div class="input-group">
                        <label for="speciality">Select speciality:</label><br>
                        <select name="speciality" id="speciality">
                            <option value="">Choose Speciality</option>
                            <?php
                                $ssql = "SELECT id, title FROM specialities";
                                $sresult = mysqli_query($conn, $ssql);

                                while($row  = mysqli_fetch_assoc($sresult)){
                                    echo "<option value='" . $row['id'] . "'>" . $row['title']  . "</option>";
                                }
                            ?>
                        </select>
                    </div><br>

                    <div class="input-group">
                        <label for="patients">Number of Patients:</label><br>
                        <input type="number" id="patients" name="patients" min="0" value="<?php echo isset($patients) ? $patients:''; ?>">
                        <span><?php echo isset($err['patients'])? $err['patients']: ''; ?></span>
                    </div><br>
            
                    <div class="input-group">
                        <label for="time">Schedule Time:</label><br>
                        <input type="time" id="time" name="time" value="<?php echo isset($time) ? $time:''; ?>">
                        <span><?php echo isset($err['time'])? $err['time']: ''; ?></span>
                    </div><br>
            
                    <div class="input-group">
                        <label for="date">Session Date:</label><br>
                        <input type="date" id="date" name="date" value="<?php echo isset($date) ? $date:''; ?>">
                        <span><?php echo isset($err['date'])? $err['date']: ''; ?></span>
                    </div><br>
            
                    <div class="buttons">
                        <button type="reset">Reset</button>
                        <button type="submit" name="submit">Place This Session</button>
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
            <symbol id="icon-user-plus" viewBox="0 0 24 24">
                <path d="M17 21v-2c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464h-7c-1.38 0-2.632 0.561-3.536 1.464s-1.464 2.156-1.464 3.536v2c0 0.552 0.448 1 1 1s1-0.448 1-1v-2c0-0.829 0.335-1.577 0.879-2.121s1.292-0.879 2.121-0.879h7c0.829 0 1.577 0.335 2.121 0.879s0.879 1.292 0.879 2.121v2c0 0.552 0.448 1 1 1s1-0.448 1-1zM13.5 7c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464-2.632 0.561-3.536 1.464-1.464 2.156-1.464 3.536 0.561 2.632 1.464 3.536 2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536zM11.5 7c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121 0.335-1.577 0.879-2.121 1.292-0.879 2.121-0.879 1.577 0.335 2.121 0.879 0.879 1.292 0.879 2.121zM23 10h-2v-2c0-0.552-0.448-1-1-1s-1 0.448-1 1v2h-2c-0.552 0-1 0.448-1 1s0.448 1 1 1h2v2c0 0.552 0.448 1 1 1s1-0.448 1-1v-2h2c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path>
            </symbol>
            <symbol id="icon-update" viewBox="0 0 24 24">
                <path d="M12.516 8.016v4.219l3.469 2.109-0.703 1.219-4.266-2.578v-4.969h1.5zM21 10.125h-6.797l2.766-2.813q-2.063-2.063-4.945-2.086t-4.945 1.992q-0.844 0.844-1.453 2.273t-0.609 2.602 0.609 2.602 1.453 2.273 2.297 1.453 2.625 0.609 2.648-0.609 2.32-1.453q2.016-2.016 2.016-4.875h2.016q0 3.703-2.625 6.281-2.625 2.625-6.375 2.625t-6.375-2.625q-2.625-2.578-2.625-6.258t2.625-6.305q1.078-1.078 2.93-1.852t3.398-0.773 3.398 0.773 2.93 1.852l2.719-2.813v7.125z"></path>
            </symbol>
        </defs>
    </svg>

    <script>
        document.getElementById('date').innerText = new Date().toDateString();
    </script>

    <script src="../assets/session.js"></script>

</body>
</html>