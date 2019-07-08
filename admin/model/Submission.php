<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/28/18
 * Time: 12:20 PM
 */

include_once __DIR__ . '/../Database.php';

class Submission extends Database
{
    public function save_submission($applicant_tbl_id, $exam_tbl_id, $question_tbl_id, $given_ans)
    {
        $queryString = "insert into tbl_submission(applicant_tbl_id, exam_tbl_id, question_tbl_id, given_ans) values('$applicant_tbl_id', '$exam_tbl_id', '$question_tbl_id', '$given_ans');";
        $this->query($queryString);
    }

    public function get_all_submission()
    {
        $queryString = "select * from tbl_submission";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

}