<?php


class Email
{
  private $email;

  /**
   * Email constructor.
   * @param $email
   */
  public function __construct()
  {

  }

  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }


}