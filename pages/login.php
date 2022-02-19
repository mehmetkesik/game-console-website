<?php
if (!empty($_POST)) {
    include("posts.php");
    $user = login();
    if ($user) {
        print_r($user);
    } else {
        header('HTTP/1.0 403 Forbidden');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayStation 5 Game Console - Login</title>
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

            </div>
        </div>
        <div class="row tm-row">
            <div class="col-lg-8 tm-post-col">
                <div class="tm-post-full">
                    <div class="mb-4">
                        <form action="" class="mb-5 tm-comment-form">
                            <h2 class="tm-color-primary tm-post-title mb-4">Login information</h2>
                            <div class="mb-4">
                                <input class="form-control" name="name" type="text" placeholder="Username or email">
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="email" type="text" placeholder="Password">
                            </div>
                            <div class="text-right">
                                <button class="tm-btn tm-btn-primary tm-btn-small">Login</button>
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