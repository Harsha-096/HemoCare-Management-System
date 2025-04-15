<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body{
    background: linear-gradient(to right, gray, white, gray);
}

.submit-btn {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
</style>
</head>


<body>
<?php
$active ='donate';
 include('head.php') ?>

 <?php
if(isset($_GET['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
            <strong>Success!</strong> Thank you for registering as a donor!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}
?>

<br><br>
<h1 class="mt-4 mb-3" style="text-align:center">Donate Blood </h1><hr><br>
<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">

      <form name="donor" action="savedata.php" method="post" onsubmit="return showPopup()">
        <!-- First Row: Name and Age -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="font-italic">Full Name<span style="color:red">*</span></div>
            <div><input type="text" name="fullname" class="form-control" required></div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="font-italic">Age<span style="color:red">*</span></div>
            <div><input type="text" name="age" class="form-control" required></div>
          </div>
        </div>

        <!-- Second Row: Mobile and Email -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
            <div><input type="text" name="mobileno" class="form-control" required></div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="font-italic">Email Id</div>
            <div><input type="email" name="emailid" class="form-control"></div>
          </div>
        </div>

        <!-- Third Row: Gender and Blood Group -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="font-italic">Gender<span style="color:red">*</span></div>
            <div><select name="gender" class="form-control" required>
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select></div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="font-italic">Blood Group<span style="color:red">*</span></div>
            <div><select name="blood" class="form-control" required>
              <option value=""selected disabled>Select</option>
              <?php
                include 'conn.php';
                $sql= "select * from blood";
                $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
              while($row=mysqli_fetch_assoc($result)){
               ?>
               <option value=" <?php echo $row['blood_id'] ?>"> <?php echo $row['blood_group'] ?> </option>
              <?php } ?>
            </select></div>
          </div>
        </div>

        <!-- Fourth Row: Address (full width) -->
        <div class="row">
          <div class="col-12 mb-4">
            <div class="font-italic">Address<span style="color:red">*</span></div>
            <div><textarea class="form-control" name="address" required rows="3"></textarea></div>
          </div>
        </div>

        <!-- Submit Button (centered) -->
        <div class="row">
          <div class="col-12 submit-btn">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer; padding: 8px 30px;">
          </div>
        </div>
      </form>

  </div>
</div>
<?php include('footer.php') ?>
</div>

<script>
function showPopup() {
    alert("Data added Successfully.");
    return true; // Allow form submission to proceed
}
</script>
</body>
</html>