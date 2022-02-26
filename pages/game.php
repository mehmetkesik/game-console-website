<?php
$id = $_GET["id"];
include("db.php");

$game = getGame($id);
if (!$game) {
    header("Location: /");
}

if (!empty($_POST) && !empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $comment = $_POST["comment"];
    $gameId = $game["id"];
    addComment($user["id"], $gameId, $comment);
    header("Location: /?page=game&id=$gameId");
    exit(0);
}

$comments = getComments($game["id"]);

for ($i = 0; $i < count($comments); $i++) {
    $comments[$i]["user"] = getUserById($comments[$i]["user_id"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayStation 5 Game Console - <?php echo $game["name"]; ?></title>
    <?php
    include "inc/head.php";
    ?>
</head>
<body>

<?php include "inc/menu.php"; ?>

<div class="container-fluid">
    <main class="tm-main">

        <?php include("pages/inc/header.php"); ?>

        <div class="row tm-row">
            <div class="col-12">
                <hr class="tm-hr-primary tm-mb-55">
                <img src="/img/gamepics/<?php echo $game["picture"]; ?>" style="width:100%;" alt="Game Image"/>
            </div>
        </div>
        <div class="row tm-row">
            <div class="col-lg-8 tm-post-col">
                <div class="tm-post-full">
                    <div class="mb-4">
                        <h2 class="pt-2 tm-color-primary tm-post-title"><?php echo $game["name"]; ?></h2>
                        <p class="tm-mb-40">Release Date: <b><?php echo prettyDate($game["release_date"]); ?></b>
                            <br/>
                            Price: <b><?php echo $game["price"]; ?> £</b>
                            <br/>
                            Score: <?php

                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $game["admin_score"]) {
                                    echo "<span style='color:#cfb53b;font-size:22px;'>★</span>";
                                } else {
                                    echo "<span style='font-size:22px;'>★</span>";
                                }
                            }
                            ?>
                        </p>

                        <span class="d-block tm-color-primary">System Requirements</span>
                        <hr/>
                        <p>
                            <b>CPU:</b> <?php echo $game["cpu_requirement"]; ?> <br/>
                            <b>GPU:</b> <?php echo $game["gpu_requirement"]; ?> <br/>
                            <b>RAM:</b> <?php echo $game["ram_requirement"]; ?> GB<br/>
                            <b>DISC:</b> <?php echo $game["disc_requirement"]; ?> GB<br/>
                        </p>
                        <hr/>

                        <?php $gn = slugify($game['name']);
                        include("pages/games/$gn.php"); ?>

                        <span class="d-block text-right tm-color-primary">
                            <?php for ($i = 0; $i < $game['admin_score']; $i++) echo "★ "; ?> . Scored By Admin</span>
                    </div>

                    <!-- Comments -->
                    <div>
                        <h2 class="tm-color-primary tm-post-title">Comments</h2>
                        <hr class="tm-hr-primary tm-mb-45">

                        <?php foreach ($comments as $comment) { ?>
                            <div class="tm-comment tm-mb-45">
                                <figure class="tm-comment-figure">
                                    <?php
                                    $image = "img/user-icon.png";
                                    $picsDir = "img/userpics/";
                                    if (file_exists($picsDir . $comment["user"]["username"] . ".png")) {
                                        $image = $picsDir . $comment["user"]["username"] . ".png";
                                    } else if (file_exists($picsDir . $comment["user"]["username"] . ".jpeg")) {
                                        $image = $picsDir . $comment["user"]["username"] . ".jpeg";
                                    }
                                    ?>
                                    <img src="<?php echo $image; ?>" alt="Image"
                                         class="mb-2 rounded-circle img-thumbnail"
                                         style="width:100px;height:100px;">
                                    <figcaption class="tm-color-primary text-center">
                                        <?php echo $comment["user"]["name"]; ?>
                                    </figcaption>
                                </figure>
                                <div style="width:100%;">
                                    <p style="word-wrap: break-word;">
                                        <?php echo $comment["comment"]; ?>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="tm-color-primary"></a>
                                        <span class="tm-color-primary text-right">
                                            <?php echo prettyDate($comment["time"]); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if (!empty($_SESSION["user"])) { ?>
                            <form method="post" action="" class="mb-5 tm-comment-form">
                                <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                                <div class="mb-4">
                                <textarea class="form-control" name="comment" rows="6"
                                          placeholder="Type your comment.." required></textarea>
                                </div>
                                <div class="text-right">
                                    <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Submit</button>
                                </div>
                            </form>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <?php include("pages/inc/sidebar.php"); ?>

        </div>

        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>