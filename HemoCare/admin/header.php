
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      background-color: #343a40 !important;
      padding: 10px 0;
      border-radius: 0;
      border: none;
    }
    .navbar-brand {
      font-size: 25px;
      font-weight: bold;
      color: #fca311 !important;
      padding: 15px;
    }
    .navbar-brand:hover {
      background-color: rgba(255,255,255,0.1);
      border-radius: 5px;
    }
    .navbar-nav > li > a {
      color: white !important;
      font-weight: bold;
      padding: 15px;
    }
    .navbar-nav > li > a:hover {
      background-color: rgba(255,255,255,0.1);
      border-radius: 5px;
    }
    .dropdown-menu {
      background-color: #343a40;
      border: none;
    }
    .dropdown-menu > li > a {
      color: white !important;
      padding: 10px 20px;
    }
    .dropdown-menu > li > a:hover {
      background-color: #495057;
      color: white !important;
    }
    .caret {
      margin-left: 5px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;
          <?php
          include 'conn.php';
          $username = $_SESSION['username'];
          $sql = "SELECT * FROM admin_info WHERE admin_username = '$username'";
          $result = mysqli_query($conn, $sql) or die("Query failed.");
          $row = mysqli_fetch_assoc($result);
          echo "Hello " . htmlspecialchars($row['admin_name']);
          ?>
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="background-color:Black;">
          <li><a href="change_password.php" style="color:#DC7633  ">Change Password</a></li>
          <li><a href="logout.php" style="color:#D35400 ;">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>