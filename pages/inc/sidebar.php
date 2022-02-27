<?php
include_once("db.php");
$games = getGames(0, 3);
?>
<aside class="col-lg-4 tm-aside-col">
    <div class="tm-post-sidebar">

        <?php if (!empty($game["video"])) { ?>
            <hr class="mb-3 tm-hr-primary">
            <h2 class="mb-4 tm-post-title tm-color-primary">Game Video</h2>
            <iframe src="<?php echo $game["video"]; ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen style="width:100%;"></iframe>
        <?php } ?>

        <hr class="mb-3 tm-hr-primary">
        <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>

        <?php foreach ($games as $game) { ?>
            <a href="/?page=game&id=<?php echo $game['id']; ?>" class="d-block tm-mb-40">
                <figure>
                    <img src="img/gamepics/<?php echo $game["picture"]; ?>" alt="Image"
                         class="mb-3 img-fluid" style="width:440px; height:180px;">
                    <figcaption class="tm-color-primary"><?php echo substr($game["features"], 0, 50) ?>
                    </figcaption>
                </figure>
            </a>
        <?php } ?>

    </div>
</aside>