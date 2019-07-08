<!DOCTYPE html>
<html lang="en">

<?php 
include_once __DIR__ . '/model/Program.php';

$mProgram = new Program();

if (!empty($_POST)) {
	$program_name = htmlentities($_POST['program_name'], ENT_QUOTES);
	$dept_code = htmlentities($_POST['dept_code'], ENT_QUOTES);

	if (!empty($program_name) && !empty($dept_code)) {

		$mProgram->save_program($program_name, $dept_code);
		header("location: program.php");
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

	<title>Online Admission Test - Add Program</title>

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
	    		<ol class="breadcrumb">
	    			<li class="breadcrumb-item">
	    				<a href="add_program.php">Dashboard</a>
	    			</li>
	    			<li class="breadcrumb-item active">Add New Program
	    			</li>
	    		</ol>

	    		<div class="card mb-3">
	    			<div class="card-header">
	    				<i class="fas fa-table"></i>
	    				Add New Program
	    			</div>
	    			<div class="card-body">
	    				<div class="table-responsive">
	    					<h2>Program Creation Form</h2>
	    					<form action="add_program.php" method="post">
	    						<div class="form-group">
	    							<label for="text">Program Name:</label>
	    							<input type="text" class="form-control" id="program_name" name="program_name" placeholder="Enter program name" required="required">
	    						</div>
	    						<div class="form-group">
	    							<label for="text">Department Code:</label>
	    							<input type="text" class="form-control" id="dept_code" name="dept_code" placeholder="Enter department code" required="required">
	    						</div>
	    						<button type="reset" class="btn btn-danger">Reset</button>
	    						<button type="submit" class="btn btn-primary">Submit</button>
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