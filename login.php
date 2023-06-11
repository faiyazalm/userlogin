<?php
    $login=false;
     $error=false;
    include '_dbconnect.php' ;
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['username'];
      $password = $_POST['password'];
      
      // $sql="SELECT * FROM `user` WHERE `fname`='$fname' and`lname`='$lname'and`password`='$password'and`email`='$email'";
      $sql="SELECT * FROM `user` WHERE `fname`='$fname' and`lname`='$lname 'and`email`='$email'";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);
      if($num==1){
        $row=mysqli_fetch_assoc($result);
        //while($row=mysqli_fetch_assoc($result)){
               if(password_verify($password,$row['password'])){
                 $login=true;
                 session_start();
                 $_SESSION['username']=$email;
                 $_SESSION['loggedin']=true;
                 header("location: welcome.php");
               }
               else{  
                $error=true;
            }
         // }
      }
      
      else{  
          $error=true;
      }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <title>Login!</title>
  </head>
  <body>
    <?php require '_nav.php';
      if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Please enter your details correctly.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    ?>
    
    <div class="container">
      <h1 class="text-center">Login to our website</h1>
      <form action="/loginsystem/login.php" method="post" class="d-flex align-items-center flex-column">
          <div class="form-group col-6">
            <label for="fname" class="d-block text-center">First Name</label>
            <input
              type="text"
              class="form-control"
              id="fname"
              name="fname"
              aria-describedby="emailHelp"
              require
            />
          </div>
          <div class="form-group col-6">
            <label for="fname" class="d-block text-center">Last Name</label>
            <input
              type="text"
              class="form-control"
              id="lname"
              name="lname"
              aria-describedby="emailHelp"
              require
            />
          </div>
          <div class="form-group col-6">
            <label for="username" class="d-block text-center">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span
                  class="input-group-text"
                  id="validationTooltipUsernamePrepend"
                  >@</span
                >
              </div>
              <input
                type="email"
                class="form-control rounded-right"
                id="username"
                name="username"
                aria-describedby="emailHelp"
                require
              />
            </div>
          </div>
         <div class="form-group col-6">
            <label for="password" class="d-block text-center">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              require
            />
          </div>
          
          <button type="submit" class="btn btn-primary col-6">Login</button>
          
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
