<?php
require "DBServiceRepository.php";

class EmailService  implements DBServiceRepository {
    function __construct()
    {
        
    }

  public function save(Email $email)
  {
    // TODO: Implement save() method.
    echo "saved email";
  }
}