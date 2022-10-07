<?php
require "../services/EmailService.php";

class FormController
{
  private $emailService;
  private $dbconn;

  function __construct()
  {
    // establish connection
    $this->dbconn = DBConnect::dbconnect();
//    if(!$this->dbconn)
//    {
//      $response = [
//          'message' => "Database connection error. Please check your config variables",
//      ];
//      return $response;
//    }
    $this->emailService = new EmailService();
  }

  public function addNewEmail($request)
  {
    $email = new EmailEntity();

    //Validating
    if (filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {

      $email->setEmail($request['email']);
      $result = ($this->emailService->save($email));
      return $result;

    } else {
      $response = [
          'error' => "Email is not valid",
      ];
      return $response;
    }

  }
}