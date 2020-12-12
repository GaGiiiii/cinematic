<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class Database {

  // private $host = "localhost"; // Host
  // private $db_name = "cinematic"; // DB Name
  // private $username = "root"; // DB Username
  // private $password = ""; // DB Password
  private $host = "sql313.epizy.com"; // Host
  private $db_name = "epiz_23673363_cinematic"; // DB Name
  private $username = "epiz_23673363"; // DB Username
  private $password = "aUHYBpdhgfONW"; // DB Password

  private static $instance = null; // Instanca klase
  public $connection = null; // Konekcija

  private function __construct() {
    $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
  }

  public function getConnection() {
    return $this->connection;
  }

  public static function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new Database();
    }

    return self::$instance;
  }
}
