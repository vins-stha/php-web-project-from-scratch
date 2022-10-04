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
    var_dump("Email address=".$address);
    $sql = 'INSERT INTO `userEmails`(`emailAddress`) 
            VALUES (?)';
    try {
      var_dump(self::createTableIfNotExist(TABLE_NAME));
      if (self::createTableIfNotExist(TABLE_NAME)) {
        $sql = " INSERT INTO TABLE_NAME (`emailAddress`)
                VALUES (:emailAddress);";
        $stmt = $this->connectionString->prepare($sql);
        $stmt->bindParam(":emailAddress",$address);
        var_dump($stmt->execute());
        if ($stmt->execute()) {
          echo "Inserted data  " . $stmt->execute();
        } else {
          die("Could not insert" . $this->connectionString->errorInfo());
        }
      }

    } catch (Exception $exception) {
      echo "Error inserting data." . $exception->getMessage();
    }

  }

  public function createTableIfNotExist($tableName)
  {
    var_dump("tablename=" . $tableName);
    // TODO: Create table
    $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                `id` BIGINT NOT NULL AUTO_INCREMENT, 
                `emailAddress` VARCHAR(255) NOT NULL , 
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`)) ENGINE=MyISAM";
    $stmt = $this->connectionString->prepare($sql);
    if (!$stmt->execute()) {
      die("Could not create table" . $this->connectionString->errorInfo());
    }
    return true;
  }
}