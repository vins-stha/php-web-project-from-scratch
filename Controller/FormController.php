<?php
require "../services/EmailService.php";

class FormController
{
  private $emailService;

  function __construct()
  {
    $this->emailService = new EmailService();
  }

  public function addNewEmail($request)
  {

    $email = new EmailEntity();
    $email->setEmail($request['email']);
    var_dump($email);
    // if email valid
    $this->emailService->save($email);


  }
}