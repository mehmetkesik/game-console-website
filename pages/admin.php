<?php
include("db.php");

if (!empty($_GET["id"])) {
    deleteUserById($_GET["id"]);

    header("Location: /?page=admin");
    exit(0);
}

$users = [];
if (!empty($_GET["search"])) {
    $users = getUsersBySearch($_GET["search"]);
} else {
    $users = getUsersBySearch("");
}

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

        <div class="row tm-row">
            <div class="col-12">
                <hr class="tm-hr-primary tm-mb-55">
                <form method="GET" class="form-inline tm-mb-80 tm-search-form" style="width:350px;">
                    <input name="page" value="admin" style="display: none;"/>
                    <input class="form-control tm-search-input" name="search" type="text"
                           placeholder="Search users by username" aria-label="Search">
                    <button class="tm-search-button" type="submit">
                        <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                    </button>
                </form>

                <?php foreach ($users as $user) { ?>
                    <hr class="tm-mb-55">
                    <div class="tm-comment tm-mb-45">
                        <figure class="tm-comment-figure">
                            <?php
                            $image = "img/user-icon.png";
                            $picsDir = "img/userpics/";
                            if (file_exists($picsDir . $user["username"] . ".png")) {
                                $image = $picsDir . $user["username"] . ".png";
                            } else if (file_exists($picsDir . $user["username"] . ".jpeg")) {
                                $image = $picsDir . $user["username"] . ".jpeg";
                            }
                            ?>
                            <img src="<?php echo $image; ?>" alt="Image"
                                 class="mb-2 rounded-circle img-thumbnail"
                                 style="width:100px;height:100px;">
                            <figcaption class="tm-color-primary text-center">
                                <?php echo $user["name"]; ?>
                            </figcaption>
                        </figure>
                        <div style="width:100%;">
                            <p style="word-wrap: break-word;">
                                Username: <b><?php echo $user["username"]; ?></b>
                            </p>
                            <p style="word-wrap: break-word;">
                                Email: <b><?php echo $user["email"]; ?></b>
                            </p>
                            <p style="word-wrap: break-word;">
                                Name: <b><?php echo $user["name"]; ?></b>
                            </p>
                            <p style="word-wrap: break-word;">
                                Name: <b><?php echo prettyDate($user["birth_date"]); ?></b>
                            </p>
                            <div class="d-flex justify-content-between">
                                <button style="color:#871C2B;border:1px #B9B6B6 solid;border-radius: 5px;padding:3px;"
                                        onclick="deleteUser(<?php echo $user["id"]; ?>)">
                                    Delete user and all comments.
                                </button>
                                <span class="tm-color-primary text-right">
                                            <?php echo prettyDate($user["time"]); ?>
                                        </span>
                                <script type="text/javascript">
                                    function deleteUser(id) {
                                        if (confirm('Are you sure you want to delete this user?')) {
                                            console.log("okay " + id);
                                            window.location.href = "/?page=admin&id=" + id;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

        <?php include("pages/inc/footer.php"); ?>

    </main>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</body>
</html>