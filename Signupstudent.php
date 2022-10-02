<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="student signup" />
        <meta name="author" content="Mustapha Abubakar Lawan" />
        <title>Signup Student</title>
        <link rel="stylesheet" href="\StudentComplainSystem\Css\Dashboardstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
      <?php 
      include 'Header.php';
      require 'Connection.php'; 
      $errormsg = $success =   " ";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $regno = $email = $phonenumber = $password = "";
          function validate_input($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              $data = filter_var($data,FILTER_SANITIZE_STRING);
              return $data;
            }
            $name = validate_input($_POST["name"]);
            $regno = validate_input($_POST["regno"]);
            $email = validate_input($_POST["email"]);
            $phonenumber   = validate_input($_POST["phonenumber"]);
            $password = validate_input($_POST["password"]);
            $privilege = "Student";

            $stmt = $connection->prepare("INSERT INTO users(Name,Regnum,
            Email, Phonenumber, Password,Privelige)
            VALUES (?,?,?,?,?,?)");
             $hash = password_hash($password,PASSWORD_DEFAULT);
             $stmt->bind_param("ssssss",$name,$regno, $email, $phonenumber,$hash,$privilege);
             if( $stmt->execute() === TRUE){
              $success = "<div class='alert alert-success' role='alert'>"." You are succcessfully Signup"."</div>";
             }
             else{
              $errormsg = "<div class='alert alert-danger' role='alert'>"."We are sorry something was went wronged you are not registered"."</div>"; 
             }
          }
      ?>
<form class="form-signup text-center mt-5" method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <div class="row">
             <div class="col-md-3 col-lg-3 col-sm-4"></div>
             <div class="col-md-5 col-lg-5 col-sm-5">
             <h1 class="h3  mb-5 font-weight-normal">Sign up</h1>
             </div>
             <div class="col-md-4 col-lg-4 col-sm-3"></div>
            </div>
            <div class="row">
             <div class="col-md-3 col-lg-3 col-sm-4"></div>
             <div class="col-md-5 col-lg-5 col-sm-5">
              <?php echo $errormsg;
               echo $success; ?>
             </div>
             <div class="col-md-4 col-lg-4 col-sm-3"></div>
            </div>
            
            <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputname" class="mb-3">Name</label>
                <input type="text" name="name" id="inputname" class="form-control  mb-5" placeholder="name" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
              <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputname" class="mb-3">Registration Number</label>
                <input type="text" name="regno" id="inputname" class="form-control  mb-5" placeholder="registration number" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
           
            
            <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputEmail" class="mb-3" >Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control  mb-5" placeholder="Email address" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
      
              
            <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputphonenumber"  class="mb-3" >Phonenumber</label>
                <input type="text" name="phonenumber" id="inputEmail" class="form-control  mb-5" placeholder="Phonenumber" required autofocus>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
      
            <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <label for="inputPassword" class="mb-3">Password</label>
            <input type="password" name = "password" id="inputPassword" class="form-control mb-5" placeholder="Password" required>
            </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
              <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-4"></div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                <button class="btn btn-lg btn-primary btn-block mb-5" type="submit">Sign up</button>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-3"></div>
              </div>
            
          </form>
      
                      </div>
                </div>
              </div>
              <!-- Bootstrap core JS-->
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
              <script src="js/scripts.js"></script>
              <?php include 'Footer.php'; ?>          
              </body>
      </html>