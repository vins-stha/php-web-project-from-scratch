<?php
require_once('config.php');

class DBConnect
{

  function __construct()
  {
    // connect db
    self::dbconnect();
  }

  public static function dbconnect()
  {
    $dsn = "mysql:host=" . DB_HOST . ":" . DB_PORT . ";charset=UTF8";
    $db = DB_NAME;

    try {
      $dbconnect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
      if ($dbconnect) {
        if (!$dbconnect->query("USE $db")) {
          if (!$dbconnect->query("CREATE DATABASE $db")) {
            throw new Exception("Could not create database.");
          }
        }
      }
    } catch (Exception $PDOException) {
      echo $PDOException->getMessage();
    }
  }

  public static function closeConnection()
  {

  }

}