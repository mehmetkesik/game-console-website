<header class="tm-header" id="tm-header">
    <div class="tm-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="tm-site-header">
            <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
            <h1 class="text-center">PlayStation 5 <br/>Game Console</h1>
        </div>
        <nav class="tm-nav" id="tm-nav">
            <ul>
                <li class="tm-nav-item <?php echo $GLOBALS["active"] == "home" ? "active" : ""; ?>">
                    <a href="/" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Home
                    </a></li>
                <li class="tm-nav-item <?php echo $GLOBALS["active"] == "profile" ? "active" : ""; ?>">
                    <a href="/?page=profile" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        Profile
                    </a></li>
                <li class="tm-nav-item <?php echo $GLOBALS["active"] == "games" ? "active" : ""; ?>">
                    <a href="/?page=games" class="tm-nav-link">
                        <i class="fas fa-gamepad"></i>
                        Games
                    </a></li>
                <!--<li class="tm-nav-item <?php /*echo $GLOBALS["active"] == "contact" ? "active" : ""; */?>">
                    <a href="/?page=contact" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>-->
            </ul>
        </nav>
        <p class="tm-mb-80 pr-5 text-white">
            Get to know the PlayStation 5 game console. Check out their games and leave comments on the games and rate
            the games. This is your game world..
        </p>
    </div>
</header>