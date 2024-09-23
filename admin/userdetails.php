<?php
session_start();
include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin </title>
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
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
           <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading bg-dark text-white">Admin Panel</div>
     

        <div class="list-group list-group-flush pt-2 ps-1">
       
           <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                <i class="fas fa-home" style="font-size:14px;"></i>
                <span data-feather="home ml-2"></span>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-user" style="font-size:14px;"></i>
                User Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-bell" style="font-size:14px;"></i>
                Notification
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="client.html">
            <i class="fas fa-users" style="font-size:14px;"></i>
            Clients
        </a>
    </li>
    <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="fas fa-female" style="font-size:14px;"></i>
                    Beautician
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.html">
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
                                <a class="nav-link px-3" href="#">Sign out</a>
                            </li>
                        </ul>
                    </div>
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
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hey !</strong> Check Out Your Profile Below
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <div class="row" style="height: 70vh; overflow: auto;">
                  <table
                  id="table"
                  data-toggle="table"
                  data-pagination="true"
                  data-page-list="[5, 10, 20, 50]"
                  data-escape-title="Your Escape Title"
                  data-search="true"  class="table-striped">
                    
<?php
// Get the user ID from the URL
$id = intval($_GET['id_beautician']);

// SQL query to fetch the user details
$sql = "SELECT id_beautician, username_beautician, email_beautician, mobile_beautician, address_beautician, photo_beautician, cv_beautician  FROM register_beautician WHERE id_beautician = $id";
$result = $con->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $photo = $row['photo_beautician'];
        $cv = $row['cv_beautician'];
        echo '<h2>User Details</h2>';
        echo '<tr>';
        echo '<th data-field = "id"> ID </th>';
        echo '<td>' . $row['id_beautician'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th data-field = "name"> Username </th>';
        echo '<td>' . $row['username_beautician'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th data-field = "email"> Email</th>';
        echo '<td>' . $row['email_beautician'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th data-field = "phone"> Mobile Number</th>';
        echo '<td>' . $row['mobile_beautician'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th data-field = "address"> Address</th>';
        echo '<td>' . $row['address_beautician'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th data-field = "photo"> Photo</th>';
        echo '<td> <img src="../beautician/uploads/' . htmlspecialchars($photo) . '" alt="User Photo" style="width: 75px; height: 75px;"><a href="../beautician/uploads/' . htmlspecialchars($photo) . '" target="_blank"><button>View Full Image</button></a></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th data-field = "cv"> CV</th>';
        echo '<td> <a href="../beautician/cv_uploads/' . htmlspecialchars($cv) . '" target="_blank">View CV (PDF)</a> </td>';
        echo '</tr>';
        //echo '<p><strong>Photo:</strong> <img src="../beautician/uploads/' . $photo . '" alt="User Photo" style="width: 75px; height: 75px;"></p>';
        // echo '<p><strong>Photo:</strong> <img src="../beautician/uploads/' . htmlspecialchars($photo) . '" alt="User Photo" style="width: 75px; height: 75px;"></p>';
        // echo '<p><a href="../beautician/uploads/' . htmlspecialchars($photo) . '" target="_blank"><button>View Full Image</button></a></p>';
        //  echo '<p><strong>CV:</strong> <a href="../beautician/cv_uploads/' . htmlspecialchars($cv) . '" target="_blank">View CV (PDF)</a></p>';
        // Add other fields as needed
    } else {
        echo "No details found for this user.";
    }
} else {
    echo "Error executing query: " . $con->error;
}
$con->close();
?>
</div>
</table>
</body>
</html>