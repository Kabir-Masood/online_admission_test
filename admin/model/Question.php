<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/28/18
 * Time: 12:20 PM
 */

include_once __DIR__ . '/../Database.php';

class Question extends Database
{
    public function save_question($exam_tbl_id, $q_desc, $op1, $op2, $op3, $op4, $correct_ans)
    {
        $queryString = "insert into tbl_question(exam_tbl_id, q_desc, op1, op2, op3, op4, correct_ans) values('$exam_tbl_id', '$q_desc', '$op1', '$op2', '$op3', '$op4', '$correct_ans');";
        $this->query($queryString);
    }

    public function get_all_question()
    {
        $queryString = "select * from tbl_question";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function get_single_question($question_tbl_id)
    {
        $queryString = "select * from tbl_question WHERE question_tbl_id = '$question_tbl_id'";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function getExamIdProgramNameByExamTableId($exam_tbl_id)
    {
        $queryString = "select program.program_name, question.exam_tbl_id from tbl_program_info program JOIN tbl_exam_info exam ON program.program_tbl_id = exam.program_tbl_id JOIN tbl_question question ON exam.exam_tbl_id = question.exam_tbl_id WHERE exam_tbl_id = '$exam_tbl_id'";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

}