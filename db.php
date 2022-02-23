<?php

function openDb()
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=gameconsole", "root", "");
        $db->query("SET CHARACTER SET utf8");
        return $db;
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

function getConsole()
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM console WHERE id = 1");
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result;
    }
    return null;

    /*if ($query->rowCount()) {
        foreach ($query as $row) {
            print $row['name'] . "<br>";
        }
    }*/
}

function getUserById($id)
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM users WHERE id = :id");
    $query->bindValue(':id', $id);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result;
    }
    return null;
}

function getUserByUsername($username)
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindValue(':username', $username);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result;
    }
    return null;
}

function getUserByEmail($email)
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindValue(':email', $email);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result;
    }
    return null;
}

function addUser($user)
{
    try {
        $db = openDb();
        $query = $db->prepare("INSERT INTO users SET name = ?, username = ?, email = ?, 
        password = ?, birth_date = ?, picture = ?, last_login_time = ?");
        $insert = $query->execute(array(
            $user["name"], $user["username"], $user["email"], $user["password"],
            $user["birth_date"], $user["picture"], $user["last_login_time"]
        ));
        if ($insert) {
            $last_id = $db->lastInsertId();
            return $last_id;
        }
        return null;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function updateUser($user)
{
    $db = openDb();
    $query = $db->prepare("UPDATE users SET name = ?, email = ?, birth_date = ? WHERE id = ?");
    $update = $query->execute(array(
        $user["name"], $user["email"], $user["birth_date"], $user["id"]
    ));
    if ($update) {
        return true;
    }
    return null;
}

function updateUserPassword($password, $userId)
{
    $db = openDb();
    $query = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    $update = $query->execute(array($password, $userId));
    if ($update) {
        return true;
    }
    return null;
}

function getGame($id)
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM games WHERE id = :id");
    $query->bindValue(':id', $id);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result;
    }
    return null;
}

function getGames()
{
    $db = openDb();
    $query = $db->query("SELECT * FROM games", PDO::FETCH_ASSOC);
    $games = [];
    if ($query->rowCount()) {
        foreach ($query as $row) {
            array_push($games, $row);
        }
    }
    return $games;
}

function addGame($game)
{
    $db = openDb();
    $query = $db->prepare("INSERT INTO games SET console_id = 1, name = ?, price = ?, 
        release_date = ?, admin_score = ?, picture = ?, cpu_requirement = ?, gpu_requirement = ?, 
        ram_requirement = ?, disc_requirement = ?, features = ?");
    $insert = $query->execute(array(
        $game["name"], $game["price"], $game["release_date"], $game["admin_score"],
        $game["picture"], $game["cpu_requirement"], $game["gpu_requirement"], $game["ram_requirement"],
        $game["disc_requirement"], $game["features"]
    ));
    if ($insert) {
        $last_id = $db->lastInsertId();
        return $last_id;
    }
    return null;
}

function updateGame($game)
{
    $db = openDb();
    $query = $db->prepare("UPDATE uyeler SET console_id = 1, name = ?, price = ?, 
        release_date = ?, admin_score = ?, picture = ?, cpu_requirement = ?, gpu_requirement = ?, 
        ram_requirement = ?, disc_requirement = ?, features = ? WHERE id = ?");
    $update = $query->execute(array(
        $game["name"], $game["price"], $game["release_date"], $game["admin_score"],
        $game["picture"], $game["cpu_requirement"], $game["gpu_requirement"], $game["ram_requirement"],
        $game["disc_requirement"], $game["features"], $game["id"]
    ));
    if ($update) {
        return true;
    }
    return null;
}


//helper
function slugify($text)
{
    // Strip html tags
    $text = strip_tags($text);
    // Replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, '-');
    // Remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // Lowercase
    $text = strtolower($text);
    // Check if it is empty
    if (empty($text)) {
        return 'n-a';
    }
    // Return result
    return $text;
}