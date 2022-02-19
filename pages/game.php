<?php
$id = $_GET["id"];
include("db.php");

$game = getGame($id);
if (!$game) {
    header("Location: /");
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
                <img src="/pics/<?php echo $game["picture"]; ?>" style="width:100%;" alt="Game Image"/>
            </div>
        </div>
        <div class="row tm-row">
            <div class="col-lg-8 tm-post-col">
                <div class="tm-post-full">
                    <div class="mb-4">
                        <h2 class="pt-2 tm-color-primary tm-post-title"><?php echo $game["name"]; ?></h2>
                        <p class="tm-mb-40">Release Date: <b><?php echo
                                DateTime::createFromFormat("Y-m-d H:i:s", $game["release_date"])
                                    ->format('F j, Y'); ?> </b>
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
                            <b>Some Features:</b> <?php echo $game["features"]; ?> <br/>
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
                        <div class="tm-comment tm-mb-45">
                            <figure class="tm-comment-figure">
                                <img src="img/comment-1.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                                <figcaption class="tm-color-primary text-center">Mark Sonny</figcaption>
                            </figure>
                            <div>
                                <p>
                                    Praesent aliquam ex vel lectus ornare tritique. Nunc et eros
                                    quis enim feugiat tincidunt et vitae dui. Nullam consectetur
                                    justo ac ex laoreet rhoncus. Nunc id leo pretium, faucibus
                                    sapien vel, euismod turpis.
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="tm-color-primary">REPLY</a>
                                    <span class="tm-color-primary">June 14, 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="tm-comment-reply tm-mb-45">
                            <hr>
                            <div class="tm-comment">
                                <figure class="tm-comment-figure">
                                    <img src="img/comment-2.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                                    <figcaption class="tm-color-primary text-center">Jewel Soft</figcaption>
                                </figure>
                                <p>
                                    Nunc et eros quis enim feugiat tincidunt et vitae dui.
                                    Nullam consectetur justo ac ex laoreet rhoncus. Nunc
                                    id leo pretium, faucibus sapien vel, euismod turpis.
                                </p>
                            </div>
                            <span class="d-block text-right tm-color-primary">June 21, 2020</span>
                        </div>
                        <form action="" class="mb-5 tm-comment-form">
                            <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                            <div class="mb-4">
                                <input class="form-control" name="name" type="text">
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="email" type="text">
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" name="message" rows="6"></textarea>
                            </div>
                            <div class="text-right">
                                <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <aside class="col-lg-4 tm-aside-col">
                <div class="tm-post-sidebar">
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="mb-4 tm-post-title tm-color-primary">Game Video</h2>
                    <iframe src="https://www.youtube.com/embed/cxXvYJyBlc4"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen style="width:100%;"></iframe>
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                    <a href="#" class="d-block tm-mb-40">
                        <figure>
                            <img src="img/img-02.jpg" alt="Image" class="mb-3 img-fluid">
                            <figcaption class="tm-color-primary">Duis mollis diam nec ex viverra scelerisque a sit
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" class="d-block tm-mb-40">
                        <figure>
                            <img src="img/img-05.jpg" alt="Image" class="mb-3 img-fluid">
                            <figcaption class="tm-color-primary">Integer quis lectus eget justo ullamcorper
                                ullamcorper
                            </figcaption>
                        </figure>
                    </a>
                    <a href="#" class="d-block tm-mb-40">
                        <figure>
                            <img src="img/img-06.jpg" alt="Image" class="mb-3 img-fluid">
                            <figcaption class="tm-color-primary">Nam lobortis nunc sed faucibus commodo</figcaption>
                        </figure>
                    </a>
                </div>
            </aside>
        </div>

        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>