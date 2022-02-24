<?php
include("db.php");
$console = getConsole();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayStation 5 Game Console</title>
    <?php
    include "inc/head.php";
    ?>
</head>
<body>

<?php include "inc/menu.php"; ?>

<div class="container-fluid">
    <main class="tm-main">

        <?php include("pages/inc/header.php"); ?>

        <div class="row tm-row tm-mb-45">
            <div class="col-12">
                <hr class="tm-hr-primary tm-mb-55">
                <img src="img/ps5.jpeg" alt="Image" class="img-fluid">
            </div>
        </div>
        <div class="row tm-row tm-mb-40">
            <div class="col-12">
                <div class="mb-4">
                    <h2 class="pt-2 tm-mb-40 tm-color-primary tm-post-title"><?php echo $console["name"]; ?> Game
                        Console</h2>
                    <span class="d-block tm-color-primary"><?php echo $console["name"]; ?> Features</span>
                    <hr/>
                    <p>
                        <b>Release
                            Date:</b> <?php echo DateTime::createFromFormat("Y-m-d H:i:s",
                            $console["release_date"])->format('F j, Y'); ?> <br/>
                        <b>Manufacturer:</b> <?php echo $console["manufacturer"]; ?> <br/>
                        <b>CPU:</b> <?php echo $console["cpu"]; ?> GB<br/>
                        <b>GPU:</b> <?php echo $console["gpu"]; ?> GB<br/>
                        <b>RAM:</b> <?php echo $console["ram"]; ?> <br/>
                        <b>Disc:</b> <?php echo $console["disc"]; ?> <br/>
                        <b>Display:</b> <?php echo $console["display"]; ?> <br/>
                        <b>Sound:</b> <?php echo $console["sound"]; ?> <br/>
                        <b>Media:</b> <?php echo $console["media"]; ?> <br/>
                        <b>Connectivity:</b> <?php echo $console["connectivity"]; ?> <br/>
                        <b>Controller Input:</b> <?php echo $console["controller_input"]; ?> <br/>
                        <b>Dimensions:</b> <?php echo $console["dimensions"]; ?> <br/>
                        <b>Mass:</b> <?php echo $console["mass"]; ?> <br/>
                        <b>Price:</b> <?php echo $console["price"]; ?> £<br/>
                        <b>Website:</b> <a href="https://<?php echo $console['website']; ?>">PlayStation 5
                            Website</a><br/>
                        <b>Features:</b> <?php echo $console["features"]; ?> <br/>
                    </p>
                    <hr/>
                    <p>
                        The PlayStation brand has marked the last 25 years of gaming, and has radically changed from
                        time to time. All the hours spent playing the game, the joy experienced when winning, the
                        disappointment experienced when lost have a place that most players will never forget. The new
                        PlayStation 5, on which Sony has been working for many years, is no longer a secret with the
                        "Future of Gaming" event held on June 11.
                    </p>
                    <p>
                        In the final stage of Sony's Future of Gaming event on June 11, the long-awaited PlayStation 5
                        design also appeared. At the event, the design of two different versions of PlayStation 5 was
                        shown. One of these versions is the console with a disc drive and the other is the digital
                        version.
                    </p>
                    <p>
                        Sony continues the design line using dual colors, which it started with DualSense in this
                        generation, with PlayStation 5 itself. Regarding the design of the console, consumers are
                        divided into two. While one section likes the innovative look of the console, the other section
                        mocks the design of the console by comparing it to different items such as a modem.
                    </p>
                    <p>
                        Another striking point about the design of PlayStation 5 is that it is the first PlayStation to
                        be introduced vertically. Although Sony is developing a stand that allows you to use the console
                        horizontally or vertically, it was a surprise for users that the console was introduced in a
                        vertical use.
                    </p>

                    <ul>
                        <li><p>It will be compatible with older generation games,</p></li>
                        <li><p>It will take virtual reality one step further,</p></li>
                        <li><p>It will have ray tracing technology,</p></li>
                        <li><p>It will have a specially produced sound chip,</p></li>
                        <li><p>It will have an SSD that will measure the standby screens in milliseconds,</p></li>
                        <li><p>It will support 8K resolution.</p></li>
                    </ul>

                    <p>
                        The fact that PlayStation 5 is compatible with older generation games is a huge plus. In other
                        words, those who want to sell their Playstation 4 to buy Playstation 5 will not have to wait to
                        finish their old games. On the virtual reality side, compatibility with the already existing VR
                        set is maintained. However, it is also among the rumors that a product in the style of wireless
                        PSVR 2 will be released.
                    </p>

                    <p>
                        Mark Cerny, known as the architect of PS5, does not give a secret about VR strategies at this
                        stage. However, they do not neglect to emphasize that VR technology is very important to them.
                        Especially as a game that activates VR technology such as Half-Life: Alyx is out, Sony will also
                        make moves to make the most of the power of VR.
                    </p>

                    <p>
                        As a game console, it may not be surprising that it will offer ray tracing support. However, the
                        fact that ray tracing technology brings visual quality to a whole new level by naturalizing
                        details such as lighting and reflection in games will be of great importance in terms of the
                        experience that PlayStation 5 games will offer.
                    </p>

                    <p>
                        Another innovation on PlayStation 5 will be the improved sound chip to be used for those who
                        like to play games with headphones. However, one of the biggest innovations will be the SSD,
                        which managed to reduce the waiting time on the loading screen by exactly 18 times in the
                        Marvel's Spider-Man test.
                    </p>
                </div>
            </div>
        </div>
        <div class="row tm-row tm-mb-120">
            <div class="col-lg-4 tm-about-col">
                <div class="tm-bg-gray tm-about-pad">
                    <div class="text-center tm-mt-40 tm-mb-60">
                        <i class="fas fa-bezier-curve fa-4x tm-color-primary"></i>
                    </div>
                    <h2 class="mb-3 tm-color-primary tm-post-title">Efficiency</h2>
                    <p class="mb-0 tm-line-height-short">
                        When the Playstation 5 is in standby, it will consume an estimated <b>0.5 watts</b> less than a
                        Playstation 4 that is also in standby.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 tm-about-col">
                <div class="tm-bg-gray tm-about-pad">
                    <div class="text-center tm-mt-40 tm-mb-60">
                        <i class="fas fa-users-cog fa-4x tm-color-primary"></i>
                    </div>
                    <h2 class="mb-3 tm-color-primary tm-post-title">Camera</h2>
                    <p class="mb-0 tm-line-height-short">
                        In these times when game broadcasting is getting popular day by day, it is now as easy as
                        computers to broadcast on consoles. At this point, Sony offers a dual-lens camera that can
                        capture <b>1080p</b> images to make things a little easier.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 tm-about-col">
                <div class="tm-bg-gray tm-about-pad">
                    <div class="text-center tm-mt-40 tm-mb-60">
                        <i class="fab fa-creative-commons-sampling fa-4x tm-color-primary"></i>
                    </div>
                    <h2 class="mb-3 tm-color-primary tm-post-title">Headphone</h2>
                    <p class="mb-0 tm-line-height-short">
                        Along with the PlayStation 5, Sony announced a new wireless headset called Pulse 3D. The headset
                        will have dual microphones with noise canceling and will not lag behind industry standards.
                    </p>
                </div>
            </div>
        </div>
        <div class="row tm-row tm-mb-60">
            <div class="col-12">
                <hr class="tm-hr-primary  tm-mb-55">
            </div>
            <div class="col-lg-6 tm-mb-60 tm-person-col">
                <div class="media tm-person">
                    <img src="img/mark-cerny.jpg" alt="Image" class="img-fluid mr-4" style="width:140px;">
                    <div class="media-body">
                        <h2 class="tm-color-primary tm-post-title mb-2">Mark Cerny</h2>
                        <h3 class="tm-h3 mb-3">PlayStation 5's chief architect</h3>
                        <p class="mb-0 tm-line-height-short">
                            The lead architect of the PlayStation console line, Mark Cerny, implemented a two-year
                            feedback cycle after the launch of the PlayStation 4.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 tm-mb-60 tm-person-col">
                <div class="media tm-person">
                    <img src="img/jim-ryan.jpg" alt="Image" class="img-fluid mr-4" style="width:140px;">
                    <div class="media-body">
                        <h2 class="tm-color-primary tm-post-title mb-2">Jim Ryan</h2>
                        <h3 class="tm-h3 mb-3">CEO of Sony Interactive Entertainment</h3>
                        <p class="mb-0 tm-line-height-short">
                            Retro gaming disregarder. Child protector. World's first PlayStation 5 owner.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>