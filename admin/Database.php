<?php
/*
 * Database configurations are here.
 * By changing database name and other information all project will be changed.
 * */
define('DB_HOST', 'localhost');
define('DB_NAME', 'online_admission_test');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

class Database
{
    private $link;

    private function connect()
    {
        $this->link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    private function disconnect()
    {
        mysqli_close($this->link);
    }

    public function query($queryString)
    {
        $this->connect();
        $q = mysqli_query($this->link, $queryString);
        $this->disconnect();
        return $q;
    }

    public function fetch($q)
    {
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public function fetch_assoc($q)
    {
        return mysqli_fetch_assoc($q);
    }

}