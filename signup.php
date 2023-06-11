<?php
    $insert=false;
    $passerror=false;
    $emaill=false;
    include '_dbconnect.php' ;
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $city=$_POST['city'];
      $Gender=$_POST['gender'];
      $address=$_POST['address'];

        $sql="SELECT * FROM `user` WHERE`email`='$email'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==0){
          if($password==$cpassword){
            $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` (`fname`, `lname`, `gender`, `address`, `password`, `city`, `email`) VALUES ('$fname', '$lname', '$Gender', '$address', '$hash', '$city', '$email')";
            $result=mysqli_query($conn,$sql);
            if($result){
              $insert=true;
            }
          }
          else{
            $passerror=true;
          }
        }
        else{
          $emaill=true;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
     <style>
      label{
        display: block;
        text-align: center;
        font-weight: bolder;
      }
     </style>
    <title>Sign Up!</title>
  </head>
  <body>
    <?php require '_nav.php';
      if($insert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      if($passerror){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Password do not match!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      if($emaill){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Your Email id is incorrect.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
    ?>
    
    <div class="container mt-5 mb-5">
      <h1 class="text-center mb-3">Signup to our website</h1>
      <form action="signup.php" method="post" class="d-flex align-items-center flex-column">
      
          <div class="form-group col-6">
            <label for="fname">First Name</label>
            <input
              type="text"
              class="form-control"
              id="fname"
              name="fname"
              placeholder="First name"
              maxlength="15"
              aria-describedby="emailHelp"
              required
            />
          </div>
          <div class="form-group col-6">
            <label for="fname">Last Name</label>
            <input
              type="text"
              class="form-control"
              id="lname"
              name="lname"
              placeholder="Last name"
              maxlength="10"
              aria-describedby="emailHelp"
              required
            />
          </div>
          <div class="form-group col-6">
            <label for="username">Username</label>
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
                placeholder="Email id"
                aria-describedby="emailHelp"
                maxlength="25"
                required
              />
              <div class="invalid-tooltip">
                Please choose a unique and valid username.
              </div>
            </div>
          </div>
          <div class="form-group col-6">
            <label for="city">Your city</label>
            <select class="form-control custom-select" id="city" name="city" required>
              <option value="#">--- select city ---</option>
              <option value="ara">Ara</option>
              <option value="patna">Patna</option>
              <option value="sasaram">Sasaram</option>
              <option value="dehri on sone">Dehri on son</option>
              <option value="dehli">Dehli</option>
            </select>
          </div>
          <fieldset class="form-group col-6 border border-secondary">
            <legend >Gender</legend>
            <div
              class="form-group col-md-2 custom-control custom-radio custom-control-inline"
            >
              <input
                type="radio"
                id="male"
                value="male"
                name="gender"
                class="custom-control-input"
                required
              />
              <label class="custom-control-label" for="male">Male</label>
            </div>
            <div
              class="form-group col-md-2 custom-control custom-radio custom-control-inline"
            >
              <input
                type="radio"
                id="female"
                value="female"
                name="gender"
                class="custom-control-input"
                required
              />
              <label class="custom-control-label" for="female">Female</label>
            </div>
          </fieldset>
          <div class="form-group col-6">
            <label for="address">Address</label>
            <textarea
              class="form-control"
              id="address"
              name="address"
              rows="1"
              placeholder="Enter your Address"
              required
            ></textarea>
          </div>
          <div class="form-group col-6">
          <label for="password">Password</label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
            <input
              type="password"
              class="form-control input form-control"
              placeholder="password"
              id="password"
              name="password"
              maxlength="20"
              required
            />
            <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
          </div>
          </div>
          <div class="form-group col-6">
            <label for="cpassword">Confirm Password</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
              </div>
            <input
              type="password"
              class="form-control input form-control"
              placeholder="Confirm password"
              id="cpassword"
              name="cpassword"
              maxlength="20"
              required
            />
          </div>
            <small id="emailHelp" class="form-text text-muted col-6"
              >We'll never share your email with anyone else.</small
            >
          </div>
        
        
          <button type="submit" class="btn btn-primary col-6">SignUp</button>
        
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
    <script>
      function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
   }
    </script>
  </body>
</html>
