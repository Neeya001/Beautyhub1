<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn With Us - Beauty Hub</title>
    <link rel="stylesheet" href="css/earnwithus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
    <?php
    include 'dbcon.php';
    if(isset($_POST['submit'])){
      $username =  mysqli_real_escape_string($con, $_POST['username_beautician']);
      $email = mysqli_real_escape_string($con, $_POST['email_beautician']);
      $mobile = mysqli_real_escape_string($con, $_POST['mobile_beautician']);
      $password =  mysqli_real_escape_string($con, $_POST['password_beautician']);
      $cpassword =  mysqli_real_escape_string($con, $_POST['cpassword_beautician']);
      $pass = password_hash($password, PASSWORD_BCRYPT);
      $cpass= password_hash($cpassword, PASSWORD_BCRYPT);
      $photo = $_FILES['photo_beautician']['name'];
      $temp_photo = $_FILES['photo_beautician']['tmp_name'];
      $folder = "uploads/";
      move_uploaded_file($temp_photo, $folder.$photo);
      $cv = $_FILES['cv_beautician']['name'];
      $temp_cv = $_FILES['photo_beautician']['tmp_name'];
      move_uploaded_file($temp_cv, $folder.$cv);
      $type = mysqli_real_escape_string($con, $_POST['type_beautician']);
      $token = bin2hex(random_bytes(15));
      $emailquery = "select * from register_beautician where email_beautician = '$email' ";
      $query = mysqli_query($con, $emailquery);
      $emailcount = mysqli_num_rows($query);
      if($emailcount > 0){
        ?>
        <script>
            alert("Email already exists");
        </script>
      <?php
      }
      else{
        if($password === $cpassword){
          $insertquery = "insert into register_beautician(username_beautician, email_beautician, mobile_beautician, password_beautician, cpassword_beautician, photo_beautician, cv_beautician, type_beautician, token_beautician, status_beautician) values('$username', '$email', '$mobile', '$pass', '$cpass', '$photo','$cv', '$type', '$token', 'inactive' )";
          $iquery = mysqli_query($con, $insertquery);
          if($iquery){
            $subject = "Email Activation";
            $body = "Hi, $username. Click Here to activate your account.  http://localhost/beautician/activate.php?token_beautician=$token";
            $sender_email = "From: neeyavaidya2059@gmail.com";

            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "check your mail to activate your account $email";
                header('location: login_beautician.php');
            } else {
                echo "Email sending failed... ";
                
            }
          }
          else{
            ?>
              <script>
                  alert("No inserted");
              </script>
            <?php
          }
        }
        else{
        ?>
        <script>
            alert("Password are not matching");
        </script>
      <?php
      }
    } 
    }
  ?>    
    <header>
        <nav>
            <div class="logo">Beauty Hub</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="appointment/dashboard.html">Dashboard</a></li>
                <li><a href="appointment/appointment.php">Appointment</a></li>
                <li class="nav-content">
            <a class="nav-link" href="#">Earn With Us</a>
          </li>
                <li><a href="#">Contact Us</a></li>
                <li class="nav-content"><a class="nav-link" href="./profile/profile1.php"><?php echo $_SESSION['username_beautician']; ?></a></li>
                <li><a href="logout_beautician.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="earn-with-us">
            <h2>Earn With Us</h2>
            <h3>Register As a Beautician & Earn With Us</h3>
            <div class="container">
                <div class="register-form">
                    <form class="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <h2>Register Now</h2>
                        <div class="form-group">
                            <input type="text" name="username_beautician" placeholder="Full Name" required>&nbsp;&nbsp;
                            <!-- <input type="text" name="last-name" placeholder="Last Name" required> -->
                        </div>
                        <input type="text" name="mobile_beautician" placeholder="Mobile Number" required>
                       <input type="email" name="email_beautician" placeholder="Email Address" required>
                        <input type="password" name="password_beautician" placeholder="Enter Password" required>
                        <input type="password" name="cpassword_beautician" placeholder="Re-enter Password" required>
                       <h>Upload Your Photo</h>
                        <div class="form-group">
                          <input type="file" id="photo-upload" name="photo_beautician" accept="image/*" required>
                        </div>
                        <h>Upload Your CV with certificate(in pdf)</h>
                        <div class="form-group">
                            <input type="file" name="cv_beautician"  accept ="application/pdf " required>
                        </div>
                        <h>Service Type</h>
                        <div class="form-group">
                            <div class="radio-group">
                    
                                    <input type="radio" id="photo" name="type_beautician" value="Freelancer"> Freelancer
                                    <br>
                                    <input type="radio" id="gender" name="type_beautician" value="Salon"> Salon<br> 
                                   
                               
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" name="submit" >Register</button>
                            <button type="cancel" name="cancel" class="cancel-button">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="image-info">
                    <img src="images/earnwithus.jpg" alt="Beautician Tools">
                </div>
            </div>
        </section>
        <section class="faq">
            <div>
                <h3>FAQs</h3>
                <h1>Be Beautician At Beauty Hub</h1>
                <div class="contact-us">
                <h>For further Queries - Contact Us</h>
                <button>Contact Us</button>
            </div>
        </div>
            <div class="box">
                <ol>
                    <li>Register Yourself as a Beautician.</li>
                    <br>
                    <li>Provide your CV along with certificate.</li>
                    <br>
                    <li>Add your location in this site.</li>
                    <br>
                    <li>Stay online to get service request.</li>
                    <br>
                    <li>After getting service request, contact with clients.</li>
                    <br>
                    <li>Confirm appointment date and time.</li>
                    <br>
                    <li>Look client's location and give services.</li>
                </ol>
              </div>
            
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Beauty Hub</h3>
                <p><i class="fa-solid fa-envelope fa-xl"></i>&nbsp; beautyhub@gmail.com</p>
                <br>
                <p><i class="fa-solid fa-phone-volume fa-xl"></i>&nbsp; +977 986-87309</p>
                <div class="social-icons">
                    <i class="fa-brands fa-facebook fa-xl"></i>
                    <i class="fa-brands fa-tiktok fa-xl"></i>
                    <i class="fa-brands fa-youtube fa-xl"></i>
                    <i class="fa-brands fa-linkedin fa-xl"></i>
                </div>
            </div>
            <div class="footer-section">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Become Beautician</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Features</h3>
                <ul>
                    <li><a href="#">Ease Service</a></li>
                    <li><a href="#">Location Track</a></li>
                    <li><a href="#">Rating & Feedback</a></li>
                    <li><a href="#">Ease communicate</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Forum</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Beauty Hub. All rights Reserved</p>
        </div>
    </footer>
</body>
</html>
