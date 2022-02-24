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