<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Login - Blood Bank Management</title>

  <!-- Bootstrap CSS and JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    body {

      background: linear-gradient(to right, gray, white, gray);
      margin: 0;
      padding: 0;
      height: 100vh;
      background-size: cover;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container" style="margin-top: 150px;">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h1 class="text-center mt-4 mb-4 font-weight-bold">
            Blood Bank & Management Admin Login Portal
          </h1>

          <div class="card p-4">
            <div class="card-body">

              <div class="form-group">
                <label class="font-weight-bold">Username <span style="color:red">*</span></label>
                <input type="text" name="username" placeholder="Enter your username" class="form-control" required>
              </div>

              <div class="form-group">
                <label class="font-weight-bold">Password <span style="color:red">*</span></label>
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
              </div>

              <div class="text-center">
                <input type="submit" name="login" class="btn btn-primary btn-block" value="LOGIN">
              </div>

            </div>
          </div>

          <?php
          include 'conn.php';

          if (isset($_POST["login"])) {
              $username = mysqli_real_escape_string($conn, $_POST["username"]);
              $password = mysqli_real_escape_string($conn, $_POST["password"]);

              $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
              $result = mysqli_query($conn, $sql) or die("Query failed.");

              if (mysqli_num_rows($result) > 0) {
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION["username"] = $username;
                  header("Location: dashboard.php");
              } else {
                  echo '<div class="alert alert-danger mt-3 font-weight-bold text-center">Username and Password do not match!</div>';
              }
          }
          ?>
        </div>
      </div>
    </div>
  </form>

</body>
</html>
