<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Management System - Contact</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    .navbar {
      background-color: #007bff;
    }

    .navbar-brand, .navbar-nav .nav-link {
      color: white;
    }

    .navbar-nav .nav-item:hover .dropdown-menu {
      display: block;
    }

    body {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 100px;
      margin-bottom: 100px;
    }

    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: none;
    }

    .card-header {
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .map-container {
      margin-top: 20px;
    }

    .hospital-card {
      background-color: white;
      margin-bottom: 20px;
    }

    .hospital-card img {
      height: 150px;
      object-fit: cover;
    }

    .hospital-card h5 {
      color: #007bff;
    }

    .hospital-details {
      padding: 10px;
    }

    /* Added styles for the new card */
    .online-appointment-card {
      max-width: 100%;
      margin: 2rem 0;
    }

    .online-appointment-card img {
      height: 100%;
      object-fit: cover;
    }

    /* Custom styles for the branch grid */
    .branch-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .branch-card {
      flex-basis: calc(20% - 10px);
      margin-bottom: 20px;
      height: 20rem;
    }
    #branches{
        margin-top: 80px;
    }
    h5{
        color: #007bff;
    }
    @media (max-width: 576px) {
            .container {
                margin-top: 50px;
                margin-bottom: 50px;
            }

            .branch-card {
                flex-basis: 100%;
                margin: 2rem;
            }

            .map-container iframe {
                width: 100%;
                height: 300px;
            }
        }
        @media (max-width: 768px) {
            .branch-card {
                flex-basis: calc(50% - 10px);
                margin: 2rem 0 2rem 0;
            }
        }

        @media (max-width: 576px) {
            .branch-card {
                flex-basis: 100%;
            }
        }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Your Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="landing.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="diagnosis.php">Diagnosis</a>
          <a class="dropdown-item" href="appointments.php">Book an appointment</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
<div class="card mb-3 online-appointment-card">
    <div class="row g-0">
    <div class="col-md-4">
        <img src="images/contactlogo.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Connect with us and clear your queries!</h5>
          <p class="card-text">"Connect with us effortlessly! Whether you have questions, feedback, or need assistance, our team is here to help. Reach out securely through our contact form or email us directly. Your concerns matter, and we're dedicated to ensuring a prompt and helpful response. Your well-being is our priority."</p>
          <p class="card-text"><small class="text-body-secondary">Seamless health, one click away</small></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h4>Contact Us</h4>
        </div>
        <div class="card-body">
          <form id="contactForm">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-envelope"></i> Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <!-- Google Maps iframe on the right side -->
      <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61206.80679198653!2d80.55906782167969!3d16.5046066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35f00711211abd%3A0x3f917e6872977b65!2sAmerican%20Hospital!5e0!3m2!1sen!2sin!4v1704478390975!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <!-- Branch Details Section -->
  <div class="row branch-grid" id="branches">
    <!-- Branch 1 -->
    <div class="col-md-4 branch-card">
      <div class="card hospital-card">
        <img src="images/Bangalore.jpg" class="card-img-top" alt="Hospital Image">
        <div class="hospital-details">
          <h6><b>Bangalore Hospital</b></h6>
          <p>Address: 123 Main Street, Cityville</p>
          <p>Emergency Number: 123-456-7890</p>
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent1" aria-expanded="false" aria-controls="learnMoreContent1">
            Learn More <i class="fas fa-info-circle"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Branch 2 -->
    <div class="col-md-4 branch-card">
      <div class="card hospital-card">
        <img src="images/Hyderabad.jpg" class="card-img-top" alt="Hospital Image">
        <div class="hospital-details">
          <h6><b>Hyderabad Hospital</b></h6>
          <p>Address: 456 Oak Avenue, Townsville</p>
          <p>Emergency Number: 987-654-3210</p>
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent2" aria-expanded="false" aria-controls="learnMoreContent2">
            Learn More <i class="fas fa-info-circle"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Branch 3 -->
    <div class="col-md-4 branch-card">
      <div class="card hospital-card">
        <img src="images/Chennai.jpg" class="card-img-top" alt="Hospital Image">
        <div class="hospital-details">
          <h6><b>Chennai Hospital</b></h6>
          <p>Address: 789 Pine Road, Villagetown</p>
          <p>Emergency Number: 555-123-4567</p>
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent3" aria-expanded="false" aria-controls="learnMoreContent3">
            Learn More <i class="fas fa-info-circle"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Branch 4 -->
    <div class="col-md-4 branch-card">
      <div class="card hospital-card">
        <img src="images/Mumbai.jpg" class="card-img-top" alt="Hospital Image">
        <div class="hospital-details">
          <h6><b>Mumbai Hospital</b></h6>
          <p>Address: 321 Cedar Lane, Hamletville</p>
          <p>Emergency Number: 777-888-9999</p>
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent4" aria-expanded="false" aria-controls="learnMoreContent4">
            Learn More <i class="fas fa-info-circle"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Branch 5 -->
    <div class="col-md-4 branch-card">
      <div class="card hospital-card">
        <img src="images/Delhi.jpg" class="card-img-top" alt="Hospital Image">
        <div class="hospital-details">
          <h6><b>Delhi Hospital</b></h6>
          <p>Address: 567 Elm Street, Metropolis</p>
          <p>Emergency Number: 999-888-7777</p>
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent5" aria-expanded="false" aria-controls="learnMoreContent5">
            Learn More <i class="fas fa-info-circle"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JavaScript for form submission -->
<script>
  document.getElementById('contactForm').addEventListener('submit', function (event) {
    event.preventDefault();
    // You can add your custom logic for form submission here
    alert('Form submitted successfully!');
  });
</script>

</body>
</html>
