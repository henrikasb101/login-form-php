<?php

session_start();

if (!isset($_SESSION['auth']) && $_SESSION['auth'] == null) {
    header('Location: ./login');
    die();
}

require_once 'app/config.php';
require_once 'app/models/User.php';
use app\models\User;

$page = 'Dashboard';

if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
    $user = new User($_SESSION['user']);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'app/components/head_content.php' ?>
    </head>    
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand user-select-none"><?= WEB_TITLE ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $user->getName() ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="./logout">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container bg-white shadow p-3 my-5 rounded-3">
            <p class="fs-5 p-0 m-0">Hello World!</p>
        </div>
    </body>
</html>
