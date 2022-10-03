<?php
require_once "../model/Email.php";
 interface DBServiceRepository {
  public function save(Email $email);
}