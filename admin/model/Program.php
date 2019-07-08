<?php

include_once __DIR__ . '/../Database.php';

class Program extends Database
{
    public function save_program($program_name, $dept_code)
    {
        $queryString = "insert into tbl_program_info(program_name, dept_code) values('$program_name', '$dept_code');";
        $this->query($queryString);
    }

    public function get_all_program()
    {
        $queryString = "select * from tbl_program_info";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function get_single_program($id)
    {
        $query_string = "select * from tbl_program_info where program_tbl_id = '$id'";
        $q = $this->query($query_string);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function delete_program($id)
    {
        $queryString = "DELETE from tbl_program_info where program_tbl_id = '$id'";
        $q = $this->query($queryString);
        $data = $this->fetch_assoc($q);
        return $data;
    }

    public function update_program($id, $program_name, $dept_code)
    {
        $queryString = "UPDATE tbl_program_info SET program_name = '$program_name', dept_code = '$dept_code' WHERE program_tbl_id = '$id' ";
        $this->query($queryString);
        return true;
    }

    /*public function increase_visit_count($id)
    {
        $queryString = "update class_routine set visit_counter = visit_counter+1 where id = $id";
        $this->query($queryString);
    }*/
}