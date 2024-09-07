<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptom Checker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            margin-top: 5rem;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        .symptomForm {
            width: 48%;
        }
        .selectedSymptoms {
            width: 48%;
        }
        .card {
            margin-bottom: 20px;
        }
        .symptomContainer {
            padding: 15px;
            margin-bottom: 20px;
        }
        .symptomList {
            list-style: none;
            padding-left: 10px;
        }
        .submitBtn {
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-block{
            background-color: #007bff;
            border: 2px solid #007bff;
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
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="symptomForm">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Symptom Checker</h1>
                    <div class="symptomContainer">
                        <div><h4>Select Symptoms</h4></div>
                        <div class="form-row">
                            <div class="col-md-8">
                                <select class="form-control" id="symptomSelect">
                                    <option value="">Select a symptom</option>
                                    <option value="Fever">Fever</option>
                                    <option value="Cough">Cough</option>
                                    <option value="Headache">Headache</option>
                                    <!-- Add more symptoms as needed -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-block" onclick="addSymptom()">Add Symptom</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="selectedSymptoms">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Selected Symptoms</h4>
                    <ul class="symptomList" id="symptomList">
                        <!-- Selected symptoms will be displayed here -->
                    </ul>
                    <div class="submitContainer">
                        <button class="btn btn-primary btn-block submitBtn" onclick="submitSymptoms()">Submit Symptoms</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="resultContainer">
        <!-- Result will be displayed here -->
    </div>
    <div id="modeResultContainer">

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- frontend/diagnosis.php -->
<!-- ... Your existing HTML code ... -->

<!-- ... Your existing HTML code ... -->

<script>
    const symptomSelect = document.getElementById("symptomSelect");
    const symptomList = document.getElementById("symptomList");
    const resultContainer = document.getElementById("resultContainer");
    const modeResultContainer = document.getElementById("modeResultContainer");

    const addSymptom = () => {
        const symptomValue = symptomSelect.value;

        if (symptomValue === "") {
            alert("Select a symptom");
            return;
        }

        // Check if the symptom is already selected
        const selectedSymptoms = Array.from(symptomList.children).map(li => li.textContent.trim());
        if (selectedSymptoms.includes(symptomValue)) {
            alert("Symptom already selected");
            return;
        }

        // Add the symptom to the list
        const newListItem = document.createElement('li');
        newListItem.textContent = symptomValue;
        symptomList.appendChild(newListItem);
    }

    const submitSymptoms = async () => {
        // Get the selected symptoms
        const selectedSymptoms = Array.from(symptomList.children).map(li => li.textContent.trim());

        // Your logic to process the selected symptoms and display the result
        resultContainer.innerHTML = `<h3>Selected Symptoms:</h3><p>${selectedSymptoms.join(", ")}`;

        // Send symptoms to the backend for prediction
        try {
            const response = await fetch('/predict', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ symptoms: selectedSymptoms }),
            });

            const data = await response.json();
            if (response.ok) {
                // Display the predicted disease
                modeResultContainer.innerHTML = `<h3>Diagnosed disease:</h3><p>${data.prediction}</p>`;
            } else {
                console.error(data.error);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
</script>

</body>
</html>