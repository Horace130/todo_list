<?php

    // connect to the database
    $database = connectToDB();

    $id = $_POST['task_id'];
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
    // redirect back to /
    header("Location: /");
    exit;