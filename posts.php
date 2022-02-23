<?php

include("db.php");

function signup()
{
    $user = [];

    if (empty($_POST["name"])) {
        return null;
    }
    $user["name"] = $_POST["name"];

    if (empty($_POST["username"])) {
        return null;
    }
    $user["username"] = $_POST["username"];

    if (empty($_POST["email"])) {
        return null;
    }
    $user["email"] = $_POST["email"];

    if (empty($_POST["password"])) {
        return null;
    }

    $user["password"] = hash("sha512", $_POST["password"]);

    $user["birth_date"] = empty($_POST["birth_date"]) ? null : $_POST["birth_date"];

    if (!empty($_FILES["picture"])) {
        if ($_FILES["picture"]["type"] == "image/png") {
            $user["picture"] = $_POST["username"] . ".png";
        } else if ($_FILES["picture"]["type"] == "image/jpeg") {
            $user["picture"] = $_POST["username"] . ".jpeg";
        } else {
            $user["picture"] = null;
        }

        if ($user["picture"] != null) {
            $directory = "img/userpics/";
            move_uploaded_file($_FILES['picture']['tmp_name'], $directory . $user["picture"]);
        }

    } else {
        $user["picture"] = null;
    }

    $user["last_login_time"] = date('Y-m-d H:i:s');

    return addUser($user);
}

function login()
{
    if (empty($_POST["username"])) {
        return null;
    }

    $user = getUserByUsername($_POST["username"]);
    if (empty($user)) {
        $user = getUserByEmail($_POST["username"]);
    }

    if ($user && $user["password"] == hash("sha512", $_POST["password"])) {
        return $user;
    }
    return null;
}

function postGame()
{
    $game = [];

    if (empty($_POST["name"])) {
        return null;
    }
    $game["name"] = $_POST["name"];

    if (empty($_POST["price"])) {
        return null;
    }
    $game["price"] = $_POST["price"];

    if (empty($_POST["release_date"])) {
        return null;
    }
    $game["release_date"] = $_POST["release_date"];

    $game["admin_score"] = empty($_POST["admin_score"]) ? null : $_POST["admin_score"];
    $game["picture"] = empty($_POST["picture"]) ? null : $_POST["picture"];
    $game["cpu_requirement"] = empty($_POST["cpu_requirement"]) ? null : $_POST["cpu_requirement"];
    $game["gpu_requirement"] = empty($_POST["gpu_requirement"]) ? null : $_POST["gpu_requirement"];
    $game["ram_requirement"] = empty($_POST["ram_requirement"]) ? null : $_POST["ram_requirement"];
    $game["disc_requirement"] = empty($_POST["disc_requirement"]) ? null : $_POST["disc_requirement"];
    $game["features"] = empty($_POST["features"]) ? null : $_POST["features"];

    return addGame($game);
}