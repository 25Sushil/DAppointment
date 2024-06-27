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

    $err = [];
    $error = 0;

    if(isset($_POST['submit'])){
        if(empty($_POST['fullname'])){
            $err['fullname'] = "Enter full name";
            $error ++;
        } else {
            $fullname = $_POST['fullname'];  
        }

        if(empty($_POST['email'])){
            $err['email'] = "Enter email address";
            $error ++;
        } else {
            $email = $_POST['email'];  
        }

        if(empty($_POST['address'])){
            $err['address'] = "Enter your address";
            $error ++;
        } else {
            $address = $_POST['address'];  
        }

        if(empty($_POST['bloodgrp'])){
            $err['bloodgrp'] = "Choose blood group";
            $error ++;
        }else{
            $bloodgrp = $_POST['bloodgrp'];
        }

        if(empty($_POST['speciality'])){
            $err['speciality'] = "Choose Speciality";
            $error ++;
        }else{
            $speciality = $_POST['speciality'];
        }

        if(empty($_POST['doctor'])){
            $err['doctor'] = "Choose Doctor";
            $error ++;
        }else{
            $doctor = $_POST['doctor'];
        }

        if(empty($_POST['tel'])){
            $err['tel'] = "Enter phone number";
            $error ++;
        } else {
            $tel = $_POST['tel'];  
        }

        if(empty($_POST['date'])){
            $err['date'] = "Enter date";
            $error ++;
        } else {
            $date = $_POST['date'];  
        }

        if(empty($_POST['time'])){
            $err['time'] = "Enter time";
            $error ++;
        } else {
            $time = $_POST['time'];  
        }
        
        if($error == 0){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $bg = $_POST['bloodgrp'];
            $speciality = $_POST['speciality'];
            $doctor = $_POST['doctor'];
            $tel = $_POST['tel'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $sql = "INSERT INTO `appointment`(`fullname`, `email`, `address`, `bg`, `sid`, `did`, `phone`, `date`, `time`) VALUES ('$fullname','$email','$address','$bg','$speciality','$doctor','$tel','$date','$time')";

            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: ../patient/appoint.php");
                // echo '<script> alert("Appointed") </script>';
            }else{
                echo 'failed to appoint!';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../assets/dash1.css">
    <link rel="stylesheet" href="../assets/appoint.css">
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body>
    <section class="dashboard">
        <div class="sidebar">
            <header>
                <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
                <h1><?php echo $urow['fullname']; ?></h1>
                <p><?php echo ''. $_SESSION['username']. ''; ?></p><br>
                <a href="../logout.php">Log Out</a>
            </header>
            <hr>
            <div class="sidebar-items">
                <ul>
                    <li><a href="../patient/dash.php"><svg class="icon icon-dashboard"><use xlink:href="#icon-dashboard"></use></svg>Dashboard</a></li>
                    <li class="active"><a href="../patient/form.php"><svg class="icon icon-text-document"><use xlink:href="#icon-text-document"></use></svg>Appoint Now</a></li>
                    <li><a href="../patient/doctor.php"><svg class="icon icon-medical_services"><use xlink:href="#icon-medical_services"></use></svg>Doctors</a></li>
                    <li><a href="../patient/schedule.php"><svg class="icon icon-access_alarms"><use xlink:href="#icon-access_alarms"></use></svg>Schedule</a></li>
                    <li><a href="../patient/appoint.php"><svg class="icon icon-bookmark_outline"><use xlink:href="#icon-bookmark_outline"></use></svg>Appointment</a></li>
                    <li><a href="../patient/config.php"><svg class="icon icon-cog"><use xlink:href="#icon-cog"></use></svg>Settings</a></li>
                </ul>
            </div>
        </div>
        <section class="main">
            <video autoplay muted loop id="myVideo">
                <source src="../assets/img/HEART beat line overlay Pulse ECG Monitor.mp4" type="video/mp4">
            </video>
            <header>
                <h2>Your Health, Your Schedule, <br> Our Solution</h2>
            </header>
            <div class="container">
                <h5>Make an Appointment</h5>
                <h1>Meet With Our Experts</h1>
                <form action="" method="post" name="register">
        
                    <div class="input-group">
                        <input type="text" id="fullname" name="fullname" placeholder="Enter Your Full Name" value="<?php echo isset($fullname) ? $fullname : ''; ?>">
                        <span><?php echo isset($err['fullname'])? $err['fullname']: ''; ?></span>
                    </div> 
        
                    <div class="input-group">
                        <input type="email" name="email" id="email" placeholder="Email Address" value="<?php echo isset($email) ? $email : ''; ?>">
                        <span><?php echo isset($err['email'])? $err['email']: ''; ?></span>
                    </div> 
        
                    <div class="input-group">
                        <input type="text" name= "address" id="address" placeholder="Enter Your address" value="<?php echo isset($address) ? $address : ''; ?>">
                        <span><?php echo isset($err['address'])? $err['address']: ''; ?></span>
                    </div> 
        
                    <div class="input-group">
                        <select name="bloodgrp" id="bg" value="<?php echo isset($email) ? $email : ''; ?>">
                            <option value="">Select Blood Group</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                        </select>
                        <span><?php echo isset($err['bloodgrp'])? $err['bloodgrp']: ''; ?></span>
                    </div> 
        
                    <div class="input-group">
                        <select name="speciality" id="speciality">
                            <option value="">Select Speciality</option>
                            <?php
                                $ssql = "SELECT id, title FROM specialities";

                                $s_result = mysqli_query($conn, $ssql);

                                while($row  = mysqli_fetch_assoc($s_result)){
                                    echo "<option value='" . $row['id'] . "'>" . $row['title']  . "</option>";
                                }
                            ?>
                        </select>
                        <span><?php echo isset($err['speciality'])? $err['speciality']: ''; ?></span>
                    </div>
        
                    <div class="input-group">
                        <select name="doctor" id="doctor">
                            <option value="">Select Doctor</option>
                            <?php
                                $ssql = "SELECT id, fname FROM doctor";

                                $s_result = mysqli_query($conn, $ssql);

                                while($row  = mysqli_fetch_assoc($s_result)){
                                    echo "<option value='" . $row['id'] . "'>" . $row['fname']  . "</option>";
                                }
                            ?>
                        </select>
                        <span><?php echo isset($err['doctor'])? $err['doctor']: '' ?></span>
                    </div>      
        
                    <div class="input-group one-third">
                        <input type="tel" id="tel" name="tel" placeholder="Phone Number" value="<?php echo isset($tel) ? $tel : ''; ?>">
                        <span><?php echo isset($err['tel'])? $err['tel']: ''; ?></span>
                    </div>
        
                    <div class="input-group one-third">
                        <input type="date" id="inputdate" name="date" value="<?php echo isset($date) ? $date : ''; ?>">
                        <span><?php echo isset($err['date'])? $err['date']: ''; ?></span>
                    </div>
        
                    <div class="input-group one-third">
                        <input type="time" id="time" name="time" value="<?php echo isset($time) ? $time : ''; ?>">
                        <span><?php echo isset($err['time'])? $err['time']: ''; ?></span>
                    </div>
        
                    <div class="form-footer">
                        <button type="submit" name="submit" value="register">Appoint Now</button>
                    </div>
        
                </form>  
            </div>
        </section>
    </section>

    <script src="../assets/jquery.min.js"></script>
    <script>
        let speciality = document.querySelector("#speciality");

        speciality.addEventListener("change", function(){
            $.ajax({
                type: "GET",
                url: "../admin/getdoctor.php",
                data: {id: this.value},
                success: function(data){
                    console.log(data);
                    document.querySelector("#doctor").innerHTML = data ;
                }
            });
        })
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
            <symbol id="icon-bookmark_outline" viewBox="0 0 24 24">
                <path d="M17.016 18v-12.984h-10.031v12.984l5.016-2.203zM17.016 3q0.797 0 1.383 0.609t0.586 1.406v15.984l-6.984-3-6.984 3v-15.984q0-0.797 0.586-1.406t1.383-0.609h10.031z"></path>
            </symbol>
            <symbol id="icon-medical_services" viewBox="0 0 24 24">
                <path d="M20.016 6h-4.031v-2.016q0-0.797-0.586-1.383t-1.383-0.586h-4.031q-0.797 0-1.383 0.586t-0.586 1.383v2.016h-4.031q-0.797 0-1.383 0.586t-0.586 1.43v12q0 0.797 0.586 1.383t1.383 0.586h16.031q0.797 0 1.383-0.586t0.586-1.383v-12q0-0.844-0.586-1.43t-1.383-0.586zM9.984 3.984h4.031v2.016h-4.031v-2.016zM15.984 15h-3v3h-1.969v-3h-3v-2.016h3v-3h1.969v3h3v2.016z"></path>
            </symbol>
            <symbol id="icon-dashboard" viewBox="0 0 28 28">
                <path d="M6 18c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM9 11c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM15.687 18.516l1.578-5.969c0.125-0.531-0.187-1.078-0.719-1.219v0c-0.531-0.141-1.078 0.187-1.219 0.719l-1.578 5.969c-1.234 0.094-2.312 0.953-2.656 2.219-0.422 1.609 0.547 3.25 2.141 3.672 1.609 0.422 3.25-0.547 3.672-2.141 0.328-1.266-0.203-2.547-1.219-3.25zM26 18c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM16 8c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM23 11c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM28 18c0 2.688-0.766 5.281-2.203 7.547-0.187 0.281-0.5 0.453-0.844 0.453h-21.906c-0.344 0-0.656-0.172-0.844-0.453-1.437-2.25-2.203-4.859-2.203-7.547 0-7.719 6.281-14 14-14s14 6.281 14 14z"></path>
            </symbol>
            <symbol id="icon-text-document" viewBox="0 0 20 20">
                <path d="M16 1h-12c-0.553 0-1 0.447-1 1v16c0 0.552 0.447 1 1 1h12c0.553 0 1-0.448 1-1v-16c0-0.552-0.447-1-1-1zM15 17h-10v-14h10v14zM13 5h-6v2h6v-2zM13 13h-6v2h6v-2zM13 9h-6v2h6v-2z"></path>
            </symbol>
            <symbol id="icon-cog" viewBox="0 0 20 20">
                <path d="M16.783 10c0-1.049 0.646-1.875 1.617-2.443-0.176-0.584-0.407-1.145-0.692-1.672-1.089 0.285-1.97-0.141-2.711-0.883-0.741-0.74-0.968-1.621-0.683-2.711-0.527-0.285-1.088-0.518-1.672-0.691-0.568 0.97-1.595 1.615-2.642 1.615-1.048 0-2.074-0.645-2.643-1.615-0.585 0.173-1.144 0.406-1.671 0.691 0.285 1.090 0.059 1.971-0.684 2.711-0.74 0.742-1.621 1.168-2.711 0.883-0.285 0.527-0.517 1.088-0.691 1.672 0.97 0.568 1.615 1.394 1.615 2.443 0 1.047-0.645 2.074-1.615 2.643 0.175 0.584 0.406 1.144 0.691 1.672 1.090-0.285 1.971-0.059 2.711 0.682s0.969 1.623 0.684 2.711c0.527 0.285 1.087 0.518 1.672 0.693 0.568-0.973 1.595-1.617 2.643-1.617 1.047 0 2.074 0.645 2.643 1.617 0.584-0.176 1.144-0.408 1.672-0.693-0.285-1.088-0.059-1.969 0.683-2.711 0.741-0.74 1.622-1.166 2.711-0.883 0.285-0.527 0.517-1.086 0.692-1.672-0.973-0.569-1.619-1.395-1.619-2.442zM10 13.652c-2.018 0-3.653-1.635-3.653-3.652 0-2.018 1.636-3.654 3.653-3.654s3.652 1.637 3.652 3.654c0 2.018-1.634 3.652-3.652 3.652z"></path>
            </symbol>
        </defs>
    </svg>

    <!-- <script src="../assets/form.js"></script> -->
    <script src="../assets/schedule.js"></script>
</body>
</html>