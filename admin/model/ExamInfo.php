<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/28/18
 * Time: 12:20 PM
 */

include_once __DIR__ . '/../Database.php';

class ExamInfo extends Database
{
    public function save_exam_info($program_tbl_id, $year, $semester, $exam_status)
    {
        $queryString = "insert into tbl_exam_info(program_tbl_id, year, semester, exam_status) values('$program_tbl_id', '$year', '$semester', '$exam_status');";
        $this->query($queryString);
    }

    public function getExamIdByProgramIdYearSemester($program_tbl_id, $year, $semester)
    {
        $queryString = "select exam_tbl_id from tbl_exam_info WHERE program_tbl_id = '$program_tbl_id' AND year = '$year' AND semester = '$semester'";
        $q = $this->query($queryString);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function get_all_exam_info()
    {
        $queryString = "select * from tbl_exam_info";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

}