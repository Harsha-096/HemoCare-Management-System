<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(to right, gray, white, gray);
    }
    #sidebar {
      position: relative;
      margin-top: -20px
    }
    #content {
      position: relative;
      margin-left: 210px
    }
    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
    }
    .block-anchor {
      color: red;
      cursor: pointer;
    }

    /* Modern Card Styles */
    .dashboard-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      overflow: hidden;
      margin-bottom: 20px;
      height: 220px;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .card-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #fff;
    }
    .card-body {
      padding: 25px;
      text-align: center;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .card-value {
      font-size: 2.5rem;
      font-weight: 700;
      margin: 10px 0;
      color: #fff;
    }
    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #fff;
      margin-bottom: 15px;
    }
    .card-btn {
      background: rgba(255,255,255,0.2);
      border: 2px solid #fff;
      color: #fff;
      font-weight: 600;
      border-radius: 50px;
      padding: 8px 20px;
      transition: all 0.3s;
    }
    .card-btn:hover {
      background: #fff;
      color: #333;
      transform: translateY(-2px);
    }
    .card-1 {
      background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
    }
    .card-2 {
      background: linear-gradient(135deg, #48dbfb, #0abde3);
    }
    .card-3 {
      background: linear-gradient(135deg, #f368e0, #e056fd);
    }
    .centered-cards {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }
    .card-container {
      margin: 0 15px;
      width: 300px;
    }
  </style>
</head>

<body style="color:black;">
  <?php
  include 'conn.php';
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>

  <div id="header">
    <?php include 'header.php'; ?>
  </div>
  <div id="sidebar">
    <?php $active="dashboard"; include 'sidebar.php'; ?>
  </div>
  <div id="content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 lg-12 sm-12">
            <h1 class="page-title" style="text-align:center">Dashboard</h1>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="centered-cards">
              <div class="card-container">
                <div class="dashboard-card card-1">
                  <div class="card-body">
                    <div class="card-icon">
                      <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="card-value">
                      <?php
                        $sql = "SELECT * from donor_details";
                        $result = mysqli_query($conn,$sql) or die("query failed.");
                        $row = mysqli_num_rows($result);
                        echo $row;
                      ?>
                    </div>
                    <div class="card-title">Blood Donors Available</div>
                    <button class="btn card-btn" onclick="window.location.href = 'donor_list.php';">
                      View Details <i class="fas fa-arrow-right"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="card-container">
                <div class="dashboard-card card-2">
                  <div class="card-body">
                    <div class="card-icon">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-value">
                      <?php
                        $sql1 = "SELECT * from contact_query";
                        $result1 = mysqli_query($conn,$sql1) or die("query failed.");
                        $row1 = mysqli_num_rows($result1);
                        echo $row1;
                      ?>
                    </div>
                    <div class="card-title">All User Queries</div>
                    <button class="btn card-btn" onclick="window.location.href = 'query.php';">
                      View Details <i class="fas fa-arrow-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
  ?>
  <form method="post" name="" action="login.php" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-8 col-sm-offset-4" style="float:left">
        <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
      </div>
    </div>
  </form>
  <?php } ?>
</body>
</html>