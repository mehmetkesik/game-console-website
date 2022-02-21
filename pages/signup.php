<?php
if (!empty($_POST)) {
    include("posts.php");
    $id = signup();
    if ($id) {
        header("Location: /?page=profile");
    } else {
        header("Location: /?page=signup");
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
                        <form method="post" action="" class="mb-5 tm-comment-form" enctype="multipart/form-data"
                              onsubmit="return signupControl();">
                            <h2 class="tm-color-primary tm-post-title mb-4">Signup information</h2>
                            <div class="mb-4">
                                <input class="form-control" name="username" id="username" type="text" maxlength="50"
                                       placeholder="Username" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="email" id="email" type="text" maxlength="50"
                                       placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="name" id="name" type="text" maxlength="50"
                                       placeholder="Name" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="password" id="password" type="text" maxlength="50"
                                       placeholder="Password" required>
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="passwordagain" id="passwordagain" type="text"
                                       maxlength="50"
                                       placeholder="Password again" required>
                            </div>
                            <div class="mb-4">
                                <span style="font-size:16px;">Birth Date:</span>
                                <input class="form-control" name="birth_date" id="birth_date" type="date"
                                       placeholder="Birth Date">
                            </div>
                            <div class="mb-4">
                                <span style="font-size:16px;">Picture:</span>
                                <input class="form-control" name="picture" id="picture" type="file">
                            </div>
                            <div class="mb-4">
                                <input class="form-control" name="title" id="title" type="text" maxlength="250"
                                       placeholder="Title">
                            </div>
                            <div class="text-right">
                                <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Signup</button>
                            </div>
                        </form>
                        <script type="text/javascript">
                            function signupControl() {
                                let username = document.getElementById("username");
                                let email = document.getElementById("email");
                                let password = document.getElementById("password");
                                let passwordagain = document.getElementById("passwordagain");
                                return false;
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