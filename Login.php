<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" href="\StudentComplainSystem\Css\Indexstyle.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Login</title>
<style>
.form-control{
    width:30%;
}
.imglogin{
    border-radius:50%;
    opacity: 200px;
    box-shadow: 5px 5px 5px 5px grey;
}
</style>
</head>
<body>
<?php include 'Header.php';
    require 'Connection.php'; 
 $errormsg =   " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password =  $username = "";
    function validate_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = filter_var($data,FILTER_SANITIZE_STRING);
        return $data;
      }
      $username = validate_input($_POST["username"]);
      $password = validate_input($_POST["password"]);
      $sql = "SELECT Name,Email,Phonenumber,Password,Privelige FROM users WHERE  Email =  '$username' ";
        $result = $connection->query($sql);
        $user = $result->fetch_assoc();
        if($result->num_rows > 0){
          if(password_verify($password, $user['Password'])){
            session_start();
            $_SESSION["Name"] = $user['Name'];
             if($user['Privelige'] === "Admin"){
              header("Location: Dashboard.php");
              }
             else if ($user['Privelige'] === "Student"){
               header("Location: Studentdashboard.php");
             }
            else{
              header("Location :Login.php");
            }   

            }
            else{
              $errormsg = "<div class='alert alert-danger' role='alert'>"."Wronged Password or username"."</div>";
            }
          }
          else {
            $errormsg = "<div class='alert alert-danger' role='alert'>"."Wronged Password or username"."</div>";
          }
          $connection->close(); 
        }
          
  
?>
    <form class="form-signin text-center" method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <img class="imglogin mb-4 mt-5" src="Assets\Login.jpg" alt="" width="120" height="120">
      <h1 class="h3 mb-5 font-weight-normal">Please sign in</h1>
      <div class="row">
       <div class="col-md-4 col-lg-4 col-sm-3"></div>
       <div class="col-md-4 col-lg-4 col-sm-5">
              <p><?php echo $errormsg; ?></p>
       </div>
       <div class="col-md-4 col-lg-4 col-sm-3"></div>
      </div>
      <label for="inputEmail" class="sr-only">Username</label>
      <div class="row ">
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
          <div class="col-md-4 col-lg-4 col-sm-5">
          <input type="email" name = "username" id="inputEmail" class="form-control  mb-5" placeholder="username" required autofocus>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>
      <label for="inputPassword" class="sr-only">Password</label>
      <div class="row ">
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
          <div class="col-md-4 col-lg-4 col-sm-5">
      <input type="password" name = "password" id="inputPassword" class="form-control  mb-5" placeholder="Password" required>
      </div>
          <div class="col-md-4 col-lg-4 col-sm-3"></div>
        </div>
      <button class="btn btn-lg btn-primary btn-block mb-5" type="submit">Sign in</button><br>
     
      
    </form>
<section class="footer">
<?php  include 'Footer.php';?>
</section>
   
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


</body>
</html>
