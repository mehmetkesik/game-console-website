<?php
include("db.php");
$games = getGames();
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
                        <span>36 comments</span>
                        <span>by Admin Nat</span>
                    </div>
                </article>
            <?php } ?>
        </div>
        <div class="row tm-row tm-mt-100 tm-mb-75">
            <div class="tm-prev-next-wrapper">
                <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
                <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
            </div>
            <div class="tm-paging-wrapper">
                <span class="d-inline-block mr-3">Page</span>
                <nav class="tm-paging-nav d-inline-block">
                    <ul>
                        <li class="tm-paging-item active">
                            <a href="#" class="mb-2 tm-btn tm-paging-link">1</a>
                        </li>
                        <li class="tm-paging-item">
                            <a href="#" class="mb-2 tm-btn tm-paging-link">2</a>
                        </li>
                        <li class="tm-paging-item">
                            <a href="#" class="mb-2 tm-btn tm-paging-link">3</a>
                        </li>
                        <li class="tm-paging-item">
                            <a href="#" class="mb-2 tm-btn tm-paging-link">4</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>