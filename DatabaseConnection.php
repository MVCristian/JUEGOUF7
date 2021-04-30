<?php
include_once 'DB.php';

abstract class DatabaseConnection implements DB {
    protected $servername;
    protected $username;
    protected $password;
    protected $connection;

    function __construct($servername, $username, $password) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    function __destruct() {
        $this->connection = null;
    }

}

