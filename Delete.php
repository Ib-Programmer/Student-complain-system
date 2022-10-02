<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="dashboard" />
        <meta name="author" content="Mustapha Abubakar Lawan" />
        <title></title>
    </head>
    <body>
    <?php  // require 'Authentication.php';
               require 'Connection.php';
          if(isset($_GET['delcomp'])){
               $id = $_GET['delcomp'];
               $sql = $connection->prepare("DELETE FROM complains  WHERE Id= ?"); 
               $sql->bind_param('s',$id); 
               $sql->execute();
             if($sql->execute() === TRUE){
               header("Location: ViewComplains.php");
            }
          else {
          ?>

        <script>alert("Something went wrong cannot delete complain.");</script>
       <?php 
      }
   }
  ?>
</body>
</html>