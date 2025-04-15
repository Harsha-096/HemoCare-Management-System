<!DOCTYPE html>
<html>
<head>
  <style>
    /* Add this to your existing styles */
    html, body {
        height: 100%;
    }

    #page-container {
        min-height: 100vh;
        position: relative;
        padding-bottom: 60px; /* Adjust this value based on your footer height */
    }

    /* Modify your existing footer style */
    #footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
        background-color: #000000;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        line-height: 1.4;
    }
  </style>
</head>
<body>
  <!-- Your page content goes here -->

  <div id="footer">
    <div class="footer-content">
      Blood Bank & Donation Management<br>
      ALL RIGHTS RESERVED.
    </div>
  </div>
</body>
</html>

