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
    <title>landing page</title>
  
    <link rel="stylesheet" href="css/style.css">
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
    margin-right:30px ;
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
          <li class="nav-content"><a class="nav-link" href="#" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Home</a></li>
          <li class="nav-content"><a class="nav-link" href="#second-section" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Dashboard</a></li>
          <li class="nav-content">
            <a class="nav-link" href="../profile/earnwithus.html"  style="text-decoration: underline;
    color:white;    
    margin-right:30px ;">Appointment</a>
          </li>
          <li class="nav-content">
            <a class="nav-link" href="../profile/contactus.html" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Details</a>
          </li>
          <li class="nav-content"><a class="nav-link" href="../login/beauty.html" style="text-decoration: none;
    color:white;    
    margin-right:30px ;"><?php echo $_SESSION['username_beautician']; ?></a></li>
          <li class="nav-content"><a class="nav-link" href="logout.php" style="text-decoration: none;
    color:white;    
    margin-right:30px ;">Logout</a></li>
        </ul>
      </div>
    </nav>
          <div class="container-fluid">
             <div class="row mt-4">      
              <h2>
                  Clients
                </h2>
              <!-- <div class="alert alert-primary" role="alert">
                Clients Information are Given Below
              </div> -->
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>New Appointment Details:</strong> Check Out New Appointments Below
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <div class="row" style="height: 40vh; overflow: auto;">
                <table
                id="table"
                data-toggle="table"
                data-pagination="true"
                data-page-list="[5, 10, 20, 50]"
                data-escape-title="Your Escape Title"
                data-search="true"  class="table-striped">
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Name</th>
                    <th data-field="email">Email</th>
                    <th data-field="phone">Phone Number</th>
                    <th data-field="address">Address</th>
                    <th data-field="view">User Details</th>
                  </tr>
                </thead>
                <tbody>
        <?php
                  include 'dbcon.php';
                 //SQL query to fetch user data
                    $sql = "SELECT id_admin, username_admin, email_admin, mobile_admin, address_admin FROM register_admin";
                    // $query = mysqli_query($con, $sql);
                    $result = $con->query($sql);

        if ($result -> num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_admin"] . "</td>";
                echo "<td>" . $row["username_admin"] . "</td>";
                echo "<td>" . $row["email_admin"] . "</td>";
                echo "<td>" . $row["mobile_admin"] . "</td>";
                echo "<td>" . $row["address_admin"] . "</td>";
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
<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>All </strong> Check Out New Appointments Below
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <div class="row" style="height: 40vh; overflow: auto;">
                <table
                id="table"
                data-toggle="table"
                data-pagination="true"
                data-page-list="[5, 10, 20, 50]"
                data-escape-title="Your Escape Title"
                data-search="true"  class="table-striped">
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Name</th>
                    <th data-field="email">Email</th>
                    <th data-field="phone">Phone Number</th>
                    <th data-field="address">Address</th>
                    <th data-field="view">User Details</th>
                  </tr>
                </thead>
                <tbody>
        <?php
                  include 'dbcon.php';
                 //SQL query to fetch user data
                    $sql = "SELECT id_admin, username_admin, email_admin, mobile_admin, address_admin FROM register_admin";
                    // $query = mysqli_query($con, $sql);
                    $result = $con->query($sql);

        if ($result -> num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_admin"] . "</td>";
                echo "<td>" . $row["username_admin"] . "</td>";
                echo "<td>" . $row["email_admin"] . "</td>";
                echo "<td>" . $row["mobile_admin"] . "</td>";
                echo "<td>" . $row["address_admin"] . "</td>";
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
<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Admin Details</strong> Check Out New Appointments Below
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <div class="row" style="height: 20vh">
                <table
                id="table"
                data-toggle="table"
                data-pagination="true"
                data-page-list="[5, 10, 20, 50]"
                data-escape-title="Your Escape Title"
                data-search="true"  class="table-striped">
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Name</th>
                    <th data-field="email">Email</th>
                    <th data-field="phone">Phone Number</th>
                    <th data-field="address">Address</th>
                    <th data-field="view">User Details</th>
                  </tr>
                </thead>
                <tbody>
        <?php
                  include 'dbcon.php';
                 //SQL query to fetch user data
                    $sql = "SELECT id_admin, username_admin, email_admin, mobile_admin, address_admin FROM register_admin";
                    // $query = mysqli_query($con, $sql);
                    $result = $con->query($sql);

        if ($result -> num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_admin"] . "</td>";
                echo "<td>" . $row["username_admin"] . "</td>";
                echo "<td>" . $row["email_admin"] . "</td>";
                echo "<td>" . $row["mobile_admin"] . "</td>";
                echo "<td>" . $row["address_admin"] . "</td>";
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