<?php

require_once 'classes/user.php';
require_once 'includes/mailer.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new User();
    $user->register($_POST['username'], $_POST['email'], $_POST['password']);
    header("Location: login.php");
}
include "includes/header.php";
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <h2 class="text-center">Sign Up</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
    </div>
</div>
<?php include "includes/footer.php"; ?>