<?php 
 session_start();
 if(!isset($_SESSION['username_admin' ])){
  header('location: login_admin.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Admin Panel</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.css" rel="stylesheet">

      <style>
        .nav-link {
            color: grey;
        }
        .nav-link.active,
        .nav-link:hover {
            color: white;
        }
    </style>
    </head>
 

 <body class="">
                              <?php
                               include 'dbcon.php';
                               //client
                                    $sql1 = "SELECT COUNT(*) as username_client FROM register_client";
                                    $result1 = $con->query($sql1);
                                    if ($result1->num_rows > 0) {
                                        $row = $result1->fetch_assoc();
                                        $total_client = $row['username_client'];
                                    } else {
                                        echo "No users found.";
                                    }
                                    //beautician
                                    $sql2 = "SELECT COUNT(*) as username_beautician FROM register_beautician";
                                    $result2 = $con->query($sql2);
                                    
                                    if ($result2->num_rows > 0) {
                                        $row = $result2->fetch_assoc();
                                        $total_beautician = $row['username_beautician'];
                                    }
                                   else {
                                    echo "No users found.";
                                }
                                //admin
                                $sql3 = "SELECT COUNT(*) as username_admin FROM register_admin";
                                $result3 = $con->query($sql3);
                                
                                if ($result3->num_rows > 0) {
                                    $row = $result3->fetch_assoc();
                                    $total_admin = $row['username_admin'];
                                }
                               else {
                                echo "No users found.";
                            }
                            $total_users = $total_admin + $total_beautician + $total_client;
                              ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
           <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading bg-dark text-white">Admin Panel</div>
     

        <div class="list-group list-group-flush pt-2 ps-1">
       
           <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="fas fa-home" style="font-size:14px;"></i>
                    <span data-feather="home ml-2"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_profile.html">
                    <i class="fas fa-user" style="font-size:14px;"></i>
                    User Profile
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="notification.html">
                    <i class="fas fa-bell" style="font-size:14px;"></i>
                    Notification
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="client.php">
                    <i class="fas fa-users" style="font-size:14px;"></i>
                    Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="beautician.php">
                    <i class="fas fa-female" style="font-size:14px;"></i>
                    Beautician
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-user-secret" style="font-size:14px;"></i>
                    Admin
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                  <i class="fas fa-user-secret" style="font-size:14px;"></i>
                  Admin
              </a>
          </li>
        </ul>
      </div>
        </div>
            <div id="page-content-wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                <div class="container-fluid">
                   
                <button class="navbar-toggler" id="sidebarToggle" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                    <div class="ml-auto">
                      <ul class="navbar-nav navbar-right">
                          <li class="nav-item text-nowrap">
                              <a class="nav-link px-3" href="#">
                                <?php echo $_SESSION['username_admin']; ?>
                              </a>
                          </li>
                      </ul>
                  </div>          
                    <div class="ml-auto">
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item text-nowrap">
                                <a class="nav-link px-3" href="logout_admin.php">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
               <div class="row mt-4">
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-secondary mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Users</h5>
                        <?php
                                 echo '<p class="card-text">Total number of users: ' . $total_users . '</p>';
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-primary mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user"></i> Clients</h5>
                        <?php
                                 echo '<p class="card-text">Total number of Clients: ' . $total_client . '</p>';
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-danger mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-female"></i> Beauticians</h5>
                        <?php
                                 echo '<p class="card-text">Total number of Beauticians: ' . $total_beautician . '</p>';
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-success mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-secret"></i> Admin</h5>
                        <?php
                                        echo '<p class="card-text">Total number of Admin: ' . $total_admin. '</p>';
                              ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="alert alert-danger" role="alert">
                  Verify Beautician Below
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
                      <th data-field="id">ID</th>
                      <th data-field="name">Name</th>
                      <th data-field="email">Email</th>
                      <th data-field="phone">Phone Number</th>
                      <th data-field="address">Address</th>
                      <th data-field="type">Type</th>
                      <th data_field = "salon">Salon_Name</th>
                      <th data-field="view">User Details</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include 'dbcon.php';
                   //SQL query to fetch user data
                      $sql = "SELECT id_beautician, username_beautician, email_beautician, mobile_beautician, address_beautician, type_beautician, salon_name  FROM register_beautician where status_beautician = 'inactive' ";
                      // $query = mysqli_query($con, $sql);
                    
                      $result = $con->query($sql);

          if ($result -> num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["id_beautician"] . "</td>";
                  echo "<td>" . $row["username_beautician"] . "</td>";
                  echo "<td>" . $row["email_beautician"] . "</td>";
                  echo "<td>" . $row["mobile_beautician"] . "</td>";
                  echo "<td>" . $row["address_beautician"] . "</td>";
                  echo "<td>" . $row["type_beautician"] . "</td>";
                  echo "<td>" . $row["salon_name"] . "</td>";
                  echo '<td><a href="userdetails1.php?id_beautician=' . $row['id_beautician'] . '">View Details</a></td>';
                  echo "</tr>";
              }
          } else {
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
