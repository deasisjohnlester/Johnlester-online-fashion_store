<?php
// owner credentials
include __DIR__ . '/config.php';
?>

<?php include __DIR__ . '/inc/header.php'; ?>

<?php

if (isset($_SESSION['login']) && ($_SESSION['login'] === true)) {
    header("Location: index.php");
    exit;
}

?>


<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userName = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['pwd']) ? $_POST['pwd'] : null;

    if (!empty($userName) && !empty($password)) {
        if (USERNAME === $userName && PASSWORD === $password) {
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php?status=Wrong username or password");
        }
    } else {
        header("Location: login.php?status=All field is required");
        exit;
    }
}

?>


<div class="container">
    <div class="alert">
        <h1 class="display-4 text-primary"><span class="text-secondary fw-bolder">OKSI FASHION</span> | Login <i class="fa-solid fa-user"></i></h1>
    </div>

    <?php if (isset($_GET['status'])) : ?>
        <div class="alert alert-danger"><?php echo $_GET['status']; ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" name="pwd" id="pwd" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>


<?php include __DIR__ . '/inc/footer.php'; ?>