<?php

require_once "./vendor/autoload.php";

abstract class Repository {

    protected $db;

    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable("./");
        $dotenv->load();
        $this->db = mysqli_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASS"], $_ENV["DB_NAME"], $_ENV["DB_PORT"]);
    }

    public function close() {
        $this->db->close();
    }
}