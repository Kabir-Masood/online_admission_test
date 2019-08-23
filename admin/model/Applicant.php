<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/28/18
 * Time: 12:20 PM
 */

include_once __DIR__ . '/../Database.php';

class Applicant extends Database
{
    public function save_applicant($applicant_id, $password, $program_tbl_id, $year, $semester, $payment, $is_exam_given)
    {
        $queryString = "insert into tbl_applicant(applicant_id, password, program_tbl_id, year, semester, payment, is_exam_given) values('$applicant_id', '$password', '$program_tbl_id', '$year', '$semester', '$payment', '$is_exam_given');";
        $this->query($queryString);
    }

    public function get_all_applicant()
    {
        $queryString = "select * from tbl_applicant";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function get_single_applicant($id)
    {
        $queryString = "select * from tbl_applicant WHERE applicant_tbl_id = '$id'";
        $q = $this->query($queryString);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function getProgram($id)
    {
        $query_string = "select program_tbl_id from tbl_applicant where applicant_id = '$id'";
        $q = $this->query($query_string);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function getYear($id)
    {
        $queryString = "select year from tbl_applicant WHERE applicant_id = '$id'";
        $q = $this->query($queryString);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function getSemester($id)
    {
        $queryString = "select semester from tbl_applicant WHERE applicant_id = '$id'";
        $q = $this->query($queryString);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function update_applicant($id, $applicant_id, $password, $program_tbl_id, $year, $semester, $payment, $is_exam_given)
    {
        $queryString = "UPDATE tbl_applicant SET applicant_id = '$applicant_id', password = '$password', program_tbl_id = '$program_tbl_id', year = '$year', semester = '$semester', payment = '$payment', is_exam_given = '$is_exam_given' WHERE applicant_tbl_id = '$id' ";
        $this->query($queryString);
        return true;
    }

    public function update_applicant_exam_status($id)
    {
        $queryString = "UPDATE tbl_applicant SET is_exam_given = '1' WHERE applicant_id = '$id' ";
        $this->query($queryString);
        return true;
    }

    public function update_applicant_payment($id)
    {
        $queryString = "UPDATE tbl_applicant SET payment = '1' WHERE applicant_id = '$id' ";
        $this->query($queryString);
        return true;
    }

    public function getApplicantTableIdByApplicantId($applicant_id)
    {
        $queryString = "select applicant_tbl_id from tbl_applicant where applicant_id = '$applicant_id'";
        $q = $this->query($queryString);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function applicantLogin($applicant_user_id, $password)
    {
        $queryString = "select * from tbl_applicant where applicant_id = '$applicant_user_id' and  password = '$password' and payment = '1' and is_exam_given = '0'";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }
}