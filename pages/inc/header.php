<!-- Search form -->
<div class="row tm-row">
    <div class="col-12 col-lg-8">
        <form method="GET" class="form-inline tm-mb-80 tm-search-form">
            <input name="page" value="games" style="display: none;"/>
            <input class="form-control tm-search-input" name="search" type="text" placeholder="Search..."
                   aria-label="Search">
            <button class="tm-search-button" type="submit">
                <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <div class="col-12 col-lg-4">
        <div class="d-flex justify-content-end">
            <?php if (empty($_SESSION["user"])) { ?>
                <a href="/?page=login">
                    <button class="tm-btn tm-btn-primary tm-btn-small user-button">Login</button>
                </a>
                <a href="/?page=signup">
                    <button class="tm-btn tm-btn-primary tm-btn-small user-button">Signup</button>
                </a>
            <?php } else { ?>
                <a href="/?page=signout">
                    <button class="tm-btn tm-btn-primary tm-btn-small user-button" style="background-color: #871C2B"
                            onclick="signout();">
                        Signout
                    </button>
                </a>
            <?php } ?>
        </div>
    </div>
</div>