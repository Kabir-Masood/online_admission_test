<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/model/ExamInfo.php';
include_once __DIR__ . '/model/Program.php';
include_once __DIR__ . '/model/Question.php';
include_once __DIR__ . '/Classes/PHPExcel.php';
include_once __DIR__ . '/Classes/PHPExcel/IOFactory.php'
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
					<a href="exam_setup.php">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Exam Setup</li>
			</ol>

            <div class="card md-3">
                <div class="card-header">
                    <i class="fas fa-table">Exam Setup form</i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <h2>Exam Setup Form</h2>
                        <form action="exam_setup.php" method="post"  enctype="multipart/form-data">
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
                            </div>
                            <div class="form-group">
                                <label for="text">Semester:</label>
                                <select class="form-group" name="semester" id="semester" required="required">
                                    <option value="0" disabled selected="selected"
                                            style="float: left; background-color: white">Select Semester
                                    </option>
                                    <option value="Spring">Spring</option>
                                    <option value="Summer">Summer</option>
                                    <option value="Fall">Fall</option>
                                </select>

                                <label for="text">Year:</label>
                                <select class="form-group" name="year" id="year" required="required">
                                    <option value="0" disabled selected="selected"
                                            style="float: left; background-color: white">Select Year
                                    </option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>        
                            </div>
                            <div>
                                <h4>Upload question from xlsx spreadsheet:</h4>
                                    <input type="file"  name="filepath" id="filepath"/></td><td>
                                <br><br>
                            </div>

                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="SubmitButton" class="btn btn-primary">Submit</button>

                            <div style="margin-top: 10px; color: green">
                                <p>Download sample file: <a href="download.php?file=exam_setup.xlsx">Click here</a></p>
                            </div>
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

<?php

if(isset($_POST['SubmitButton'])){
    try {       //attached file formate 

        $mExamInfo = new ExamInfo();
        $mQuestion = new Question();


        $program_tbl_id = $_POST['program_tbl_id'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];

        $mExamInfo->save_exam_info($program_tbl_id, $year, $semester, 0);
        
        $examTableId = implode($mExamInfo->getExamIdByProgramIdYearSemester($program_tbl_id, $year, $semester));

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

                    $q_desc = $item[0];
                    $op1 = $item[1];
                    $op2 = $item[2];
                    $op3 = $item[3];
                    $op4 = $item[4];
                    $correct_ans = $item[5];
                    
                    $mQuestion->save_question($examTableId, $q_desc, $op1, $op2, $op3, $op4, $correct_ans);
                }
            }
            echo '<script language="javascript">';
            echo 'alert("Successfully saved!")';
            echo '</script>';
            //header("location:question.php");
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