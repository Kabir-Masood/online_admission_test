<!DOCTYPE html>
<html lang="en">

<?php 
include_once __DIR__ . '/model/Question.php';
include_once __DIR__ . '/model/ExamInfo.php';
include_once __DIR__ . '/Classes/PHPExcel.php';
include_once __DIR__ . '/Classes/PHPExcel/IOFactory.php';

$mQuestion = new Question();
$mExamInfo = new ExamInfo();

if (!empty($_POST)) {
	$exam_tbl_id = htmlentities($_POST['exam_tbl_id'], ENT_QUOTES);
	$q_desc = htmlentities($_POST['q_desc'], ENT_QUOTES);
	$op1 = htmlentities($_POST['op1'], ENT_QUOTES);
	$op2 = htmlentities($_POST['op2'], ENT_QUOTES);
	$op3 = htmlentities($_POST['op3'], ENT_QUOTES);
	$op4 = htmlentities($_POST['op4'], ENT_QUOTES);
	$correct_ans = htmlentities($_POST['correct_ans'], ENT_QUOTES);

	if (!empty($exam_tbl_id) && !empty($q_desc) && !empty($op1) && !empty($op2) && !empty($op3) && !empty($op4) && !empty($correct_ans)) {

		$mQuestion->save_question($exam_tbl_id, $q_desc, $op1, $op2, $op3, $op4, $correct_ans);
		header("location: question.php");
	} else {
		echo '<script language="javascript">';
        echo 'alert("Please insert all data first. ")';
        echo '</script>';
	}
}

if(isset($_POST['SubmitButton'])){
    try {       //attached file formate

        $new_id = 1;
        $up_filename=$_FILES["filepath"]["name"];
        $file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
        $file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
        $f2 = $file_basename . $file_ext;

        $needle = "xlsx";
        if( strpos( $f2, $needle ) !== false) {
            move_uploaded_file($_FILES["filepath"]["tmp_name"], $f2);

            $inputFileName = $f2;

            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file"' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
//  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $rowData = array();
            for ($row = 2; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE);
            }

//print_r($rowData);
//echo $rowData[0][0][1];

            foreach ($rowData as $datum) {
                foreach ($datum as $item) {

                    $exam_tbl_id = $item[0];
                    $q_desc = $item[1];
                    $op1 = $item[2];
                    $op2 = $item[3];
                    $op3 = $item[4];
                    $op4 = $item[5];
                    $correct_ans = $item[6];
                    
                    $mQuestion->save_question($exam_tbl_id, $q_desc, $op1, $op2, $op3, $op4, $correct_ans);

                }
            }

            echo '<script language="javascript">';
            echo 'alert("Successfully saved!")';
            echo '</script>';
            header("location:question.php");
        }else{
            echo '<script language="javascript">';
            echo 'alert("Please select a valid xlsx file then try again. ")';
            echo '</script>';
        }
    }
    catch(Exception $e) {
        $error_message = $e->getMessage();
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

	<title>Online Admission Test - Add Question</title>

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
	    				<a href="add_question.php">Dashboard</a>
	    			</li>
	    			<li class="breadcrumb-item active">Add New Question
	    			</li>
	    		</ol>

	    		<div class="card mb-3">
	    			<div class="card-header">
	    				<i class="fas fa-table"></i>
	    				Add New Question
	    			</div>
	    			<div class="card-body">
	    				<div class="table-responsive">
	    					<h2>Question insertion form</h2>
	    					<form action="add_question.php" method="post">
	    						<div class="form-group">
	    							<label for="text">Exam ID:</label>
	                                <select class="form-group" name="exam_tbl_id" id="exam_tbl_id" required="required">
	                                    <option value="0" disabled selected="selected"
	                                            style="float: left; background-color: white">Select Exam ID
	                                    </option>
	                                    <?php
	                                    $examData = $mExamInfo->get_all_exam_info();
	                                    foreach($examData as $singleExamData){
	                                        echo '<option value="'.$singleExamData["exam_tbl_id"].'" style="background-color: white">'.$singleExamData["exam_tbl_id"].'</option>';
	                                    }
	                                    ?>
	                                </select>
	    						</div>
	    						<div class="form-group">
	    							<label for="text">Question Description:</label>
	    							<input type="text" class="form-control" id="q_desc" name="q_desc" placeholder="Enter question description" required="required">
	    						</div>
	    						<div>
	    							<label for="text">First option:</label>
	    							<input type="text" class="form-control" id="op1" name="op1" placeholder="Enter first option" required="required" style="width: 400px">
	    						</div>
	    						<div>
	    							<label for="text">Second option:</label>
	    							<input type="text" class="form-control" id="op2" name="op2" placeholder="Enter second option" required="required" style="width: 400px">
	    						</div>
	    						<div>
	    							<label for="text">Third option:</label>
	    							<input type="text" class="form-control" id="op3" name="op3" placeholder="Enter third option" required="required" style="width: 400px">
	    						</div>
	    						<div>	
	    							<label for="text">Fourth option:</label>
	    							<input type="text" class="form-control" id="op4" name="op4" placeholder="Enter fourth option" required="required" style="width: 400px">
	    						</div>
	    						<div>	
	    							<label for="text">Correct Answer:</label>
	    							<input type="text" class="form-control" id="correct_ans" name="correct_ans" placeholder="Enter correct answer" required="required" style="width: 400px">
                            	</div>

	    						<button type="reset" class="btn btn-danger" style="margin-top: 15px">Reset</button>
	    						<button type="submit" class="btn btn-primary" style="margin-top: 15px">Submit</button>
	    					</form>

	    					<br><br>
	                        <h2>Upload question list from xlsx spreadsheet:</h2>
	                        <form action="" method="post" enctype="multipart/form-data">
	                            <input type="file"  name="filepath" id="filepath"/></td><td>
	                                <input type="submit" name="SubmitButton" class="btn btn-primary" value="submit"/>
	                        </form>

	                        <div style="margin-top: 10px; color: green">
                                <p>Download sample file: <a href="download.php?file=question_list.xlsx">Click here</a></p>
                            </div>
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