<!DOCTYPE html>
<html lang="en">
<?php
include_once "utils_applicant.php";
include_once __DIR__ . '/model/Question.php';
include_once __DIR__ . '/model/ExamInfo.php';
include_once __DIR__ . '/model/Applicant.php';
include_once __DIR__ . '/model/Result.php';

$mExamInfo = new ExamInfo();
$mApplicant = new Applicant();
$mResult = new Result();
$mQuestion = new Question();

$count = 0;

if (!isLoggedIn()) {
    header("location:applicant_login.php");
} else {
    $id = 0;
    if (!empty($_GET)) {
        $id = htmlentities($_GET['id'], ENT_QUOTES);
    }
}

if (!empty($_POST)) {
    if (isset($_POST['result'])) {
        foreach ($_POST['radioOption'] as $option_num => $option_value) {
            /*echo $option_num." ".$option_value."<br>";*/
            $correct_ans = implode($mQuestion->get_correct_ans_by_q_id($option_num));
            if ($option_value == $correct_ans) {
                $count++;
            }
        }
        /*echo $count;*/
        $applicant_tbl_id = implode($mApplicant->getApplicantTableIdByApplicantId($id));
        $mResult->save_result($applicant_tbl_id, $count);
        $mApplicant->update_applicant_exam_status($id);

        unset($_SESSION['isLogged']);
        unset($_SESSION['login_user']);
        header("location:applicant_login.php");
        session_destroy();
    }
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
        <a class="navbar-brand mr-1" href="">Online Admission Test</a>
    
        <?php include_once 'common_views/applicant_options.php'; ?>
    </nav>

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="" method="post">
                            <table class="table" style="margin-top: 5%;">
                                <tr>
                                    <th>Question No</th>
                                    <th>Question Description</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                </tr>

                                <?php
                                $i = 1;
                                
                                $applicantProgram = implode($mApplicant->getProgram($id));
                                $applicantYear = implode($mApplicant->getYear($id));
                                $applicantSemester = implode($mApplicant->getSemester($id));

                                $examID = implode($mExamInfo->getExamIdByProgramIdYearSemester($applicantProgram,$applicantYear,$applicantSemester));

                                $questions = $mQuestion->getQuestionByExamId($examID);

                                foreach($questions as $row) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i++?> </th>
                                    <td><?=$row['q_desc'] ?></td>
                                    <td>
                                        <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?= $row['op1'] ?>"><?= $row['op1'] ?>
                                    </td>
                                    <td>
                                        <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?= $row['op2'] ?>"><?= $row['op2'] ?>
                                    </td>
                                    <td>
                                        <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?= $row['op3'] ?>"><?= $row['op3'] ?>
                                    </td>
                                    <td>
                                        <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?= $row['op4'] ?>"><?= $row['op4'] ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- <thead>
                                    <tr>
                                        <th>Question No</th>
                                        <th>Question Description</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php

                                    $i = 1;
                                
                                    $mApplicant = new Applicant();
                                    $applicantProgram = implode($mApplicant->getProgram($id));
                                    $applicantYear = implode($mApplicant->getYear($id));
                                    $applicantSemester = implode($mApplicant->getSemester($id));

                                    $mExamInfo = new ExamInfo();
                                    $examID = implode($mExamInfo->getExamIdByProgramIdYearSemester($applicantProgram,$applicantYear,$applicantSemester));

                                    $mQuestion = new Question();
                                    $questions = $mQuestion->getQuestionByExamId($examID);

                                    foreach ($questions as $singleQuestion):
                                        echo "<tr>";
                                            echo "<td>". $i++ . "</td>";
                                            echo "<td>". $singleQuestion['q_desc']. "</td>";

                                            echo "<td>". "<input type='radio' id='is_correct' name='is_correct[]' value='". $singleQuestion['op1'] ."'/>" .$singleQuestion['op1']."</td>";
                                            echo "<td>". "<input type='radio' id='is_correct' name='is_correct[]' value='". $singleQuestion['op2'] ."'/>" .$singleQuestion['op2']."</td>";
                                            echo "<td>". "<input type='radio' id='is_correct' name='is_correct[]' value='". $singleQuestion['op3'] ."'/>" .$singleQuestion['op3']."</td>";
                                            echo "<td>". "<input type='radio' id='is_correct' name='is_correct[]' value='". $singleQuestion['op4'] ."'/>" .$singleQuestion['op4']."</td>";
                                        echo "</tr>";
                                    endforeach;
                                     ?>
                                </tbody> -->
                            </table>
                            <input class="btn btn-primary" name="result" type="submit" value="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Question</h1>
                <form action="" method="post">
                    <table class="table" style="margin-top: 5%;">
                        <tr>
                            <th>Question No</th>
                            <th>Question Description</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                        </tr>

                        <?php
                        $i = 1;

                        $mApplicant = new Applicant();
                        $applicantProgram = implode($mApplicant->getProgram($id));
                        $applicantYear = implode($mApplicant->getYear($id));
                        $applicantSemester = implode($mApplicant->getSemester($id));

                        $mExamInfo = new ExamInfo();
                        $examID = implode($mExamInfo->getExamIdByProgramIdYearSemester($applicantProgram,$applicantYear,$applicantSemester));

                        $mQuestion = new Question();
                        $questions = $mQuestion->getQuestionByExamId($examID);

                        foreach($questions as $row) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++?> </th>
                            <td><?=$row['q_desc'] ?></td>
                            <td>
                                <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?php echo isset($row['correct_ans']) ? '1' : (!empty($somethingelse) ? '0' : ''); ?>"><?= $row['op1'] ?>
                            </td>
                            <td>
                                <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?php echo isset($row['correct_ans']) ? '1' : (!empty($somethingelse) ? '0' : ''); ?>"><?= $row['op2'] ?>
                            </td>
                            <td>
                                <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?php echo isset($row['correct_ans']) ? '1' : (!empty($somethingelse) ? '0' : ''); ?>"><?= $row['op3'] ?>
                            </td>
                            <td>
                                <input type="radio" name="radioOption[<?=$row['question_tbl_id']?>]" value="<?php echo isset($row['correct_ans']) ? '1' : (!empty($somethingelse) ? '0' : ''); ?>"><?= $row['op4'] ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <input id="result" name="result" type="submit" value="submit" />
                </form>
            </div>
        </div>
    </div> -->

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