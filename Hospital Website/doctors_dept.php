<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Doctor Details</title>
    <style>
    /* Add this style to your existing CSS */
    .doctor-photo {
        height: 300px; /* Set your desired height */
        width: 300px;  /* Set your desired width */
        object-fit: cover; /* Maintain aspect ratio and cover the entire container */
        border-radius: 50%; /* Optional: For rounded images */
        align-self: center;
        margin-top: 1rem;
    }
        body {
            background-color: #f8f9fa;
            padding-top: 56px;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-item:hover .dropdown-menu {
            display: block;
        }
        .rounded-start{
          height: 200px;
          width: 350px;
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
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="landing.php">About</a>
            </li>
            <li class="nav-item dropdown nav-item active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="diagnosis.php">Diagnosis</a>
                    <a class="dropdown-item" href="appointments.php">Book an appointment</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="doctors_dept.php">Find a doctor</a>
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





<div class="container mt-4">

    <h2>Doctor Details</h2>

    <!-- Department Dropdown -->
    <div class="form-group">
        <label for="departmentSelect">Select Department:</label>
        <select class="form-control" id="departmentSelect" onchange="getDoctorDetails()">
            <option value="">-- Select Department --</option>
            <!-- Fetch department names from the database -->
            <?php
            // Connect to your database (replace with your database credentials)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hospital_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch department names from the database
            $sql = "SELECT DISTINCT department FROM doctors";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['department'] . "'>" . $row['department'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>
    </div>

    <!-- Doctor Cards -->
    <div id="doctorDetails" class="row mt-3">
        <!-- Doctor details will be displayed here using JavaScript -->
    </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Cardiology.jpg" class="img-fluid rounded-start" alt="Cardiology">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Cardiology</h5>
          <p class="card-text">The cardiology department at our hospital offers expert cardiovascular care, including diagnostics, interventions, and personalized treatment for heart conditions, ensuring patients receive comprehensive and compassionate cardiac services.</p>
          <p class="card-text"><small class="text-body-secondary">Healing Hearts, Pioneering Cardiac Excellence</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Orthopedics.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Orthopedics</h5>
          <p class="card-text">The Orthopedics Department at our hospital specializes in treating musculoskeletal conditions, providing expert care for bones, joints, and related structures. Experienced orthopedic surgeons offer comprehensive diagnosis and advanced surgical interventions.</p>
          <p class="card-text"><small class="text-body-secondary">Restoring Mobility, Embracing Life's Movements</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Gastroenterology.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Gastroenterology</h5>
          <p class="card-text">The Gastroenterology department specializes in digestive health, offering expert care for conditions affecting the gastrointestinal tract, including endoscopy, colonoscopy, and treatment for digestive disorders and diseases.</p>
          <p class="card-text"><small class="text-body-secondary">Digestive Wellness, Transforming Lives</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Neurology.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Neurology</h5>
          <p class="card-text">The Neurology department at our hospital provides expert care for neurological disorders, offering advanced diagnostics, personalized treatment plans, and compassionate support for patients with neurological conditions.</p>
          <p class="card-text"><small class="text-body-secondary">Navigating Minds, Transforming Neurological Care</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Pediatrics.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Pediatrics</h5>
          <p class="card-text">The Pediatrics department at our hospital provides expert, compassionate care for infants, children, and adolescents, addressing a range of medical needs to promote lifelong health and well-being.</p>
          <p class="card-text"><small class="text-body-secondary">Caring for Little Miracles, Building Healthy Futures</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Dermatology.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Dermatology</h5>
          <p class="card-text">The Dermatology Department at our hospital provides expert care for skin conditions, offering diagnosis and treatment for diverse dermatological issues, ensuring patients' skin health and well-being.</p>
          <p class="card-text"><small class="text-body-secondary">Skin Health Redefined, Confidence Reimagined</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="images/Oncology.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Oncology</h5>
          <p class="card-text">The Oncology Department at our hospital provides comprehensive cancer care, offering advanced diagnostics, personalized treatment plans, and compassionate support for patients facing oncological challenges.</p>
          <p class="card-text"><small class="text-body-secondary">Hope Unleashed, Fighting Cancer Together</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to handle AJAX request and update doctor details -->
<script>
    function getDoctorDetails() {
        var selectedDepartment = document.getElementById("departmentSelect").value;

        if (selectedDepartment === "") {
            document.getElementById("doctorDetails").innerHTML = "";
            return;
        }

        // Make an AJAX request to fetch doctor details based on the selected department
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("doctorDetails").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "get_doctor_details.php?department=" + selectedDepartment, true);
        xhttp.send();
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
