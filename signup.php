<?php

require_once 'classes/user.php';
require_once 'includes/mailer.php';
require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
$user->register($username, $email, $password);

//Send welcome email to client

$mailer = new Mailer();
    $subject = "DIJI!";
    $body = "
        <h1>Welcome, $username!</h1>
        <p>Explore the hub for all your gaming needs.</p>
        <p>Grab your best gaming gear today!</p>
        <p><a href='index.php'>Visit our store</a></p> ";

        if ($mailer->sendEmail($email, $username, $subject, $body)) {
            echo "<p class='text-success'>Registration successful! A welcome email has been sent to $email.</p>";
        } else {
            echo "<p class='text-warning'>Registration successful! However, welcome email could not be sent.</p>";
        }
    
        header("Location: login.php");
        exit;
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