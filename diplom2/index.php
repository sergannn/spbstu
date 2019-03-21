<html>

<?php include('head.html'); ?>
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="text" placeholder="Full Name" name="fullname" required />
      <input type="text" placeholder="sex" name="sex" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>




    <?php
    require_once "connectDB.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {

        //define other variables with submitted values from $_POST
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);

        //md5 hash password for security
        $password = md5($_POST['password']);

        //path were our avatar image will be stored
        $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);

        //make sure the file type is image
        if (preg_match("!image!",$_FILES['avatar']['type'])) {

            //copy image to images/ folder
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], dirname(__FILE__).'/'.$avatar_path)){

                //set session variables to display on welcome page
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;

                //insert user data into database
                $sql =
                    "INSERT INTO users (username, email, password, avatar) "
                    . "VALUES ('$username', '$email', '$password', '$avatar_path')";

                //check if mysql query is successful
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration successful!"
                        . "Added $username to the database!";
                    //redirect the user to welcome.php
                    include('welcome.php');
           //         header("location: welcome.php");
                }
            }
        }
    }
}