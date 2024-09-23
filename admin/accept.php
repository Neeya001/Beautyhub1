<?php
echo "your accepted the request";
$id = intval($_GET['id_beautician']);

// SQL query to fetch the user details
$sql = "SELECT  email_beautician   FROM register_beautician WHERE id_beautician = $id";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
   $email = $row['email_beautician'];
   if($iquery){
    $subject = "Email Activation";
    $body = "Hi, $username. Click Here to activate your account.  http://localhost/beautyhub/activate.php?token_client=$token";
    $sender_email = "From: neeyavaidya2059@gmail.com";

    if (mail($email, $subject, $body, $sender_email)) {
        $_SESSION['msg'] = "check your mail to activate your account $email";
        header('location: login.php');
    } else {
        echo "Email sending failed... ";
        
    }
  }
}

?>