<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/model/Result.php';
include_once __DIR__ . '/model/Applicant.php';
include_once __DIR__ . '/model/Program.php';

$mResult = new Result();
$mApplicant = new Applicant();
$mProgram = new Program();

if(isset($_POST['SubmitButton'])){
    $id = $_POST['is_passed'];
    foreach ($id as $ID){ 
        /*echo $ID."<br />";*/
        $mResult->update_remarks($ID);
        header("location: result.php");
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Admission Test - Reports</title>

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
                    <a href="view_report.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Reports</li>
            </ol>

            <div class="card md-3">
                <div class="card-header">
                    <i class="fas fa-table">Reports</i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="view_report.php" method="post">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Applicant ID</th>
                                        <th>Program</th>
                                        <th>Semester</th>
                                        <th>Mark</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $resultData = $mResult->get_all_result_by_remarks();
                                    foreach ($resultData as $singleResultData):
                                        echo "<tr>";

                                            $applicantRow = $mApplicant->get_single_applicant($singleResultData['applicant_tbl_id']);
                                              if(isset($applicantRow)){
                                                  $applicantID = $applicantRow["applicant_id"];

                                                  $programRow = $mProgram->get_single_program($applicantRow['program_tbl_id']);
                                                  if (isset($programRow)) {
                                                       $programName = $programRow["program_name"];
                                                  }

                                                  $applicantYear = $applicantRow["year"];
                                                  $applicantSemester = $applicantRow["semester"];

                                                  echo "<td>". $applicantID ."</td>";
                                                  echo "<td>". $programName ."</td>";
                                                  echo "<td>". $applicantSemester. "-". $applicantYear. "</td>";
                                              }
                                              echo "<td>". $singleResultData['marks']. "</td>";
                                              echo "<td>". "Passed". "</td>";
                                        echo "</tr>";
                                    endforeach;
                                     ?>
                                </tbody>
                            </table>
                            <button class="btn btn-success" type="submit" name="SubmitButton" style="display: block; margin: 0 auto">OK</button>
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