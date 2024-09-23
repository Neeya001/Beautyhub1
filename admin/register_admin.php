<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>signup</title>
    <link rel="stylesheet" href="css/signup.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  </head>  

  <body>
    <?php
    include 'dbcon.php';
    if(isset($_POST['submit'])){
      $username =  mysqli_real_escape_string($con, $_POST['username_admin']);
      $email = mysqli_real_escape_string($con, $_POST['email_admin']);
      $mobile = mysqli_real_escape_string($con, $_POST['mobile_admin']);
      $password =  mysqli_real_escape_string($con, $_POST['password_admin']);
      $cpassword =  mysqli_real_escape_string($con, $_POST['cpassword_admin']);
      $pass = password_hash($password, PASSWORD_BCRYPT);
      $cpass= password_hash($cpassword, PASSWORD_BCRYPT);
      $token = bin2hex(random_bytes(15));
      $emailquery = "select * from register_admin where email_admin = '$email' ";
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
          $insertquery = "insert into register_admin(username_admin, email_admin, mobile_admin, password_admin, cpassword_admin, token_admin, status_admin) values('$username', '$email', '$mobile', '$pass', '$cpass', '$token', 'inactive' )";
          $iquery = mysqli_query($con, $insertquery);
          if($iquery){
            $subject = "Email Activation";
            $body = "Hi, $username. Click Here to activate your account.  http://localhost/admin/activate.php?token_admin=$token";
            $sender_email = "From: neeyavaidya2059@gmail.com";

            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "check your mail to activate your account $email";
                header('location: login_admin.php');
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
<div class="container">
      <div class="left-side">
        <img class="picture" src="images/signup.webp" alt="picture" />
      </div>
      <div class="right-side">
        <h2>Create Account</h2>
        <form class="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
          <input type="text" placeholder="Username" name="username_admin" required/>
          <input type="email" placeholder="Email Address " name="email_admin" required/>
          <input type="text" placeholder="Mobile Number " name="mobile_admin" required/>
          <div class="password-field">
            <input type="password" id = "password" placeholder="Set Password" name="password_admin" required />
            <span class="eye-svg-password">
                <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
            </span>
          </div>

          <div class="password-field">
            <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword_admin" required/>
            <span class="eye-svg-password">
                <i class="fa-solid fa-eye-slash" id="toggleConfirmPassword"></i>
            </span>
          </div>

            <button type="submit" name="submit" class="signup">SignUp</button>

          <div class="login-link">
            Already Have an Account? <a href="login_admin.php">Login</a>
          </div>
          <!-- <div class="login-link">
            Register as admin? <a href="register_admin.php">Register Here</a>
          </div> -->
        </form>
      </div>
    </div>
    <script src="js/register.js"></script>
  </body>
</html>
