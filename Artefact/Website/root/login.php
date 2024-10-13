<?php
$msg = "";
// Validating if user is already logged or not, If yes, then redirect to device.php
session_start();
if (isset($_SESSION['logged_in'])) {
    header("Location: device.php");
    die();
}

// Login code
if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if ($name == "admin" && $password == "admin123") {
        // Setting session variable to logged in
        $_SESSION['logged_in'] = true;
        header("refresh:0.1 url=device.php");
    } else {
        $msg = "<p style='color:red;'>Invalid username or password</p>";
    }
}
?>
<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="./images/images.png">
<head>
    <?php
    // Including head.php
    include './include/head.php';
    ?>
</head>


<body>
    <div class="banner">
        <?php
        // Including navigation.php
        include './include/navigation.php';
        ?>
        <div class="login-form">
          <h1>Login</h1>
          <form method="post" action="">
              <p>Username</p>
              <input type="text" name="name" placeholder="Username" required> <br>
              <p>Password</p>
              <input type="password" name="password" placeholder="Password" required>
              <button type="submit" value="Login">Login</button>
              <?= $msg ?>
        </form>
      </div>
    </div>
</body>

</html>
