<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if(isset($_SESSION["admin_name"])){
  header("location: ".ADMINURL."");
}

if (isset($_POST["submit"])) {

  if (empty($_POST["email"]) or empty($_POST["password"])) {
    echo "<script>alert('some inputs are empty');</script>";
  } else {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //checking the email with query

    $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {

      //checking password with query
      if (password_verify($password, $fetch["mypassword"])) {

        $_SESSION['admin_name'] = $fetch['admin_name'];
        $_SESSION['user_id'] = $fetch['id'];

        header("location: ".ADMINURL."");
        //echo "<script>alert('Login Successfully.');</script>";

      } else {
        echo "<script>alert('email or password are invalid');</script>";
      }
    } else {
      echo "<script>alert('email or password are invalid');</script>";
    }
  }
}
?>
  <div style="display: flex; align-items: center; height: 80vh; background: linear-gradient(135deg, #fffff 0%, #fffff 100%); margin: 0; position: relative;">
    <div style="width: 100%; max-width: 400px; background: #fff; border-radius: 15px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); padding: 30px; position: absolute; left:300px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <h2 style="color: #333; margin-bottom: 10px; font-family: 'Poppins', sans-serif;">G-Travel Admin Login</h2>
            <p style="color: #777; font-size: 14px; font-family: 'Poppins', sans-serif;">Access your account dashboard</p>
        </div>
        <form method="POST" action="login-admins.php">
            <!-- Email input -->
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-size: 14px; margin-bottom: 5px; color: #555; font-family: 'Poppins', sans-serif;">Email</label>
                <input type="email" name="email" id="email" style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif; box-sizing: border-box;" placeholder="Enter your email" required />
            </div>
            <!-- Password input -->
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; font-size: 14px; margin-bottom: 5px; color: #555; font-family: 'Poppins', sans-serif;">Password</label>
                <input type="password" name="password" id="password" style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif; box-sizing: border-box;" placeholder="Enter your password" required />
            </div>
            <!-- Submit button -->
            <div style="text-align: center;">
                <button type="submit" name="submit" style="width: 100%; background-color: #4facfe; color: white; border: none; padding: 12px; font-size: 16px; border-radius: 8px; cursor: pointer; font-family: 'Poppins', sans-serif; transition: background-color 0.3s ease;">
                    Login
                </button>
            </div>
            <!-- Forgot password link -->
            <div style="text-align: center; margin-top: 15px;">
                <a href="#" style="color: #4facfe; text-decoration: none; font-size: 14px; font-family: 'Poppins', sans-serif;">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>


<?php require "../layouts/footer.php"; ?>