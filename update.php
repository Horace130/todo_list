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
  $completed = $_POST['completed'];
  
      // update the task
      if ( $completed == 1 ) {
        // sql command
        $sql = "UPDATE todos set completed = 0 WHERE id = :id";
    } else {
        // sql command
        $sql = "UPDATE todos set completed = 1 WHERE id = :id";
    }

    // prepare
    $query = $database->prepare( $sql );
    // execute
    $query->execute([
        'id' => $id
    ]);
    // redirect back to index.php
    header("Location: index.php");
    exit;

