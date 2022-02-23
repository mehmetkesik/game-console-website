<?php
if (empty($_SESSION["user"])) {
    header("Location: /?page=login");
    exit(0);
}
$user = $_SESSION["user"];

if (!empty($_POST)) {
    //updating user - this page will be edited
    /*include("posts.php");

    if ($result && is_numeric($result)) {
        header("Location: /?page=profile");
    } else if ($result) {
        header("Location: /?page=signup&error=$result");
    } else {
        $error = "Something went wrong!";
        header("Location: /?page=signup&error=$error");
    }*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PlayStation 5 Game Console - Profile</title>
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
                    <form id="profileform" method="post" action="" class="mb-5 tm-comment-form"
                          enctype="multipart/form-data" onsubmit="profileControl(); return false;">
                        <h2 class="tm-color-primary tm-post-title mb-4">Profile information</h2>

                        <p style="font-size:15px;color:red;"><?php if (!empty($_GET["error"])) {
                                echo $_GET["error"];
                            } ?></p>

                        <figure class="tm-comment-figure">
                            <img src="img/comment-1.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                            <figcaption
                                    class="tm-color-primary text-left pl-3"><?php echo $user["name"]; ?></figcaption>
                        </figure>
                        <br/>

                        <div class="form-group row mb-4">
                            <label for="username" class="col-sm-3 col-form-label text-left tm-color-primary">Username
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="username" id="username" type="text"
                                       pattern=".{3,}" maxlength="50" placeholder="Username (min 3 chars)"
                                       value="<?php echo $user['username']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="email" class="col-sm-3 col-form-label text-left tm-color-primary">Email
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="email" id="email" type="email" maxlength="50"
                                       placeholder="Email" value="<?php echo $user['email']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-left tm-color-primary">Name
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="name" id="name" type="text" maxlength="50"
                                       pattern=".{3,}" placeholder="Name (min 3 chars)"
                                       value="<?php echo $user['name']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="birth_date" class="col-sm-3 col-form-label text-left tm-color-primary">Birth
                                Date
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="birth_date" id="birth_date" type="date"
                                       placeholder="Birth Date"
                                       value="<?php echo explode(' ', $user['birth_date'])[0]; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="picture" class="col-sm-3 col-form-label text-left tm-color-primary">Picture
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="picture" id="picture" type="file"
                                       accept="image/png, image/jpeg">
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Update</button>
                        </div>
                    </form>
                    <script type="text/javascript">
                        async function profileControl() {
                            let passwordWarning = document.getElementById("passwordwarning");
                            passwordWarning.style.display = "none";
                            let password = document.getElementById("password").value;
                            let passwordagain = document.getElementById("passwordagain").value;

                            if (password !== passwordagain) {
                                passwordWarning.style.display = 'list-item';
                                return false;
                            }

                            document.getElementById("password").value = await sha512(password);
                            document.getElementById("profileform").submit();

                            return true;
                        }

                        function sha512(str) {
                            return crypto.subtle.digest("SHA-512", new TextEncoder("utf-8").encode(str)).then(buf => {
                                return Array.prototype.map.call(new Uint8Array(buf),
                                    x => (('00' + x.toString(16)).slice(-2))).join('');
                            });
                        }
                    </script>

                    <!-- ----------------------------------------- -->

                    <form id="passwordform" method="post" action="" class="mb-5 tm-comment-form">
                        <h4 class="tm-color-primary tm-post-title mb-4" style="font-size:1.3rem;">Change Password</h4>
                        <div class="form-group row mb-4">
                            <div class="col-12">
                                <input class="form-control" name="password" id="password" type="password" maxlength="50"
                                       pattern=".{4,}" placeholder="New Password  (min 4 chars)" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-12">
                                <input class="form-control" name="passwordagain" id="passwordagain"
                                       type="password" maxlength="50" pattern=".{4,}" placeholder="New Password Again"
                                       required>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="tm-btn tm-btn-primary tm-btn-small" type="submit"
                                    style="padding: 5px 20px;font-size:1rem;">Change
                            </button>
                        </div>
                    </form>

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