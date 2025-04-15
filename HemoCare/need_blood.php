<?php
// Start session for CSRF protection
session_start();

// Database connection
include 'conn.php';

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Set active page for navigation
$active = 'need';
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Search for blood donors">
  <meta name="author" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, gray, white, gray);
    }

    #page-container {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    #content-wrap {
      flex: 1;
    }

    .form-container {
      max-width: 500px;
      margin: 0 auto;
    }

    .card {
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <div id="page-container">
    <div id="content-wrap">
      <br><br><br>
      <h1 style="text-align:center">Need Blood</h1>
      <hr><br>

      <div class="container">
        <form name="needblood" action="" method="post">
          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

          <div class="form-container">
            <!-- Blood Group Field -->
            <div class="form-group">
              <label class="font-italic">Blood Group <span style="color:red">*</span></label>
              <select name="blood" class="form-control" required>
                <option value="" selected disabled>Select</option>
                <?php
                  $sql = "SELECT * FROM blood";
                  $result = mysqli_query($conn, $sql);

                  if (!$result) {
                    die("Error retrieving blood groups: " . mysqli_error($conn));
                  }

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['blood_id']) . "'>" .
                         htmlspecialchars($row['blood_group']) . "</option>";
                  }
                ?>
              </select>
            </div>

            <!-- Reason Field -->
            <div class="form-group">
              <label class="font-italic">Reason, why do you need blood? <span style="color:red">*</span></label>
              <textarea class="form-control" name="reason" rows="3" required></textarea>
            </div>

            <!-- Search Button -->
            <div class="form-group text-center">
              <input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer">
            </div>
          </div>
        </form>

        <!-- Donor Cards -->
        <div class="row justify-content-center">
          <?php
            if (isset($_POST['search'])) {
              // Verify CSRF token
              if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                die("<div class='col-12 alert alert-danger text-center'>Security token mismatch</div>");
              }

              // Validate and sanitize input
              $bg = (int)$_POST['blood']; // Cast to integer for safety
              $reason = trim($_POST['reason']);

              // Use prepared statement
              $stmt = mysqli_prepare($conn, "SELECT * FROM donor_details
                                            JOIN blood ON donor_details.donor_blood = blood.blood_id
                                            WHERE donor_blood = ?
                                            ORDER BY RAND() LIMIT 5");
              mysqli_stmt_bind_param($stmt, "i", $bg);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              if (!$result) {
                die("<div class='col-12 alert alert-danger text-center'>Error searching donors: " . htmlspecialchars(mysqli_error($conn)) . "</div>");
              }

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" src="image/blood_drop_logo.jpeg" alt="Blood donor profile">
              <div class="card-body">
                <h4 class="card-title"><?php echo htmlspecialchars($row['donor_name']); ?></h4>
                <p class="card-text">
                  <b>Blood Group:</b> <b><?php echo htmlspecialchars($row['blood_group']); ?></b><br>
                  <b>Mobile No.:</b> <?php echo htmlspecialchars($row['donor_number']); ?><br>
                  <b>Gender:</b> <?php echo htmlspecialchars($row['donor_gender']); ?><br>
                  <b>Age:</b> <?php echo htmlspecialchars($row['donor_age']); ?><br>
                  <b>Address:</b> <?php echo htmlspecialchars($row['donor_address']); ?><br>
                </p>
              </div>
            </div>
          </div>
          <?php
                }
              } else {
                echo '<div class="col-12 alert alert-info text-center">No donors found for the selected blood group</div>';
              }

              // Close statement
              mysqli_stmt_close($stmt);
            }

            // Close connection
            mysqli_close($conn);
          ?>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
  </div>
</body>
</html>