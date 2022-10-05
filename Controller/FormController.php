<?php
require "../services/EmailService.php";

class FormController
{
  private $emailService;
  private $dbconn;

  function __construct()
  {
    $this->dbconn = DBConnect::dbconnect();
    $this->emailService = new EmailService();
  }

  public function addNewEmail($request)
  {

    $email = new EmailEntity();
    $email->setEmail($request['email']);
    // if email valid
    $this->emailService->save($email);


  }
}