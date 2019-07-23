<?php 
	//$program_Id = $_POST["exam_setup_temp"];
	$exam_tbl_id = $_POST["program_tbl_id"];
	 $q_desc = $_POST["q_desc"];
	 $op1 = $_POST["op1"];
	 $op2 = $_POST["op2"];
	 $op3 = $_POST["op3"];
	 $op4 = $_POST["op4"];
	 $correct_ans = $_POST["correct_ans"];

    echo $queryString = "insert into tbl_question(exam_tbl_id, q_desc, op1, op2, op3, op4, correct_ans) values('$exam_tbl_id', '$q_desc', '$op1', '$op2', '$op3', '$op4', '$correct_ans');";
    exit;
	$this->query($queryString);
?>