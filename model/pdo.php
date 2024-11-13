<?php
function pdo_get_connection() {
          $dbrul = "mysql:host=localhost;dbname=duan1;charset=utf8";
          $dbName = "root";
          $dbPass = " ";

          $ccon = new PDO($dbrul, $dbName, $dbPass);
          $ccon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          return $ccon;
}