<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

  <?php include_once __DIR__ . '/model/Admin.php' ?>

    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    include_once 'utils_admin.php';
    if (isLoggedIn()) {
        header("location:admin_home.php");
    }
    ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/admin_login.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Online Admission Test - Admin Login</title>

</head>
<body>

<!------ Include the above in your HEAD tag ---------->
<div class="bg-image"></div>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="Images/logo.png" id="icon" alt="User Icon" />
      <h1>ADMIN</h1>
    </div>

    <!-- Login Form -->
    <form method="post" name="admin_login">
      <input type="text" id="user_id" class="fadeIn second" name="user_id" placeholder="User_ID" required="required">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required="required">
      <input type="submit" class="fadeIn fourth" name="admin_login" value="Log In">
    </form>
    <?php 
      $mAdmin = new Admin();
      if (isset($_POST['admin_login'])) {
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];

        if (isset($user_id) && isset($password)) {
          $adminData = $mAdmin->adminLogin($user_id, $password);

          if (isset($adminData) && count($adminData) > 0) {
            $_SESSION['isLogged'] = true;
            $_SESSION['login_user_id'] = $adminData['id'];
            header("location:admin_home.php");
          } else {
              echo "User not found!";
          }
        } else {
            echo "User id and password must be provided!";
        }
      }
     ?>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

</body>
</html>