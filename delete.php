<?php

$host = "localhost";
$database_name = "todo_list";
$database_user = "root";
$database_password = "pass123";

  $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user, // username
    $database_password // password
  );

  $id = $_POST["todo_id"];

  // delete the selected student from the table using student ID
  // sql command (recipe)
  $sql = "DELETE FROM todos where id = :id";
  // prepare 
  $query = $database->prepare( $sql );
  // execute
  $query->execute([
      'id' => $id
  ]);

  // redirect back to index.php
  header("Location: index.php");
  exit;