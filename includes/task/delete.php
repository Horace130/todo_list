<?php

    // connect to the database
    $database = connectToDB();

    $id = $_POST['task_id'];

    // delete the task from the table
    // sql command
    $sql = "DELETE FROM todos WHERE id = :id";
    // prepare
    $query = $database->prepare( $sql );
    // execute
    $query->execute([
        'id' => $id
    ]);

    // redirect back to /
    header("Location: /");
    exit;