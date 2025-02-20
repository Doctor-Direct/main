<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="land_style.css">
    
</head>
<body>

    <nav class="navbar">
        <div class="logo">Doc Direct</div>
        <ul class="nav-links">
            <li><a href="land_index.php">Home</a></li>
            <li><a href="land_log_index.html">Login</a></li>
            <li><a href="#">Hospital</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>

    <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img1.jpg" style="width:100%">
      <div class="text">Caption Text</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img2.jpg" style="width:100%">
      <div class="text">Caption Two</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img3.jpg" style="width:100%">
      <div class="text">Caption Three</div>
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

    <section class="opp">
        <div class="opportunities-container">
            <h2>Welcome to Doc Direct</h2>
            <br>
            <p>
                Our online appointment system simplifies the process of booking medical consultations, 
                ensuring convenience for both patients and doctors. This platform enhances accessibility, 
                reduces wait times, and provides seamless scheduling, making healthcare more efficient.
            </p>
            <br>
            <h3>Opportunities of Doc Direct</h3><br>
            <ul class="opportunities-list">
                <li>📅 <strong>Easy Appointment Booking:</strong> Patients can schedule visits in just a few clicks.</li>
                <li>⏳ <strong>Reduced Waiting Times:</strong> Efficient scheduling ensures minimal delays.</li>
                <li>💬 <strong>Doctor-Patient Communication:</strong> Secure chat and video consultation options.</li>
                <li>📂 <strong>Digital Medical Records:</strong> Easy access to patient history and prescriptions.</li>
                <li>🌍 <strong>Wider Accessibility:</strong> Patients can connect with doctors from anywhere.</li>
                <li>🔔 <strong>Automated Reminders:</strong> Reduce missed appointments with timely notifications.</li>
            </ul>
        </div>
    </section>

    <section class="appo" id="appo">
    <div class="container">
        <form class="horizontal-form">
            <div class="form-group" id="doctor-name">
                <label for="doctor-name">Doctor name</label>
                <input type="text" id="doctor-name" placeholder="Search Doctor Name">
            </div>
            
            <div class="form-group">
                <label for="specialization">Specialization</label>
                <select id="specialization">
                    <option value="">Select Specialization</option>
                    <!-- Add more options here -->
                </select>
            </div>
            
            <div class="form-group">
                <label for="hospital">Hospital</label>
                <select id="hospital">
                    <option value="">Select Hospital</option>
                    <!-- Add more options here -->
                </select>
            </div>
            
            <div class="form-group" id="date">
                <label for="date">Date</label>
                <input type="text" id="date" placeholder="MM/DD/YYYY">
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </div>
    </section>

    <section class="home-content">
        <div class="section">
            <h2>Our Vision</h2>
            <p>To revolutionize healthcare accessibility by connecting patients with top doctors and hospitals through a seamless online platform.</p>
        </div>

        <div class="section">
            <h2>Our Mission</h2>
            <p>We aim to provide a user-friendly system that simplifies doctor appointments, enhances patient care, and ensures efficient communication between users and healthcare professionals.</p>
        </div>
    </section>

    <section class="part">
        <div class="section_part">
            <h2>Be a Part of Us</h2>
            <p>Join our platform to experience effortless appointment booking and top-quality healthcare services at your fingertips.</p>
            <button onclick="document.location = 'land_log_index.html'" class="btn" >Join Now</button>

        </div>
    </section>

    <script src="land_scripts.js"></script>
</body>
</html>
