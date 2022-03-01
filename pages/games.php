<?php
include("db.php");

$s = 1; //page selection
if (!empty($_GET["s"])) {
    $gs = $_GET["s"];
    if (is_numeric($gs) && $gs > 0) {
        $s = intval($gs);
    }
}

$games = [];
$length = 4;
$isSearching = false;
if (!empty($_GET["search"])) {//game search
    $isSearching = true;
    $games = getGamesBySearch($length, $_GET["search"]);
} else {//games
    $games = getGames(($s - 1) * $length, $length);
}

for ($i = 0; $i < count($games); $i++) {
    $games[$i]["commentsCount"] = getGameCommentsCount($games[$i]["id"]);
}
$gamesCount = getGamesCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayStation 5 Game Console - Games</title>
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
            <?php foreach ($games as $game) { ?>
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="/?page=game&id=<?php echo $game['id']; ?>" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="img/gamepics/<?php echo $game['picture']; ?>" alt="Image" class="img-fluid"
                                 style="width:440px;height:220px;">
                        </div>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title"><?php echo $game['name']; ?></h2>
                    </a>
                    <p class="tm-pt-30">
                        <?php echo $game['features']; ?>
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">
                            <?php
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $game["admin_score"]) {
                                    echo "<span style='color:#cfb53b;font-size:22px;'>★</span>";
                                } else {
                                    echo "<span style='font-size:22px;'>★</span>";
                                }
                            }
                            ?> . <?php echo $game["price"]; ?> £</span>
                        <span class="tm-color-primary"><?php echo prettyDate($game['release_date']); ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span><?php echo $game["commentsCount"]; ?> comments</span>
                        <span>by Admin Nat</span>
                    </div>
                </article>
            <?php } ?>
        </div>
        <?php if (!$isSearching) { ?>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-prev-next-wrapper">
                    <?php
                    $prev = $s <= 1 ? "#" : "/?page=games&s=" . ($s - 1);
                    $next = ($s * $length) >= $gamesCount ? "#" : "/?page=games&s=" . ($s + 1);
                    ?>
                    <a href="<?php echo $prev; ?>"
                       class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20
                   <?php echo $prev == '#' ? 'disabled' : ''; ?>">Prev</a>
                    <a href="<?php echo $next; ?>"
                       class="mb-2 tm-btn tm-btn-primary tm-prev-next
                   <?php echo $next == '#' ? 'disabled' : ''; ?>">Next</a>
                </div>
            </div>
        <?php } ?>
        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>