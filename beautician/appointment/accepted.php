<?php 
 session_start();
 if(!isset($_SESSION['username_beautician' ])){
  header('location: login_beautician.php');
 }
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accepted Appointments</title>
  
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
a.success_btn{
    text-decoration:none;
    color:white;
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
          <!-- <li class="nav-content">
            <a class="nav-link" href="../profile/contactus.html" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Details</a>
          </li> -->
          <li class="nav-content"><a class="nav-link" href="../profile/profile1.php" style="text-decoration: none;
    color:white;    
    margin-right:30px ;"><?php echo $_SESSION['username_beautician']; ?></a></li>
          <li class="nav-content"><a class="nav-link" href="../logout_beautician.php" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
          <div class="row mt-4">
             <div class="col-md-3 mb-2">
               <div class="card text-bg-secondary mb-3">
                 <div class="card-body">
                   <h5 class="card-title"><i class="fas fa-users"></i><a href="all.php" style="color:white;"> All Users</a></h5>
                   <p class="card-text"><a href="accepted.php"></a></p>
                 </div>
               </div>
             </div>
             <div class="col-md-3 mb-2">
               <div class="card text-bg-primary mb-3">
                 <div class="card-body">
                   <h5 class="card-title"><i class="fas fa-user"></i><a href="appointment.php" style="color:white;"> Appointment</a></h5>
                   <p class="card-text"></p>
                 </div>
               </div>
             </div>
             <div class="col-md-3 mb-2">
               <div class="card text-bg-danger mb-3">
                 <div class="card-body">
                   <h5 class="card-title"><i class="fas fa-female"></i><a href="rejected.php" style="color:white;">Rejected Appointment </a></h5>
                   <p class="card-text"></p>
                 </div>
               </div>
             </div>
             <div class="col-md-3 mb-2">
               <div class="card text-bg-success mb-3">
                 <div class="card-body">
                   <h5 class="card-title"><i class="fas fa-user-secret"></i> <a href="accepted.php" style="color:white;">Accepted Appointment</a></h5>
                   <p class="card-text"></p>
                 </div>
               </div>
             </div>
           </div>
           <div class="alert alert-success" role="alert">
             Accepted Appointments
           </div>
           <div class="row" style="height: 70vh; overflow: auto;">
             <table
             id="table"
             data-toggle="table"
             data-pagination="true"
             data-page-list="[5, 10, 20, 50]"
             data-escape-title="Your Escape Title"
             data-search="true"  class="table-striped">
             <thead>
               <tr>
                 <th data-field="AptNo">Appointment Number</th>
                 <th data-field="name">Name</th>
                 <th data-field="Mobile">Mobile Number</th>
                 <th data-field="date">Appointment Date</th>
                 <th data-field="time">Appointment Time</th>
                 <th data-field="Service">Requested Service </th>
                 <th data-field="Remarks">Remarks</th>
                 <th data-field="status">Status</th>
                 <th data-field="view">User Details</th>
               </tr>
             </thead>
             <tbody>
 <?php
             include '../dbcon.php';
            //SQL query to fetch user data
            $beautician_name = $_SESSION['username_beautician'];
            //echo $beautician_name;
               $sql = "SELECT* from book_appointment where beautician='$beautician_name' and Status_type = 'selected' ";
               // $query = mysqli_query($con, $sql);
               $result = $con->query($sql);
   
   if ($result -> num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           echo "<tr>";
          echo "<td>" . $row["AptNumber"] . "</td>";
           echo "<td>" . $row["Username_Client"] . "</td>";
           echo "<td>" . $row["Mobile"] . "</td>";
           echo "<td>" . $row["AptDate"] . "</td>";
          echo "<td>" . $row["AptTime"] . "</td>";
          echo "<td>" . $row["Service_Type"] . "</td>";
          echo "<td>" . $row["Remark"] . "</td>";
          echo "<td>" . $row["Status_type"] . "</td>";
          echo '<td><button type="button" class="btn btn-success"><a href="viewdetails.php?UserID=' . $row['UserID'] . ' " class ="success_btn">View Details</a></button> &nbsp;
          <button type="button" class="btn btn-danger">Cancel</button>
          </td>';
           echo "</tr>";
       }
   } 
   else {
       echo "<tr><td colspan='4'>No users found</td></tr>";
   }
   ?> 
   


                 </tbody>
               </table>
               
             </div>
           </div>
         </div>
   </div>
   <script src="./js/bootstrap.bundle.min.js"></script>
      <script src="js/scripts.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
   
</body>   
</html>






        
    
        
