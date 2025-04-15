<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="nicEdit.js"></script>
  <style>
    body {
      background: linear-gradient(to right, gray, white, gray);
    }
    #sidebar {
      position: relative;
      margin-top: -20px;
    }
    #content {
      position: relative;
      margin-left: 210px;
    }
    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
      #area1, #area4 {
        width: 70vw;
        min-height: 50vh;
        font-family: tahoma;
      }
      .nicEdit-panel > div > * {
        opacity: 1 !important;
      }
      .nicEdit-buttonContain {
        padding: .5em;
      }
      .nicEdit-selectContain {
        margin-top: 8px;
        padding: .5em;
      }
      .nicEdit-selectTxt {
        font-family: Tahoma !important;
        font-size: 12px !important;
      }
      .nicEdit-main {
        outline: 0;
      }
    }
    /* Added styles for form improvements */
    .form-group {
      margin-bottom: 15px;
    }
    .page-details-label {
      display: inline-block;
      padding: 6px 12px;
      border: 2px solid black;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .selected-page-value {
      display: inline-block;
      margin-left: 10px;
      font-weight: bold;
    }
    .panel-body {
      padding: 20px;
    }
    textarea {
      border: 2px solid black !important;
      padding: 10px;
      width: 100%;
      min-height: 300px;
    }
  </style>
</head>

<body style="color:black">
  <?php
  include 'conn.php';
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>

  <div id="header">
    <?php include 'header.php'; ?>
  </div>
  <div id="sidebar">
    <?php $active = ""; include 'sidebar.php'; ?>
  </div>
  <div id="content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 lg-12 sm-12">
            <h1 class="page-title" style="text-align:center">Update Page Details</h1>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-10">

              <div class="panel-heading">Page Details</div>
              <div class="panel-body">
                <form name="updata_page" method="post">
                  <div class="form-group">
                    <label class="control-label">Selected Page: </label>
                    <span class="selected-page-value">
                      <?php
                      include 'conn.php';
                      switch($_GET['type']) {
                        case "aboutus":
                          echo "About US";
                          break;
                        case "donor":
                          echo "Why Donate Blood";
                          break;
                        case "needforblood":
                          echo "The Need For Blood";
                          break;
                        case "bloodtips":
                          echo "Blood Tips";
                          break;
                        case "whoyouhelp":
                          echo "Why you could Help";
                          break;
                        case "bloodgroups":
                          echo "Blood Groups";
                          break;
                        case "universal":
                          echo "Universal Donors And Recepients";
                          break;
                      }
                      ?>
                    </span>
                  </div>

                  <div class="form-group">
                    <label class="page-details-label">Page Text:</label>
                    <div class="clearfix"></div>
                    <textarea cols="60" rows="10" id="area4" name="data">
                      <?php
                      if(isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $sql = "SELECT page_data FROM pages WHERE page_type = '{$type}'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                          $row = mysqli_fetch_assoc($result);
                          echo htmlspecialchars($row['page_data']);
                        }
                      }
                      ?>
                    </textarea>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary" name="submit" type="submit">Update</button>
                  </div>
                </form>

                <?php
                if(isset($_POST['submit'])) {
                  $type = $_GET['type'];
                  $data = $_POST['data'];
                  $conn = mysqli_connect("localhost","root","","HemoCare_database") or die("Connection error");
                  $sql = "UPDATE pages SET page_data='{$data}' WHERE page_type='{$type}'";
                  $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                  echo '<div class="alert alert-success"><b>Page Data Updated Successfully.</b></div>';
                }
                ?>
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