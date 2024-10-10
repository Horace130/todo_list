<?php

    // connect to the database
    $database = connectToDB();
    
    $task_name = $_POST['task_name'];

    // make sure task_name is not empty
    if ( empty( $task_name ) ) {
        setError( "Please insert a task", "/" );
    } else {
        // add task into todos table
        // sql command
        $sql = "INSERT INTO todos (`label`,`user_id`) VALUES (:label, :user_id)";
        // prepare
        $query = $database->prepare( $sql );
        // execute
        $query->execute([
            'label' => $task_name,
            'user_id' => $_SESSION['user']['id']
        ]);

        // redirect back to /
        header("Location: /");
        exit;
    }

 