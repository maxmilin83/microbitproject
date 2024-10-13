<?php
// Checking if user is logged in or not, if not redirect to login.php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    die();
} else{
    echo "You are already logged in";
}
?>
<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/images/images.png">
  <head>
      <?php
      // Including head.php
      include './include/head.php';
      ?>
  </head>
<body>
  <div class="buttonsdiv">
      <h3 style="color:white;">Door alarm:</h3>
      <button onclick="on()" class="button10">On</button>
      <button onclick="off()" class="button11">Off</button>
  </div>
    <div class="banner">
        <?php
        // Including navigation.php
        include './include/navigation.php';
        ?>
        <table class="tabletwo">
            <thead>
                <th>Status</th>
                <th>TimeStamp</th>
            </thead>
            <tbody id="tbody1">
            </tbody>
        </table>
    </div>
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase.js"></script>
    <script src="device.js"></script>
</body>

</html>
