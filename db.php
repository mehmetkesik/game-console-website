<?php

function openDb()
{
    try {
        $db = new PDO("mysql:host=127.0.0.1;dbname=gameconsole", "root", "");
        //$db = new PDO("sqlite:" . __DIR__ . "/console.db");
        //$db->query("SET CHARACTER SET utf8");
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

function getUsersBySearch($search)
{
    $search = "%" . $search . "%";
    $db = openDb();
    $query = $db->prepare("SELECT * FROM users WHERE admin != 1 and username LIKE :search ORDER BY id DESC LIMIT 5");
    $query->bindValue(":search", $search);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addUser($user)
{
    try {
        $db = openDb();
        $query = $db->prepare("INSERT INTO users SET name = ?, username = ?, email = ?, 
        password = ?, birth_date = ?");
        $insert = $query->execute(array(
            $user["name"], $user["username"], $user["email"], $user["password"],
            $user["birth_date"]
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

function deleteUserById($id)
{
    $db = openDb();
    $query = $db->prepare("DELETE FROM users WHERE id = ?");
    $delete = $query->execute(array($id));
    if ($delete) {
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

function getGames($start, $length)
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM games ORDER BY id ASC LIMIT :start , :length");
    $query->bindValue(":start", $start, PDO::PARAM_INT);
    $query->bindValue(":length", $length, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getGamesBySearch($length, $search)
{
    $search = "%" . $search . "%";
    $db = openDb();
    $query = $db->prepare("SELECT * FROM games WHERE name LIKE :search ORDER BY id ASC LIMIT :length");
    $query->bindValue(":search", $search);
    $query->bindValue(":length", $length, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getGamesCount()
{
    $db = openDb();
    $query = $db->prepare("SELECT count(*) FROM games");
    $query->execute();
    $result = $query->fetch();
    if ($result) {
        return $result[0];
    }
    return 0;
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

function getGameCommentsCount($gameId)
{
    $db = openDb();
    $query = $db->prepare("SELECT count(*) FROM comments WHERE game_id = :id");
    $query->bindValue(':id', $gameId);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result[0];
    }
    return 0;
}

function getGameScoreByUser($userId, $gameId)
{
    $db = openDb();
    $query = $db->prepare("SELECT score FROM scores WHERE user_id = :userid and game_id = :gameid");
    $query->bindValue(':userid', $userId);
    $query->bindValue(':gameid', $gameId);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
        return $result[0];
    }
    return 0;
}

function addGameScoreByUser($userId, $gameId, $score)
{
    $db = openDb();
    $query = $db->prepare("INSERT INTO scores SET user_id = ?, game_id = ?, score = ?");
    $insert = $query->execute(array($userId, $gameId, $score));
    if ($insert) {
        $last_id = $db->lastInsertId();
        return $last_id;
    }
    return null;
}

function getGameScores($gameId)
{
    $db = openDb();
    $query = $db->prepare("SELECT score FROM scores WHERE game_id = :gameid");
    $query->bindValue(':gameid', $gameId);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getComments($gameId)
{
    $db = openDb();
    $query = $db->prepare("SELECT * FROM comments WHERE game_id = :id");
    $query->bindValue(':id', $gameId);
    $query->execute();

    //$games = [];
    return $query->fetchAll(PDO::FETCH_ASSOC);
    /*if ($query->rowCount()) {
        foreach ($query as $row) {
            array_push($games, $row);
        }
    }
    return $games;*/
}

function addComment($userId, $gameId, $comment)
{
    $db = openDb();
    $query = $db->prepare("INSERT INTO comments SET user_id = ?, game_id = ?, comment = ?");
    $insert = $query->execute(array($userId, $gameId, $comment));
    if ($insert) {
        $last_id = $db->lastInsertId();
        return $last_id;
    }
    return null;
}

function deleteUserComment($id)
{
    $db = openDb();
    $query = $db->prepare("DELETE FROM comments WHERE id = ?");
    $delete = $query->execute(array($id));
    if ($delete) {
        return true;
    }
    return null;
}

function deleteUserComments($userId)
{
    $db = openDb();
    $query = $db->prepare("DELETE FROM comments WHERE user_id = ?");
    $delete = $query->execute(array($userId));
    if ($delete) {
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

function prettyDate($date)
{
    return DateTime::createFromFormat("Y-m-d H:i:s", $date)->format('M j, Y');
}