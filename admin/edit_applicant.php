<!DOCTYPE html>
<html lang="en">

<?php
 include_once __DIR__ . '/model/Applicant.php';
 $mApplicant = new Applicant();
 $id = 0;

if(!empty($_GET)){
    $id = htmlentities($_GET['id'], ENT_QUOTES);
}

if (!empty($_POST)) {
	$id = htmlentities($_POST['id'], ENT_QUOTES);

	$applicant_id = htmlentities($_POST['applicant_id'], ENT_QUOTES);
  $password = htmlentities($_POST['password'], ENT_QUOTES);
  $program_tbl_id = htmlentities($_POST['program_tbl_id'], ENT_QUOTES);
  $year = htmlentities($_POST['year'], ENT_QUOTES);
  $semester = htmlentities($_POST['semester'], ENT_QUOTES);
  $payment = htmlentities($_POST['payment'], ENT_QUOTES);
  $is_exam_given = htmlentities($_POST['is_exam_given'], ENT_QUOTES);

	if (!empty($applicant_id) && !empty($password) && !empty($program_tbl_id) && !empty($year) && !empty($semester)) {

    $mApplicant->update_applicant($id, $applicant_id, $password, $program_tbl_id, $year, $semester, $payment, $is_exam_given);
    header("location: applicant.php");
  } else {
    echo '<script language="javascript">';
        echo 'alert("Please insert all data first. ")';
        echo '</script>';
  }
}


?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<title>Online Admission Test - Edit Applicant Info</title>

	<!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
	<nav class="navbar navbar-expand navbar-dark bg-success static-top">
		<a class="navbar-brand mr-1" href="admin_home.php">Online Admission Test</a>
	
		<?php include_once 'common_views/admin_options.php'; ?>
	</nav>

	<div id="wrapper">
		<!-- Sidebar -->
      <?php include_once 'common_views/sidebar_menu.php'; ?>

      <div id="content-wrapper">
      	<div class="container-fluid">

      		<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Applicant info</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
          	<div class="card-header">
          		<i class="fas fa-table"> Edit Applicant Information</i>
          	</div>
          	<div class="card-body">
          		<div class="table-responsive">
          			<h2>Applicant Editing form</h2>
          			<form action="edit_applicant.php" method="post">
          				<?php
          				if (!empty($_GET)) {
          				 	$id = htmlentities($_GET['id'], ENT_QUOTES);
          				 } 
          				 $applicantData = $mApplicant->get_single_applicant($id);
          				 ?>
          				 <div class="form-group" style="display: none">
                              <label for="number">ID:</label>
                              <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" value="<?php echo $applicantData['applicant_tbl_id'] ?>">
                         </div>
          				 <div class="form-group">
          				 	<label for="text">Applicant ID</label>
          				 	<input type="text" class="form-control" id="applicant_id" name="applicant_id" placeholder="Enter applicant ID" value="<?php echo $applicantData['applicant_id'] ?>">
          				 </div>
          				 <div class="form-group">
          				 	<label for="text">Password:</label>
          				 	<input type="text" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php echo $applicantData['password'] ?>">
          				 </div>
          				 <div class="form-group">
                    <label for="text">Program:</label>
                    <input type="text" class="form-control" id="program" name="program" placeholder="Enter program" value="<?php echo $applicantData['program_tbl_id'] ?>">
                   </div>
                   <div class="form-group">
                    <label for="text">Year:</label>
                    <input type="text" class="form-control" id="year" name="year" placeholder="Enter year" value="<?php echo $applicantData['year'] ?>">
                   </div>
                   <div class="form-group">
                    <label for="text">Semester:</label>
                    <input type="text" class="form-control" id="semester" name="semester" placeholder="Enter semester" value="<?php echo $applicantData['semester'] ?>">
                   </div>
                   <div class="form-group">
                    <label for="text">Payment Status:</label>
                    <input type="text" class="form-control" id="payment" name="payment" placeholder="Enter payment Status" value="<?php echo $applicantData['payment'] ?>">
                   </div>
                   <div class="form-group">
                    <label for="text">Is Exam Given:</label>
                    <input type="text" class="form-control" id="is_exam_given" name="is_exam_given" placeholder="Enter Exam Status" value="<?php echo $applicantData['is_exam_given'] ?>">
                   </div>
                   <button type="reset" class="btn btn-danger">Reset</button>
          				 <button type="submit" class="btn btn-primary">Update</button>
          			</form>
          		</div>
          	</div>
          </div>
      		
      	</div>
      </div>
	</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="admin_logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>

</body>
</html>