<?php
require "DBServiceRepository.php";
require_once('../config/config.php');
require_once('../config/dbcon.php');


class EmailService  implements DBServiceRepository {
    function __construct()
    {
        $connection = new DBConnect();

    }

  public function save(EmailEntity $email)
  {
    // TODO: Implement save() method.
    echo "saved email";
  }
}