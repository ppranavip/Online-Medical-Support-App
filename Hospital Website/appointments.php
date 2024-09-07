<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Appointments</title>
    <style>
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

        .container {
            padding-left: 4rem;
            padding-right: 4rem;
        }

        h2 {
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            margin-top: 1rem;
            margin-bottom: 2rem;
        }
        .btn-info{
            margin-bottom: 1rem;
        }
        .btn-secondary{
            margin-bottom: 1rem;
        }

    </style>
    <script>
        function getDoctors() {
    var departmentSelect = document.getElementById('departmentSelect');
    var doctorSelect = document.getElementById('doctorSelect');
    var selectedDepartment = departmentSelect.value;

    // Reset doctor dropdown
    doctorSelect.innerHTML = '<option value="">-- Select Doctor --</option>';

    // Fetch doctors using AJAX
    if (selectedDepartment !== '') {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
        console.log(xhr.readyState, xhr.status, xhr.responseText); // Add this line
        if (xhr.readyState === 4 && xhr.status === 200) {
            var doctors = JSON.parse(xhr.responseText);

                // Populate doctor dropdown
                doctors.forEach(function (doctor) {
                    var option = document.createElement('option');
                    option.value = doctor.doctor_name;
                    option.textContent = doctor.doctor_name;
                    doctorSelect.appendChild(option);
                });
    }
};

        // Replace 'fetch_doctors.php' with the actual PHP file to fetch doctors
        xhr.open('GET', 'fetch_doctors.php?department=' + encodeURIComponent(selectedDepartment), true);
        xhr.send();
    }
}
    </script>
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

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Make an online appointment securely!</h5>
          <p class="card-text">"Experience convenience with our online appointment system! Schedule appointments effortlessly, choose preferred time slots, and manage your health on your terms. Your wellness journey begins with a click!"</p>
          <p class="card-text"><small class="text-body-secondary">Seamless health, one click away</small></p>
        </div>
      </div>
      <div class="col-md-4">
        <img src="images/appointments.jpg" class="img-fluid rounded-start" alt="...">
      </div>
    </div>
  </div>
</div>

        <div class="container mt-5">
        <button class="btn btn-primary" id="bookAppointmentBtn">Book Appointment</button>
        <button class="btn btn-secondary" id="cancelAppointmentBtn">Cancel Appointment</button>
                <?php
                    if (isset($_GET['booked'])) {
                    // Display error message
                    echo "<p style=\"color:green;\">Appointment Booked Successfully!</p>";
                    }
                ?>
                <?php
                    if (isset($_GET['cancelled'])) {
                    // Display error message
                    echo "<p style=\"color:green;\">Appointment Cancelled Successfully!</p>";
                    }
                ?>

            <!-- Left side: Book Appointment Form -->
            <div id="bookAppointmentForm" style="display: none;">
            <h2>Book Appointment</h2>
            <form action="book_appointments.php" method="POST">
                <!-- Include form fields for name, email, date, etc. -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="timeSelect">Select Time:</label>
                    <select class="form-control" id="timeSelect" name="time">
                        <option value="">-- Select Time --</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="02:00 PM">02:00 PM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="departmentSelect">Select Department:</label>
                    <select class="form-control" id="departmentSelect" name="department" onchange="getDoctors()">
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
                <div class="form-group">
                    <label for="doctorSelect">Select Doctor:</label>
                    <select class="form-control" id="doctorSelect" name="doctor" required>
                        <!-- Doctors will be dynamically loaded here -->
                        <option value="">-- Select Doctor --</option>
                    </select>
                </div>
                <div class="form-group">
                <div class="form-group">
                <label for="payment">Payment Done</label>
                    <select class="form-control" id="paymentSelect" name="payment">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>                   
                </div>
                <button type="submit" class="btn btn-primary">Book Appointment</button>
            </form>
            </div>

            <!-- Cancel Appointment Form (Initially Hidden) -->
            <div id="cancelAppointmentForm" style="display: none;">
            <h2>Cancel Appointment</h2>
                <form action="cancel_appointment.php" method="POST">
                    <div class="form-group">
                        <label for="cancelName">Name:</label>
                        <input type="text" class="form-control" id="cancelName" name="cancelName" required>
                    </div>
                    <div class="form-group">
                        <label for="cancelEmail">Email:</label>
                        <input type="email" class="form-control" id="cancelEmail" name="cancelEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="cancelContactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" id="cancelContactNumber" name="cancelContactNumber" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Cancel Appointment</button>
                </form>
            </div>
        
            <!-- Right side: All Appointments Table -->
            <h2>All Appointments</h2>
            <button class="btn btn-info" id="showAppointmentsBtn">Show Appointments</button>
            <table class="table mt-3" id="appointmentsTable" style="display: none;">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Department</th>
                    <th scope="col">Doctor</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    // Placeholder database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "hospital_db";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Placeholder SQL query
                    $sql = "SELECT * FROM appointments";

                    // Execute the query
                    $result = mysqli_query($conn, $sql);

                    // Check if there are results
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>". $row["department"] . "</td>";
                            echo "<td>" . $row['doctor'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No appointments found</td></tr>";
                    }

                    // Close the result set and database connection
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        
    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // JavaScript to toggle visibility of the appointments table
    document.getElementById('showAppointmentsBtn').addEventListener('click', function() {
        var appointmentsTable = document.getElementById('appointmentsTable');
        appointmentsTable.style.display = (appointmentsTable.style.display === 'none') ? 'table' : 'none';
    });

    // JavaScript to toggle visibility of the cancel appointment form
    document.getElementById('cancelAppointmentBtn').addEventListener('click', function() {
        var cancelForm = document.getElementById('cancelAppointmentForm');
        cancelForm.style.display = (cancelForm.style.display === 'none') ? 'block' : 'none';

        var bookForm = document.getElementById('bookAppointmentForm');
        bookForm.style.display = 'none';
    });

    // JavaScript to toggle visibility of the book appointment form
    document.getElementById('bookAppointmentBtn').addEventListener('click', function() {
        var bookForm = document.getElementById('bookAppointmentForm');
        bookForm.style.display = (bookForm.style.display === 'none') ? 'block' : 'none';

        var cancelForm = document.getElementById('cancelAppointmentForm');
        cancelForm.style.display = 'none';
    });
</script>


</body>
</html>
