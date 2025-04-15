<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HemoCare - Blood Donation Management System">
    <meta name="author" content="">
    <title>HemoCare - Blood Donation Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #fca311;
            --secondary-color: #fca311;
            --light-color: #f1faee;
            --dark-color: #1d3557;
            --accent-color: #a8dadc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f8e9c2, #ffffff, #ffffff, #f8e9c2);
            color: #333;
            line-height: 1.6;
          margin: 0;
          padding: 0;
          min-height: 100vh;
          position: relative;
          padding-bottom: 50px; /* Equal to footer height */
          box-sizing: border-box;
        }




            #footer {
      position: absolute;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 50px;
      background-color: #000000;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .footer-content {
      text-align: center;
      line-height: 1.4;
    }





        .hero-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('image/blood-donation-hero.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            background-color: var(--primary-color) !important;
            color: white !important;
            font-weight: 600;
        }

        .donor-card {
            border-left: 5px solid var(--primary-color);
        }

        .donor-card img {
            border-radius: 15px 15px 0 0;
            height: 250px;
            object-fit: cover;
        }

        .section-title {
            position: relative;
            margin-bottom: 2rem;
            color: var(--dark-color);
            font-weight: 700;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #c1121f;
            border-color: #c1121f;
            transform: translateY(-2px);
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
        }

        .feature-box {
            padding: 30px;
            text-align: center;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        hr.style-one {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), var(--primary-color), rgba(0, 0, 0, 0));
            margin: 2rem 0;
        }

        .info-card {
            border-left: 5px solid var(--secondary-color);
        }

        .stat-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            color: var(--secondary-color);
            font-weight: 600;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <?php
        $active = "home";
        include('head.php');
        ?>
    </header>

    <?php include 'ticker.php'; ?>

    <!-- Hero Section -->

<br>
        <h1 style="text-align:center;font-size:45px;">Welcome to HemoCare Management System</h1>
<br>

    <div id="page-container" style="position: relative; min-height: 100vh;">
        <div class="container">
            <div id="content-wrap" style="padding-bottom: 100px;">
                <!-- Image Carousel -->
                <div id="bloodCarousel" class="carousel slide mb-5" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#bloodCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#bloodCarousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner rounded-lg">
                        <div class="carousel-item active">
                            <img src="image/_107317099_blooddonor976.jpg" class="d-block w-100" alt="Blood Donation">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Every Drop Counts</h5>
                                <p>Your blood donation can make a difference in someone's life</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="full-width-image">
  <img src="image/Blood-facts_10-illustration-graphics__canteen.png" alt="Blood Facts">
</div>

                            <div class="carousel-caption d-none d-md-block">
                                <h5>Blood Facts</h5>
                                <p>Learn about the importance of different blood types</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#bloodCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#bloodCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- Recent Donors Section -->
                <section class="mb-5">
                    <h2 class="text-center section-title">Our Recent Blood Donors</h2>
                    <p class="text-center mb-4">These are recently donated blood to save lives</p>

                    <div class="row">
                        <?php
                        include 'conn.php';
                        $sql = "SELECT * FROM donor_details JOIN blood WHERE donor_details.donor_blood=blood.blood_id ORDER BY rand() LIMIT 6";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card donor-card h-100">
                                <img class="card-img-top" src="image/blood_drop_logo.jpeg" alt="Donor">
                                <div class="card-body">
                                    <h4 class="card-title text-primary"><?php echo $row['donor_name']; ?></h4>
                                    <div class="donor-info">
                                        <p><i class="fas fa-tint mr-2 text-danger"></i> <strong>Blood Group:</strong> <span class="badge badge-danger"><?php echo $row['blood_group']; ?></span></p>
                                        <p><i class="fas fa-phone-alt mr-2"></i> <strong>Mobile:</strong> <?php echo $row['donor_number']; ?></p>
                                        <p><i class="fas fa-venus-mars mr-2"></i> <strong>Gender:</strong> <?php echo $row['donor_gender']; ?></p>
                                        <p><i class="fas fa-birthday-cake mr-2"></i> <strong>Age:</strong> <?php echo $row['donor_age']; ?></p>
                                        <p><i class="fas fa-map-marker-alt mr-2"></i> <strong>Address:</strong> <?php echo $row['donor_address']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <small class="text-muted">Last donated: Recently</small>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </section>

                <hr class="style-one">

                <!-- Blood Groups Section -->
                <section class="mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4">
                            <div class="card info-card h-100">
                                <div class="card-body">
                                    <h2 class="text-center section-title">BLOOD GROUPS</h2>
                                    <?php
                                    include 'conn.php';
                                    $sql = "SELECT * FROM pages WHERE page_type='bloodgroups'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <img class="img-fluid rounded-lg shadow" src="image/blood_donationcover.jpeg" alt="Blood Donation">
                        </div>
                    </div>
                </section>

                <!-- Features Section -->
                <section class="mb-5">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card feature-box h-100">
                                <div class="card-header">
                                    <i class="fas fa-heartbeat feature-icon"></i>
                                    <h4>The need for blood</h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include 'conn.php';
                                    $sql = "SELECT * FROM pages WHERE page_type='needforblood'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card feature-box h-100">
                                <div class="card-header">
                                    <i class="fas fa-lightbulb feature-icon"></i>
                                    <h4>Blood Tips</h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include 'conn.php';
                                    $sql = "SELECT * FROM pages WHERE page_type='bloodtips'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card feature-box h-100">
                                <div class="card-header">
                                    <i class="fas fa-hands-helping feature-icon"></i>
                                    <h4>Who you could Help</h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include 'conn.php';
                                    $sql = "SELECT * FROM pages WHERE page_type='whoyouhelp'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="style-one">

                <!-- Universal Donors Section -->
                <section class="mb-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h2 class="text-center section-title">UNIVERSAL DONORS AND RECIPIENTS</h2>
                                    <?php
                                    include 'conn.php';
                                    $sql = "SELECT * FROM pages WHERE page_type='universal'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <i class="fas fa-hand-holding-heart text-danger mb-3" style="font-size: 3rem;"></i>
                                    <h3>Ready to Save Lives?</h3>
                                    <p class="mb-4">Join our community of blood donors today</p>
                                    <a href="donate_blood.php" class="btn btn-primary btn-lg">
                                        <i class="fas fa-user-plus mr-2"></i>Register Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

      <div id="footer">
    <div class="footer-content">
      Blood Bank & Donation Management<br>
      ALL RIGHTS RESERVED.
    </div>
  </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Initialize carousel
        $(document).ready(function(){
            $('.carousel').carousel({
                interval: 5000
            });

            // Smooth scrolling for all links
            $("a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>
</body>
</html>