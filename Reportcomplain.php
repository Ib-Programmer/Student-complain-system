<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="dashboard" />
        <meta name="author" content="Mustapha Abubakar Lawan" />
        <title>Report Complain</title>
        <link rel="stylesheet" href="\StudentComplainSystem\Css\Dashboardstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
      <?php require 'Authentication.php';
             require 'Connection.php';
             $success = $error =   " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $complainmsg = $date =  $time = " ";
  $date = date("d/m/Y");
  $time = date("h:i:sa");
  //function to verify input from user 
  function validate_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }
    $complainmsg = validate_input($_POST['messege']);
    $stmt = $connection->prepare("INSERT INTO complains(Complains,Date,Time)
    VALUES (?,?,?)");
    $stmt->bind_param("sss",$complainmsg,$date,$time);
    if($stmt->execute() === TRUE){
      $success = "<div class='alert alert-success mt-5' role='alert'>"."Your complain was succesfully submitted. Our staffs will take action very soon on your complain thank you ."."</div>";    
    }
    else {
      
     $error = "<div class='alert alert-danger' role='alert'>". "We are  sorry your complain is not submitted"."</div>";
      
    }
  }
      ?>
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
                <div class=" col-md-9 col-sm-10  container-fluid">
                    <div class="row"><h1 class="p-3 bg-primary">  WELCOME  <?php echo $_SESSION['Name'];?></h1><div>
                    <div class="row">
                     
<form class="form-signup text-center mt-5" method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
<div class="row">
       <div class="col-md-3 col-lg-3 col-sm-4"></div>
       <div class="col-md-5 col-lg-5 col-sm-5">
       <h1 class="h3  mb-5 font-weight-normal">Report a Complain</h1>
       </div>
       <div class="col-md-4 col-lg-4 col-sm-3"></div>
      </div>
      <div class="row">
       <div class="col-md-3 col-lg-3 col-sm-4"></div>
       <div class="col-md-5 col-lg-5 col-sm-5">
        <?php echo $error;
         echo $success; ?>
       </div>
       <div class="col-md-4 col-lg-4 col-sm-3"></div>
      </div>
      <div class="complainmsg">
      <textarea  name="messege" placeholder="Type your complain  here" class="form-control  mt-3 mb-3" rows="10" cols="30" required></textarea>
    </div>
     <div class="mb-3">
     <button class="btn btn-primary mt-5 w-50"  type="submit" >Submit</button>
     </div>
      
    </form>

                </div>
          </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
