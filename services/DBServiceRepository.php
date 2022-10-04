<?php
include "../model/Email.php";
 interface DBServiceRepository {
  public function save(EmailEntity $email);
}