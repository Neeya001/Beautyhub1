<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "beautyhub_project";
$con = mysqli_connect($server, $user, $password, $db);
if($con){
    ?>
        <script>
            alert("Connection Successful");
        </script>
    <?php
}
else{
    ?>
        <script>
            alert("NO CONNECTION");
        </script>
    <?php
}
?>