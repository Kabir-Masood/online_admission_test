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

	<title>Online Admission Test - Exam Information</title>

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
					<a href="exam_info.php">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Exams</li>
			</ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table">Exam Information List</i>
                    <p style="float: right; background-color: red">[N.T]: Exam status (1 = exam has taken and 0 = exam has not taken)</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Program Name</th>
                                    <th>Semester</th>
                                    <th>Exam Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $mExamInfo = new ExamInfo();
                                $examInfo = $mExamInfo->get_all_exam_info();
                                foreach($examInfo as $data):
                                    echo "<tr>";
                                        $mProgram = new Program();
                                        $programRow = $mProgram->get_single_program($data['program_tbl_id']);
                                          if(isset($programRow)){
                                              $programName = $programRow["program_name"];
                                              echo "<td>". $programName ."</td>";
                                          }

                                        echo "<td>". $data['semester']. "-" . $data['year']. "</td>";
                                        echo "<td>". $data['exam_status']. "</td>";

                                    echo "</tr>";
                                endforeach;
                                ?>
                            </tbody>
                        </table>
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