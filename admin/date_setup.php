<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/model/ExamInfo.php';
include_once __DIR__ . '/model/Program.php'
?>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Online Admission Test - Setup Date And Time</title>

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
	
	<?php include_once 'common_views/sidebar_menu.php'; ?>

	<div id="content-wrapper">

		<div class="container-fluid">

			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="date_setup.php">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Date Setup</li>
			</ol>

            <div class="card md-3">
                <div class="card-header">
                    <i class="fas fa-table">Setup Date</i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <h2>Date Setup Form</h2>
                        <!-- <form action="exam_setup.php" method="post">
                            <div class="form-group">
                                <label for="text">Choose Program:</label>
                                <select class="form-group" name="program_tbl_id" id="program_tbl_id" required="required">
                                    <option value="0" disabled selected="selected" style="float: left; background-color: white">Choose Program</option>
                                    
                                    <?php
                                    
                                    $mProgram = new Program();
                                    $programs = $mProgram->get_all_program();
                                        foreach($programs as $singleProgram){
                                            echo '<option value="'.$singleProgram["program_tbl_id"].'" style="background-color: white">'.$singleProgram["program_name"].'</option>';
                                        }
                                    ?>
                                </select>

                                <h2>Upload question from xlsx spreadsheet:</h2>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file"  name="filepath" id="filepath"/></td><td>
                                </form>

                                <br><br>

                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form> -->
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