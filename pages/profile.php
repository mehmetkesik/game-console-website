<?php
if (empty($_SESSION["user"])) {
    header("Location: /?page=login");
    exit(0);
}
$user = $_SESSION["user"];

$userpics = "img/userpics/";
$picture = "img/user-icon.png";
if (file_exists($userpics . $user["username"] . ".png")) {
    $picture = $userpics . $user["username"] . ".png";
} else if (file_exists($userpics . $user["username"] . ".jpeg")) {
    $picture = $userpics . $user["username"] . ".jpeg";
}

if (!empty($_POST)) {
    include("db.php");
    switch ($_GET["update"]) {
        case "profile":
            $updatedUser = null;
            $updatedUser["id"] = $user["id"];
            if (empty($_POST["email"])) {
                break;
            }
            $emailUser = getUserByEmail($_POST["email"]);
            if ($emailUser && $emailUser["id"] != $user["id"]) {
                $notUniqueEmail = "The email address already taken!";
                header("Location: /?page=profile&error=$notUniqueEmail");
                exit(0);
            }
            $updatedUser["email"] = $_POST["email"];
            $updatedUser["name"] = empty($_POST["name"]) ? null : $_POST["name"];
            $updatedUser["birth_date"] = empty($_POST["birth_date"]) ? null : $_POST["birth_date"];
            if (updateUser($updatedUser)) {
                $_SESSION["user"] = getUserById($user["id"]);
            }
            break;
        case "picture":
            $picture = null;
            if (!empty($_FILES["picture"])) {
                if ($_FILES["picture"]["type"] == "image/png") {
                    $picture = $user["username"] . ".png";
                } else if ($_FILES["picture"]["type"] == "image/jpeg") {
                    $picture = $user["username"] . ".jpeg";
                }

                if ($picture != null) {
                    @unlink($userpics . $user["username"] . ".png");
                    @unlink($userpics . $user["username"] . ".jpeg");
                    move_uploaded_file($_FILES['picture']['tmp_name'], $userpics . $picture);
                }
            } else {
                @unlink($userpics . $user["username"] . ".png");
                @unlink($userpics . $user["username"] . ".jpeg");
            }
            break;
        case "password":
            if (!empty($_POST["password"])) {
                $password = hash("sha512", $_POST["password"]);
                if (updateUserPassword($password, $user["id"])) {
                    header("Location: /?page=profile&psuccess=true");
                    exit(0);
                } else {
                    $perror = "Something went wrong!";
                    header("Location: /?page=profile&perror=$perror");
                    exit(0);
                }
            }
            break;
    }

    header("Location: /?page=profile");
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

                    <h2 class="tm-color-primary tm-post-title mb-4">Profile information</h2>

                    <form id="pictureform" method="post" action="/?page=profile&update=picture"
                          enctype="multipart/form-data">
                        <label for="picture">
                            <figure class="tm-comment-figure" style="cursor: pointer;">
                                <img src="<?php echo $picture; ?>" alt="Image" class="mb-2 rounded-circle img-thumbnail"
                                     width="100" height="100" style="width:100px;height:100px;">
                                <figcaption
                                        class="tm-color-primary text-left pl-3"><?php echo $user["name"]; ?></figcaption>
                            </figure>
                        </label>
                        <input class="form-control" name="picture" id="picture" type="file"
                               accept="image/png, image/jpeg" style="display:none;"/>
                        <input class="form-control" name="update" value="picture" style="display:none;"/>
                    </form>
                    <script type="text/javascript">
                        document.getElementById("picture").onchange = function () {
                            document.getElementById("pictureform").submit();
                        };
                    </script>
                    <br/>

                    <form id="profileform" method="post" action="/?page=profile&update=profile"
                          class="mb-5 tm-comment-form">

                        <p style="font-size:15px;color:red;"><?php if (!empty($_GET["error"])) {
                                echo $_GET["error"];
                            } ?></p>

                        <div class="form-group row mb-4">
                            <label for="username" class="col-sm-3 col-form-label text-left tm-color-primary">Username
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="username" id="username" type="text"
                                       pattern=".{3,}" maxlength="50" placeholder="Username (min 3 chars)"
                                       value="<?php echo $user['username']; ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="email" class="col-sm-3 col-form-label text-left tm-color-primary">Email
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="email" id="email" type="email" maxlength="50"
                                       placeholder="Email" required>
                            </div>
                            <script type="text/javascript">
                                document.getElementById("email").value = "<?php echo $user['email']; ?>";
                            </script>
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

                        <div class="text-right">
                            <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Update</button>
                        </div>
                    </form>

                    <!-- ----------------------------------------- -->

                    <form id="passwordform" method="post" action="/?page=profile&update=password"
                          class="mb-5 tm-comment-form" onsubmit="changePasswordControl(); return false;">
                        <h4 class="tm-color-primary tm-post-title mb-4" style="font-size:1.3rem;">Change Password</h4>

                        <p style="font-size:15px;color:#07722c;"><?php if (!empty($_GET["psuccess"])) {
                                echo "Password changed successfully.";
                            } ?></p>

                        <p id="passwordwarning" style="font-size:15px;color:red;"><?php if (!empty($_GET["perror"])) {
                                echo $_GET["perror"];
                            } ?></p>

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
                    <script type="text/javascript">
                        async function changePasswordControl() {
                            let passwordWarning = document.getElementById("passwordwarning");
                            passwordWarning.style.display = "none";
                            let password = document.getElementById("password").value;
                            let passwordagain = document.getElementById("passwordagain").value;

                            if (password !== passwordagain) {
                                passwordWarning.style.display = 'list-item';
                                passwordWarning.innerText = "Passwords doesn't match!";
                                return false;
                            }

                            document.getElementById("password").value = await sha512(password);
                            document.getElementById("passwordform").submit();

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

            <?php include("pages/inc/sidebar.php"); ?>

        </div>

        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>