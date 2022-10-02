<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="dashboard" />
        <meta name="author" content="Mustapha Abubakar Lawan" />
        <title> Student Dashboard</title>
        <link rel="stylesheet" href="\StudentComplainSystem\Css\Dashboardstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
      <?php require 'Authentication.php';
             require 'Connection.php';
      ?>;
        <div class="row">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class=" col-md-3   col-sm-3 border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Student Dashboard</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Studentdashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="StudentProfile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Reportcomplain.php">Report Complain</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Index.php">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Logout.php">Logout</a>
                </div>
            </div>
               
                <!-- Page content-->
                <div class=" col-md-10 col-sm-10  container-fluid">
                    <div class="row"><h1 class="p-3 bg-primary">  WELCOME  <?php echo $_SESSION["Name"];?></h1><div>
                    <div class="row">
                    <h1 class="mt-4">Dashboard</h1>
                    <p> Welcome to your dashboard you can perform any action by clicking the sidebar.  
                    </p>
                </div>
          </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
