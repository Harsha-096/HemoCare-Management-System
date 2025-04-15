🧱 1. Server Setup
  This system is built in PHP, so you need a local web server with PHP and MySQL support. That's where XAMPP or WAMP comes in.
  ✅ Step 1: Install XAMPP/WAMP
      •	XAMPP: https://www.apachefriends.org/download.html
      👉 Download and install either. XAMPP is more common and beginner-friendly.
  ✅ Step 2: Start Apache and MySQL
      •	Open XAMPP Control Panel.
      •	Click Start next to Apache and MySQL.
          You should see green highlights indicating both services are running.(if is there any error just Refer Youtube videos to Clear it)
________________________________________________________________________________________________________________________
💻 2. Project Download
  You need the actual HemoCare project files on your local server.
  Option 1: Manual Download
      •	Go to the GitHub repo: 
      •	Click Code > Download ZIP
      •	Extract it to: C:\xampp\htdocs\HemoCare
  Option 2: Git Clone (Command Line)
      If you have Git installed:
      cd C:\xampp\htdocs\
      git clone https://github.com/Harsha-096/
          ✅ This will download the project folder named HemoCare Management System into your local server directory.
________________________________________________________________________________________________________________________
🛢️ 3. Database Setup
  PHP applications need a MySQL database. You’ll import the project’s database.
  ✅ Step 1: Open phpMyAdmin
      •	Go to your browser and open:
      http://localhost/phpmyadmin
  ✅ Step 2: Import the SQL file
      •	Inside the newly created database, click on Import
      •	Click Choose File and select:
      "C:\xampp\htdocs\HemoCare\sql\HemoCare_database_file.sql"
      (This file is inside the downloaded project folder)
      •	Click Go
        ✅ This will create all tables and insert sample data.
________________________________________________________________________________________________________________________
🚀 4. Launch the Application
  Now you’re ready to run the system.
  ✅ User Interface (Donors/Users)
      Open your browser and go to:
      http://localhost/HemoCare/home.php
      📌 This is where donors can register, log in, and manage donations.
  ✅ Admin Interface
      Open this URL:
      http://localhost/HemoCare/admin/login.php
      📌 Admin can manage blood requests, donor details, and more.
________________________________________________________________________________________________________________________
🔐 5. Admin Login Credentials
  To log into the admin dashboard, use:
      •	Username: Hemoglobin 
      •	Password: 1234
      ✅ Once logged in, you'll be taken to the admin panel where you can manage the blood bank system.
