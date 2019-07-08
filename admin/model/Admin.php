<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/28/18
 * Time: 12:20 PM
 */

include_once __DIR__ . '/../Database.php';

class Admin extends Database
{
    public function save_admin($admin_user_id, $password, $is_active)
    {
        $queryString = "insert into tbl_admin(admin_id, password, is_active) values('$admin_user_id', '$password', '$is_active');";
        $this->query($queryString);
    }

    public function adminLogin($admin_user_id, $password)
    {
        $queryString = "select * from tbl_admin where admin_id = '$admin_user_id' and  password = '$password' and is_active = '1'";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function get_all_admin()
    {
        $queryString = "select * from tbl_admin";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function get_single_admin($id)
    {
        $queryString = "select * from tbl_admin WHERE admin_tbl_id = '$id'";
        $q = $this->query($queryString);
        $data = $this->fetch($q);
        return $data;
    }

    public function update_admin($id, $admin_id, $password)
    {
        $queryString = "UPDATE tbl_admin SET admin_id = '$admin_id', password = '$password' WHERE admin_tbl_id = '$id' ";
        $this->query($queryString);
        return true;
    }
}