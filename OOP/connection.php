<?php

class Connection
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    public $connection; //akan menampung existing koneksi database

    public function __construct($hostname, $username, $password, $dbname)
    {
        // init connection params
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connection()
    {
        // create connection
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            die("ERROR COK: " . $this->connection->connect_error);
        }
    }

    
}
