<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    }
    #he {
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align: center;
    }
    .table-responsive {
      margin: 20px 0;
    }
    .pagination {
      display: inline-block;
      padding-left: 0;
      margin: 20px 0;
      border-radius: 4px;
    }
    .pagination > li {
      display: inline;
    }
    .pagination > li > a {
      position: relative;
      float: left;
      padding: 6px 12px;
      margin-left: -1px;
      line-height: 1.42857143;
      color: #337ab7;
      text-decoration: none;
      background-color: #fff;
      border: 1px solid #ddd;
    }
    .pagination > li.active > a {
      z-index: 2;
      color: #fff;
      cursor: default;
      background-color: #337ab7;
      border-color: #337ab7;
    }
    .query-actions {
      margin-bottom: 20px;
      text-align: center;
    }
    .btn-pending {
      background-color: #f0ad4e;
      border-color: #eea236;
      color: white;
    }
    .btn-pending:hover {
      background-color: #ec971f;
      border-color: #d58512;
      color: white;
    }
  </style>
</head>
<?php
include 'conn.php';
include 'session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<body style="color:black">
<div id="header">
<?php include 'header.php'; ?>
</div>
<div id="sidebar">
<?php $active="query"; include 'sidebar.php'; ?>
</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">
          <h1 class="page-title" style="text-align:center">User Query</h1>
        </div>
      </div>
      <hr>

      <?php
      // Handle status update if ID is provided
      if(isset($_GET['id'])) {
        $que_id = $_GET['id'];
        $sql1 = "UPDATE contact_query SET query_status='1' WHERE query_id={$que_id}";
        if(mysqli_query($conn, $sql1)) {
          echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <b>Query marked as read successfully.</b>
                </div>';
          // Redirect to avoid resubmission on refresh
          echo '<script>window.location.href = "query.php";</script>';
          exit();
        } else {
          echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <b>Error updating query status: '.mysqli_error($conn).'</b>
                </div>';
        }
      }

      $limit = 10;
      if(isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 1;
      }
      $offset = ($page - 1) * $limit;
      $count = $offset + 1;

      $sql = "SELECT * FROM contact_query ORDER BY query_date DESC LIMIT {$offset},{$limit}";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0) {
      ?>

      <div class="table-responsive">
        <table class="table table-bordered table-hover" style="text-align:center">
          <thead>
            <tr>
              <th style="text-align: center;">S.no</th>
              <th style="text-align: center;">Name</th>
              <th style="text-align: center;">Email Id</th>
              <th style="text-align: center;">Mobile Number</th>
              <th style="text-align: center;">Message</th>
              <th style="text-align: center;">Posting Date</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td><?php echo htmlspecialchars($row['query_name']); ?></td>
              <td><?php echo htmlspecialchars($row['query_mail']); ?></td>
              <td><?php echo htmlspecialchars($row['query_number']); ?></td>
              <td><?php echo htmlspecialchars($row['query_message']); ?></td>
              <td><?php echo $row['query_date']; ?></td>
              <td>
                <?php if($row['query_status'] == 1) { ?>
                  <span class="label label-success">Read</span>
                <?php } else { ?>
                  <a href="query.php?id=<?php echo $row['query_id']; ?>" onclick="return confirm('Mark this query as read?')">
                    <span class="label label-warning">Pending</span>
                  </a>
                <?php } ?>
              </td>
              <td id="he" style="width:100px">
                <a class="btn btn-danger btn-xs" href="delete_query.php?id=<?php echo $row['query_id']; ?>" onclick="return confirm('Are you sure you want to delete this query?')">
                  Delete
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="text-center">
        <?php
        $sql1 = "SELECT COUNT(*) AS total FROM contact_query";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $total_records = $row1['total'];
        $total_page = ceil($total_records / $limit);

        echo '<ul class="pagination">';
        if($page > 1) {
          echo '<li><a href="query.php?page='.($page - 1).'">Prev</a></li>';
        }
        for($i = 1; $i <= $total_page; $i++) {
          $active = ($i == $page) ? 'active' : '';
          echo '<li class="'.$active.'"><a href="query.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page) {
          echo '<li><a href="query.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
        ?>
      </div>
      <?php } else { ?>
        <div class="alert alert-info">No queries found.</div>
      <?php } ?>
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