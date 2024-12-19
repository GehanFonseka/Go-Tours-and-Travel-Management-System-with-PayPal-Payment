<?php
// Start output buffering to prevent "headers already sent" error
ob_start();

require "../includes/header.php";
require "../config/config.php";

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect if already logged in
if (isset($_SESSION["username"])) {
    header("location: " . APPURL . "");
    exit; // Always exit after a header redirect
}

// Handle form submission
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('Some inputs are empty');</script>";
    } else {
        $username = htmlspecialchars(trim($_POST['username']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        try {
            $insert = $conn->prepare("INSERT INTO users (username, email, mypassword) 
                VALUES (:username, :email, :mypassword)");
            $insert->execute([
                ":username" => $username,
                ":email" => $email,
                ":mypassword" => $password,
            ]);

            header("location: login.php");
            exit; // Always exit after a header redirect
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

ob_end_flush(); // Flush the output buffer
?>
<!-- HTML content starts after PHP -->
<div class="reservation-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form id="reservation-form" method="POST" action="register.php">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Register</h4>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">Username</label>
                                <input type="text" name="username" placeholder="Username" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="Email" class="form-label">Your Email</label>
                                <input type="email" name="email" placeholder="Email" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="Password" class="form-label">Your Password</label>
                                <input type="password" name="password" placeholder="Password" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" name="submit" class="main-button">Register</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../includes/footer.php"; ?>
