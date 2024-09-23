<?php
session_start();
include '../dbcon.php';

// Ensure session and check if UserID is set in the URL
if (isset($_GET['UserID'])) {
    $id = intval($_GET['UserID']);
    $_SESSION['UserID'] = $id;
} elseif (!isset($_SESSION['UserID'])) {
    echo 'UserID is not set.';
    exit;
}

// Redirect if UserID is not set in session
if (!isset($_SESSION['UserID']) || empty($_SESSION['UserID'])) {
    header('location: ../login_beautician.php');
    exit;
}

if (isset($_POST['submit'])) {
    $id1 = $_SESSION['UserID'];
    $status = $_POST['status'];
    $remark = $_POST['remark']; // Added missing remark

    $query = mysqli_query($con, "UPDATE book_appointment SET Status_type='$status', Remark='$remark' WHERE UserID='$id1'");
    if ($query) {
        echo '<script>alert("All remarks have been updated.")</script>';
        echo "<script type='text/javascript'> document.location ='appointment.php'; </script>";
    } else {
        echo '<script>alert("Something went wrong. Please try again.")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>landing page</title>
  
    <link rel="stylesheet" href="pri.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.css" rel="stylesheet">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kaisei+HarunoUmi:wght@400;500;700&display=swap');
*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
    font-family: "Kaisei HarunoUmi", serif;
}
.navbar{
    
    width:100%;
    height:95px;
    padding-top: 20px;
    background-color: #365314;


}
.nav-heading{   
    color:white;
    font-weight: 700;
    font-size:30px;
    padding-left:   23px;
}
.navdiv{
    display:flex;
    align-items: center;
    justify-content: space-between;
}

.nav-content{
    list-style: none;
    display:inline-block;
    /* font-weight: 500; */
    margin: 15px;
    font-size: 20px;
}
li a{
    text-decoration: none;
    color:white;    
    margin-left:50px ;
}
a:hover{
    text-decoration: underline;
}
      </style>
  </head>

  <body>
    <nav class="navbar">
      <div class="navdiv">
        <div>
          <h2 class="nav-heading">Beauty Hub</h2>
        </div>
        <ul class="nav-list">
          <li class="nav-content"><a class="nav-link" href="../index.php" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Home</a></li>
          <li class="nav-content"><a class="nav-link" href="dashboard.html" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Dashboard</a></li>
          <li class="nav-content">
            <a class="nav-link" href="appointment.php"  style="text-decoration: underline;
    color:white;    
    margin-right:30px ;">Appointment</a>
          </li>
          <li class="nav-content">
            <!-- <a class="nav-link" href="../profile/contactus.html" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Details</a>
          </li> -->
          <li class="nav-content"><a class="nav-link" href="../index.php" style="text-decoration: none;
    color:white;    
    margin-right:30px ;"><?php echo $_SESSION['username_beautician']; ?></a></li>
          <li class="nav-content"><a class="nav-link" href="logout_beautician.php" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Logout</a></li>
        </ul>
      </div>
    </nav>
<!-- table starts -->
<h3 class="title1" style="margin: 1% 42% 0% 41%;">View Appointment</h3>
<?php
$id = intval($_GET['UserID']);

// SQL query to fetch the user details
$sql = "SELECT register_client.id_client, register_client.email_client, register_client.address_client, book_appointment.UserID, book_appointment.Username_Client, book_appointment.AptNumber, book_appointment.AptDate, book_appointment.AptTime, book_appointment.Service_Type, book_appointment.Status_type, book_appointment.Mobile, book_appointment.Remark from book_appointment join register_client on register_client.id_client = book_appointment.UserID where book_appointment.UserID ='$id' ";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    echo '<table border="1"  style="margin: 1% 27% 0% 22%;width: 800px;">';
    echo '<tr>';
    echo '<th style = "padding : 7px;">ID</th>';
    echo '<td style = "padding : 7px;">' . $row['id_client'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Name</th>';
    echo '<td style = "padding : 7px;">' . $row['Username_Client'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Email</th>';
    echo '<td style = "padding : 7px;">' . $row['email_client'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Mobile</th>';
    echo '<td style = "padding : 7px;">' . $row['Mobile'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Address</th>';
    echo '<td style = "padding : 7px;">' . $row['address_client'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">ID</th>';
    echo '<td style = "padding : 7px;">' . $row['id_client'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Appointment Number</th>';
    echo '<td style = "padding : 7px;">' . $row['AptNumber'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Appointment Date</th>';
    echo '<td style = "padding : 7px;">' . $row['AptDate'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Appointment Time</th>';
    echo '<td style = "padding : 7px;">' . $row['AptTime'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style = "padding : 7px;">Status</th>';
   
   
if($row['Status_type']=="")
{
   echo '<td style = "padding : 7px;"> Not Updated Yet </td>';
}

if($row['Status_type']=="Selected")
{
    echo '<td style = "padding : 7px;"> Selected</td>';
}


if($row['Status_type']=="Rejected")
{
    echo '<td style = "padding : 7px;"> Not Updated Yet </td>';
}
}

echo '</tr>';

;?>
  
						<!-- <table border = "1"> -->
							<?php if($row['Status_type']==""){?>


<form name="submit" method="post" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 

<tr>
    <th style = "padding : 7px;">Remark :</th>
    <td style = "padding : 7px;">
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>

  <tr>
    <th style = "padding : 7px;">Status :</th>
    <td style = "padding : 7px;">
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Selected" selected="true">Selected</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
  </tr>
  </form>
  <?php } else { ?>
						<!-- </table> -->
						<!-- <table class="table table-bordered"> -->
							<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr>
    <th>Status</th>
    <td><?php echo $row['Status_type']; ?></td>
  </tr>


						<!-- </table> -->
						<?php } ?>
						
</body>
</html>
<?php echo "</table>"; ?>

