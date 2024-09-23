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
    <title>Admin</title>
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
        .photo{
            margin-right : 20px;
        }
        .accept{
            text-decoration : none;
            color : white;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
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

        <!-- Page Content -->
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
                    <h2>User Details</h2>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> Check Out Beautician Details Below
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row" style="height: 70vh; overflow: auto;">
                        <table class="table table-bordered table-striped" >
                            <tbody>
                                <?php
                                // Get the user ID from the URL
                                $id = intval($_GET['id_beautician']);

                                // SQL query to fetch the user details
                                $sql = "SELECT id_beautician, username_beautician, email_beautician, mobile_beautician, address_beautician, photo_beautician, cv_beautician, type_beautician FROM register_beautician WHERE id_beautician = $id";
                                $result = $con->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $photo = $row['photo_beautician'];
                                    $cv = $row['cv_beautician'];

                                    echo '<tr><th>ID</th><td>' . $row['id_beautician'] . '</td></tr>';
                                    echo '<tr><th>Username</th><td>' . $row['username_beautician'] . '</td></tr>';
                                    echo '<tr><th>Email</th><td>' . $row['email_beautician'] . '</td></tr>';
                                    echo '<tr><th>Mobile Number</th><td>' . $row['mobile_beautician'] . '</td></tr>';
                                    echo '<tr><th>Address</th><td>' . $row['address_beautician'] . '</td></tr>';
                                    echo '<tr><th>Type</th><td>' . $row['type_beautician'] . '</td></tr>';
                                    echo '<tr><th>Photo</th><td><img src="../beautician/uploads/' . htmlspecialchars($photo) . '" alt="User Photo" class="photo" style="width: 50px; height: 65px;"><a href="../beautician/uploads/' . htmlspecialchars($photo) . '" target="_blank" class="photo">View Full Image</a></td></tr>';
                                    echo '<tr><th>CV</th><td><a href="../beautician/cv_uploads/' . htmlspecialchars($cv) . '" target="_blank">View CV (PDF)</a></td></tr>';
                                } else {
                                    echo '<tr><td colspan="2">No details found for this user.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="alert alert-primary" role="alert">
                                Verify the Beautician
        </div>
        <!-- <a href="userdetails1.php?id_beautician=' . $row['id_beautician'] . '"> -->
                <button type="button"  name="submit" class="btn btn-primary" ><a href="accept.php?id_beautician=<?php echo $row['id_beautician'];?>" class="accept">Accept Request</a></button>
                <button type="button" class="btn btn-danger">Cancel Request</button>
            </div>
            <br>
            <br>
            </div>
        </div>
</body>
</html>

<?php
$con->close();
?>
