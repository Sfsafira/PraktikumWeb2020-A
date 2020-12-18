<?php

class Database
{
    private $host = db_host;
    private $user = db_user;
    private $pass = db_pass;
    private $db_name = db_name;

    private $db;
    private $stmt;

    public function __construct()
    {
        $this->db = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        if ($this->db->connect_errno > 0) {
            die('Unable to connect to database [' . $this->db->connect_error . ']');
        }
    }

    public function query($query)
    {
        $this->stmt = $this->db->prepare($query);
    }

    public function bind($param, $values)
    {
        $this->stmt->bind_param($param, ...$values);
    }

    public function execute()
    {
        if ($this->stmt->execute())
            return 1;
        else
            return $this->stmt->error;
    }

    public function result($sql)
    {
        $hasil = $this->db->query($sql);
        return $hasil->fetch_all(MYSQLI_ASSOC);
    }

    public function single($sql)
    {
        $hasil = $this->db->query($sql);
        return $hasil->fetch_assoc();
    }

    public function queryexecute($sql)
    {
        if ($this->db->query($sql)) return 1;
        else return 0;
    }
    public function close()
    {
        $this->db->close();
    }
}
