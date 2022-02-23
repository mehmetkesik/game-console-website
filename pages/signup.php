<?php
if (!empty($_SESSION["user"])) {
    header("Location: /?page=profile");
    exit(0);
}

if (!empty($_POST)) {
    include("posts.php");
    $result = signup();
    if ($result && is_numeric($result)) {
        $_SESSION["user"] = getUserById($result);
        header("Location: /?page=profile");
    } else if ($result) {
        header("Location: /?page=signup&error=$result");
    } else {
        $error = "Something went wrong!";
        header("Location: /?page=signup&error=$error");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayStation 5 Game Console - Signup</title>
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
                        <form id="signupform" method="post" action="" class="mb-5 tm-comment-form"
                              enctype="multipart/form-data" onsubmit="signupControl(); return false;">
                            <h2 class="tm-color-primary tm-post-title mb-4">Signup information</h2>

                            <p style="font-size:15px;color:red;"><?php if (!empty($_GET["error"])) {
                                    echo $_GET["error"];
                                } ?></p>

                            <div class="mb-4">
                                <input class="form-control" name="username" id="username" type="text"
                                       pattern=".{3,}" maxlength="50" placeholder="Username (min 3 chars)" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="email" id="email" type="email" maxlength="50"
                                       placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="name" id="name" type="text" maxlength="50"
                                       pattern=".{3,}" placeholder="Name (min 3 chars)" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="password" id="password" type="password" maxlength="50"
                                       pattern=".{4,}" placeholder="Password  (min 4 chars)" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="passwordagain" id="passwordagain" type="password"
                                       maxlength="50" pattern=".{4,}" placeholder="Password again" required>
                            </div>
                            <span id="passwordwarning"
                                  style="font-size:16px;color:#a71d2a;display:none;padding:0;margin-left: 15px;">
                                ** Passwords don't match. **
                            </span>
                            <div class="mb-4">
                                <span style="font-size:16px;">Birth Date:</span>
                                <input class="form-control" name="birth_date" id="birth_date" type="date"
                                       placeholder="Birth Date">
                            </div>
                            <div class="mb-4">
                                <span style="font-size:16px;">Picture:</span>
                                <input class="form-control" name="picture" id="picture" type="file"
                                       accept="image/png, image/jpeg">
                            </div>
                            <div class="text-right">
                                <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Signup</button>
                            </div>
                        </form>
                        <script type="text/javascript">
                            async function signupControl() {
                                let passwordWarning = document.getElementById("passwordwarning");
                                passwordWarning.style.display = "none";
                                let password = document.getElementById("password").value;
                                let passwordagain = document.getElementById("passwordagain").value;

                                if (password !== passwordagain) {
                                    passwordWarning.style.display = 'list-item';
                                    return false;
                                }

                                document.getElementById("password").value = await sha512(password);
                                document.getElementById("signupform").submit();

                                return true;
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