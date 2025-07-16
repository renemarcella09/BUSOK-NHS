<?php
session_start();
include 'conn.inc';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BUSOK NATIONAL HIGH SCHOOL ATTENDANCE LOGGER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMt23cez/3paNdF+e4z5l5d1b6j7k5a5b6j7k5a" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  </head>

  <body class="hold-transition login-page" style="background-color: white;margin-top: 30px">
    <div class="login-logo">
    <img src="BUSOK.jpg" width="300">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $datetime = date('Y-m-d H:i:s');
    $location = $_POST['location'] ?? '';
    $status = "Present";

    $sql = "INSERT INTO bnhs (name, datetime, location, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $datetime, $location, $status);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error";
    }
    $stmt->close();
}

?>
<form method="POST" action="">
  <input type="text" name="name" placeholder="Name" required>
  <input type="text" name="location" placeholder="Location" required>
  <button type="submit">Submit</button>
</form>

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>