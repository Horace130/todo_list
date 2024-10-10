<?php
// Start session
session_start();

// Import all the required files
require "includes/functions.php";

// Load the class files
require 'includes/class-auth.php'; // Include the Auth class before using it
$auth = new Auth(); // Now we can create an instance of Auth

require 'includes/class-task.php';
$task = new Task();

require 'includes/class-user.php';
$user = new User();

// Figure out the URL the user is visiting
$path = $_SERVER["REQUEST_URI"];
// Removes the question mark in URL
$path = parse_url($path, PHP_URL_PATH);

// Once you figure out the path the user is visiting, load relevant content
switch ($path) {
    // Auth
    case '/auth/login':
        $auth->login();
        break;
    case '/auth/signup':
        $auth->signup();
        break;
    case '/task/add':
        $task->add();
        break;
    case '/task/update':
        $task->update();
        break;
    case '/task/delete':
        $task->delete();
        break;

    // User
    case '/user/delete':
        $user->delete();
        break;

    case '/user/edit':
        $user->edit();
        break;

    case '/user/changepwd':
        $user->changepwd();
        break;

    case '/user/add':
        $user->add();
        break;

    // Pages
    case '/login':
        require 'pages/login.php';
        break;
    case '/signup':
        require 'pages/signup.php';
        break;
    case '/logout':
        require 'pages/logout.php';
        break;
    case '/manage-users':
        require 'pages/manage-users.php';
        break;
    case '/user_add':
        require 'pages/manage-users-add.php';
        break;
    case '/user_edit':
        require 'pages/manage-users-edit.php';
        break;
    case '/user_change_psw':
        require 'pages/manage-users-change-psw.php';
        break;
    default:
        require 'pages/home.php';
        break;
}
