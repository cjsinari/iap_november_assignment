<?php
require_once "classes/user.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    if ($user->login($_POST['email'], $_POST['password'])) {
        header("Location: index.php");
    } else {
        $error = "Invalid credentials!";
    }
}
include "includes/header.php";
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-secondary btn-block">Login</button>
        </form>
    </div>
</div>
<?php include "includes/footer.php"; ?>