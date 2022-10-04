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

    try {
      $dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

      if (mysqli_connect_errno()) {
        error_log('Connection error: ' . $dbconnect->connect_errno);
      } else {

        if (!mysqli_select_db($dbconnect, DB_NAME)) {

          if (!mysqli_query($dbconnect, "CREATE DATABASE DB_NAME")) {
            die('Could not create database named DB_NAME ' . mysqli_error($dbconnect));
          }
        }
      }
      return true;
    } catch (Exception $PDOException) {
      die ($PDOException->getMessage());

    }
  }

  public static function dbconnectionString(){
    if (self::dbconnect())
    {
      return mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }
  }

  public static function dsn() {
    if (self::dbconnect())
    {
      $dsn = "mysql:host=".DB_HOST.":".DB_PORT.";dbname=".DB_NAME.";charset=UTF8";
      try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $options);

        if ($conn) {
          return $conn;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

  public static function closeConnection()
  {

  }

}