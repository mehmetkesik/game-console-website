<?php

if (!empty($_SESSION["user"])) {
    header("Location: /?page=profile");
    exit(0);
}

if (!empty($_POST)) {
    include("posts.php");
    $user = login();
    if ($user) {
        $_SESSION["user"] = $user;
        header("Location: /?page=profile");
    } else {
        $error = "Username or password incorrect! $user";
        header("Location: /?page=login&error=$error");
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
                        <form id="loginform" method="post" action="" class="mb-5 tm-comment-form"
                              onsubmit="loginControl(); return false;">
                            <h2 class="tm-color-primary tm-post-title mb-4">Login information</h2>

                            <p style="font-size:15px;color:red;"><?php if (!empty($_GET["error"])) {
                                    echo $_GET["error"];
                                } ?></p>

                            <div class="mb-4">
                                <input class="form-control" name="username" type="text" maxlength="50"
                                       pattern=".{3,}" placeholder="Username or email" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" id="password" name="password" type="password"
                                       maxlength="50"
                                       pattern=".{4,}" placeholder="Password" required>
                            </div>
                            <div class="text-right">
                                <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Login</button>
                            </div>
                        </form>
                        <script type="text/javascript">
                            async function loginControl() {
                                document.getElementById("password").value =
                                    await sha512(document.getElementById("password").value);
                                document.getElementById("loginform").submit();
                            }

                            function sha512(str) {
                                return crypto.subtle.digest("SHA-512", new TextEncoder("utf-8").encode(str)).then(buf => {
                                    return Array.prototype.map.call(new Uint8Array(buf),
                                        x => (('00' + x.toString(16)).slice(-2))).join('');
                                });
                            }
                        </script>
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