<?php
session_start();

$active = "";

if (!empty($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'game':
            if (!empty($_GET['id'])) {
                $GLOBALS["active"] = "game";
                include("pages/game.php");
            } else {
                header('Location: /');
            }
            break;
        case 'games':
            $GLOBALS["active"] = "games";
            include("pages/games.php");
            break;
        case 'profile':
            if (!empty($_SESSION["user"])) {
                $GLOBALS["active"] = "profile";
                include("pages/profile.php");
            } else {
                header('Location: /?page=login');
            }
            break;
        case 'login':
            include("pages/login.php");
            break;
        case 'signup':
            include("pages/signup.php");
            break;
        case 'signout':
            session_destroy();
            header('Location: /?page=login');
            break;
        case 'postgame':
            if (!empty($_POST)) {
                include("posts.php");
                $lastInsertId = postGame();
                if ($lastInsertId) {
                    echo $lastInsertId;
                } else {
                    header('HTTP/1.0 403 Forbidden');
                }
            } else {
                header('Location: /');
            }
            break;
    }
} else if (!empty($_GET["runmysql"])) {
    exec("systemctl start mysql");
    exit(0);
} else {
    $GLOBALS["active"] = "home";
    include("pages/home.php");
}