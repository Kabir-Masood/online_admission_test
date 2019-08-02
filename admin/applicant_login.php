<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

<?php include_once __DIR__ . '/model/Applicant.php' ?>

    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    include_once 'utils_applicant.php';
    if (isLoggedIn()) {
        header("location:applicant_home.php");
    }
    ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/applicant_login.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Online Admission Test - Student Login</title>

</head>
<body>

  <div class="form-area">
    <div class="img-area">
      <img src="Images/student_avatar.png" alt="">
    </div>
    <h2>APPLICANT</h2>
    
    <form action="applicant_login.php" method="post">
      <p>Your ID: </p>
      <input type="text" name="user_id" class="input-area" placeholder="Enter your user ID" required="required">
      <p>Your Password: </p>
      <input type="password" name="password" class="input-area" placeholder="Enter your password" required="required">
      <input type="submit" class="btn-login" name="applicant_login" value="Log In">
    </form>

  </div>

<?php 
  $mApplicant = new Applicant();

  if (isset($_POST['applicant_login'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    if (isset($user_id) && isset($password)) {
      $applicantData = $mApplicant->applicantLogin($user_id, $password);

      if (isset($applicantData) && count($applicantData) > 0) {
        $_SESSION['isLogged'] = true;
        $_SESSION['login_user_id'] = $applicantData['id'];
        header("location:applicant_home.php?id=$user_id");
      } else {
          echo "User not found!";
      }
    } else {
        echo "User id and password must be provided!";
    }
  }
?>

</body>
</html>