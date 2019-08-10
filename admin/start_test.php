<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/model/Question.php';

$mQuestion = new Question();
$id = 0;
if (!empty($_GET)) {
    $id = htmlentities($_GET['id'], ENT_QUOTES);
}
?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Online Admission Test - Applicant Dashboard</title>

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/applicant.css" rel="stylesheet" type="text/css">

</head>

<body style="background-image: url(Images/background.jpg);">
    <nav class="navbar navbar-expand navbar-dark bg-success static-top">
        <a class="navbar-brand mr-1" href="applicant_home.php">Online Admission Test</a>
    
        <?php include_once 'common_views/applicant_options.php'; ?>
    </nav>

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="start_test.php">Student Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Online Admission Test
                    </li>
                </ol>

                <div class="main">
                    <h3>Welcome to Online Exam - Start Now</h3>
    
                    <div class="starttest">
                        <h4>Test your knowledge</h4>
                        <p>This is multiple system choice quize to test your knowledge</p>
                        <ul>
                            <li><strong>Number of Questions : </strong> <?php echo count($mQuestion->get_all_question()) . " " ?></li>
                            <li><strong>Question Type : </strong> Multiple Choice</li>
                        </ul>
                        <h4>You will get only 1 hour for answering all questions.</h4>
                        <a href="<?php echo "question_paper.php?id=$id"?>">Start Test</a>  
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
                    <a class="btn btn-primary" href="applicant_logout.php">Logout</a>
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