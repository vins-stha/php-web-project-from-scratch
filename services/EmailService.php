<?php
require "DBServiceRepository.php";
require_once('../config/config.php');
require_once('../config/dbcon.php');


class EmailService implements DBServiceRepository
{
  private $connectionString;

  function __construct()
  {
    $this->connectionString = DBConnect::dsn();

  }

  public function save(EmailEntity $email)
  {
    // TODO: Implement save() method.
    $address = $email->getEmail();

    try {
      if (self::createTableIfNotExist(TABLE_NAME)) {
        $sql = " INSERT INTO " . TABLE_NAME . " (`emailAddress`)
                VALUES (:emailAddress);";
        $stmt = $this->connectionString->prepare($sql);
        $stmt->bindParam(":emailAddress", $address);
        if ($stmt->execute()) {

        } else {
          die("Could not insert data. " . $this->connectionString->errorInfo());
        }
      }

    } catch (Exception $exception) {
      echo "Error inserting data." . $exception->getMessage();
    }

  }

  public function createTableIfNotExist($tableName)
  {
    // TODO: Create table
    $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                `id` BIGINT NOT NULL AUTO_INCREMENT, 
                `emailAddress` VARCHAR(255) NOT NULL UNIQUE , 
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`)) ENGINE=MyISAM";
    $stmt = $this->connectionString->prepare($sql);
    if (!$stmt->execute()) {
      die("Could not create table" . $this->connectionString->errorInfo());
    }
    return true;
  }
}