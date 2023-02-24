<?php
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD","");
    define("DB","shop");

  class Db {
    private static $instance = NULL;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);
        }
        return self::$instance;
    }
  }

?>



