<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/28/18
 * Time: 12:20 PM
 */

include_once __DIR__ . '/../Database.php';

class Result extends Database
{
    public function save_result($applicant_tbl_id, $marks)
    {
        $queryString = "insert into tbl_result(applicant_tbl_id, marks) values('$applicant_tbl_id', '$marks');";
        $this->query($queryString);
    }

    public function get_all_result()
    {
    	$queryString = "select * from tbl_result";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function get_all_result_by_remarks()
    {
        $queryString = "select * from tbl_result WHERE remarks = '1'";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function update_remarks($id)
    {
        $queryString = "UPDATE tbl_result SET remarks = '1' WHERE applicant_tbl_id = '$id' ";
        $this->query($queryString);
        return true;
    }

}