<?php
// Start output buffering to prevent "headers already sent" issues
ob_start();

require "../includes/header.php";
require "../config/config.php";

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect logged-in users to the homepage
if (isset($_SESSION["username"])) {
    header("location: " . APPURL . "");
    exit; // Always exit after header redirects
}

// Handle form submission
if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "<script>alert('Some inputs are empty');</script>";
    } else {
        // Sanitize user inputs
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $password = trim($_POST["password"]);

        // Check if the email exists in the database
        $login = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $login->execute([":email" => $email]);

        if ($login->rowCount() > 0) {
            $fetch = $login->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if (password_verify($password, $fetch["mypassword"])) {
                // Set session variables
                $_SESSION["username"] = $fetch["username"];
                $_SESSION["user_id"] = $fetch["id"];

                // Redirect to homepage
                header("location: " . APPURL . "");
                exit; // Always exit after header redirects
            } else {
                echo "<script>alert('Email or password is invalid');</script>";
            }
        } else {
            echo "<script>alert('Email or password is invalid');</script>";
        }
    }
}

ob_end_flush(); // Flush the output buffer
?>

<!-- HTML Content -->
<div class="reservation-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form id="reservation-form" method="POST" action="login.php">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Login</h4>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="password" class="form-label">Your Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button name="submit" type="submit" class="main-button">Login</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../includes/footer.php"; ?>
