<?php
require_once('config.php');

class DBConnect
{

  function __construct()
  {
  }

  public static function dbconnect()
  {
    $db = DB_NAME;
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
      $dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
      if (mysqli_connect_errno()) {
        error_log('Connection error: ' . $dbconnect->connect_errno);
        return false;
      } else {
        mysqli_select_db($dbconnect, DB_NAME);
        return true;
      }
    } catch (Exception $PDOException) {
      if ($PDOException->getCode() == 1049) {
        try {
          // create database
          if (mysqli_query($dbconnect, "CREATE DATABASE IF NOT EXISTS " . DB_NAME)) {
            self::dbconnect();
          }

        } catch (Exception $exception) {
          die("Exception occurred. " . $exception->getMessage() . " code = " . $exception->getCode());
        }
      }
    }
  }

  public static function dbconnectionString()
  {
    if (self::dbconnect()) {
      return mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }
  }

  public static function dsn()
  {
    if (self::dbconnect()) {
      $dsn = "mysql:host=" . DB_HOST . ":" . DB_PORT . ";dbname=" . DB_NAME . ";charset=UTF8";
      try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $options);

        if ($conn) {
          return $conn;
        }
      } catch (PDOException $e) {
        echo "Could not connect =>".$e->getMessage(), $e->getCode();
      }
    }
  }

  public static function closeConnection()
  {

  }

}