<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="dashboard" />
        <meta name="author" content="Mustapha Abubakar Lawan" />
        <title>Students Complain</title>
        <link rel="stylesheet" href="\StudentComplainSystem\Css\Dashboardstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <style>
       
       body {
    height: 500px;
}
.table100, .row, .container, .table-responsive, .table-bordered  {
    height: 60%;
}
       </style>
    </head>
    <body>
      <?php   require 'Authentication.php'; 
         require 'Connection.php';
      ?>;
        <div class="row">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class=" col-md-3   col-sm-3 border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Admin Dashboard</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ViewComplains.php">View Complains</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Signup.php">Register a Staff</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Index.php">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Logout.php">Logout</a>
                </div>
            </div>
               
                <!-- Page content-->
                <div class=" col-md-9 col-sm-10  container-fluid">
                    <div class="row"><h1 class="p-3 bg-primary">  WELCOME  <?php echo $_SESSION['Name'];?></h1><div>
                    <div class="row ">
                    <h3 class="mt-4"> View Students Complains</h3>
                    <?php
                    $per_page_record = 5;
                    if(isset($_GET['page'])){
                     $page = $_GET["page"];
                     }
                     else {
                      $page = 1;
                   }
                  $start_from = ($page-1) * $per_page_record;
                  $sql = "SELECT * FROM complains LIMIT $start_from ,$per_page_record";
                  $result = $connection->query($sql);
                 ?>
                <table class="table table-responsive table-bordered">
                  <tr class="mb-3">
                    <th>ID</th>
                    <th>Complain</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Command</th>
                 </tr>
                <?php 
                 if($result->num_rows > 0){ 
                    while($row = $result->fetch_assoc()){
                       ?>
                      <tr><td>
                         <?php echo $row["Id"]; ?>
                             </td><td>
                                <?php echo $row["Complains"]; ?>
                                </td><td class="time">
                                <?php echo $row["Time"]; ?>
                                 </td><td class="date">
                                <?php echo $row["Date"]; ?>
                                 </td><td>
                                 <a href="Delete.php?delcomp=<?php echo $row['Id'];?>"><button class="btn btn-danger mb-2">Delete</button></a>
                                 </td></tr><br>
  
                               <?php 
                                 }
                             }
                                 $sql = "SELECT  COUNT(*) FROM  complains";
                                 $result = $connection->query($sql);
                                 $row = $result->fetch_row();
                                 $total_records = $row[0];?>
                     </table>
                     <p>
                        <?php 
                         $total_pages = ceil($total_records/ $per_page_record); 
                         $pagelink = "";
                         echo "<nav aria-label='Page navigation example'>";
                         echo "<ul class='pagination'>";
                        if($page>=2){
    
                             echo "<li class='page-item'><a class = 'page-link' href='ViewComplains.php?page=".($page-1)."'>Pre </a></li>";
                         }
                      for($i=1;$i<=$total_pages;$i++){
                      if($i==$page){
                          $pagelink .="<li class='page-item'><a class= 'page-link' href='ViewComplains.php?page=".$i."'>".$i."</a></li>";
                        }
                     else{
                      $pagelink .= "<li class='page-item'><a class='page-link' href='ViewComplains.php?page=".$i."'>".$i."</a></li>";
                     }
                   };
                   echo $pagelink;
                 if($page<$total_pages){
                   echo "<li class='page-item'><a class='page-link' href ='ViewComplains.php?page=".($page + 1)."'>Next </a></li>";
                   }
                   echo "</ul>";
                   echo "</nav>";
                   $connection->close();
                 ?>
                </div>
              </div>
            </div>
           <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
