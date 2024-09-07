<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and stylesheets -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- JavaScript for form validation -->
    <script type="text/javascript">
        function validateForm() {
            var fullName = document.forms["signupForm"]["fullName"].value;
            var email = document.forms["signupForm"]["email"].value;
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirmPassword"].value;
            var dob = document.forms["signupForm"]["dob"].value;

            // Clear existing messages
            clearMessages();

            if (fullName == "" || email == "" || password == "" || confirmPassword == "" || dob == "") {
                displayMessage("All fields must be filled out!", 'red');
                return false;
            }

            if (password != confirmPassword) {
                displayMessage("Password and confirm password fields do not match!", 'red');
                return false;
            }

            if (!validateEmail(email)) {
                displayMessage("Email Format is not correct", 'red');
                return false;
            }

            return true;
        }

        function displayMessage(message, color) {
            var messageElement = document.createElement('p');
            messageElement.textContent = message;
            messageElement.style.color = color;

            // Get reference to messageContainer
            var messageContainer = document.getElementById('messageContainer');

            // Append message element to the messageContainer
            messageContainer.appendChild(messageElement);
        }


        function clearMessages() {
            // Remove all existing message elements
            var existingMessages = document.querySelectorAll('p');
            existingMessages.forEach(function (message) {
                message.remove();
            });
        }
    </script>

    <!-- Styles for the page -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>

    <title>Signup</title>
</head>
<body>

<!-- HTML content for the form -->
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Signup</h2>
            <form id="signupForm" name="signupForm" action="signupdata.php" method="POST" onsubmit="return validateForm()">
                <div id="messageContainer"></div>
                <?php
                    if (isset($_GET['error'])) {
                    // Display error message
                    echo "<p style=\"color:red;\">CHOOSE A DIFFERENT USER NAME</p>";
                    }
                ?>

                <div class="form-group">
                    <label for="fullName">Full Name (Can't changed again)</label>
                    <input type="text" class="form-control" id="fullName" name="fullName">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
            </form>
            <h6 class="mt-3">Already have an account? <a href="login.php">Login here</a>.</h6>
        </div>
    </div>
</div>

<!-- Bootstrap and custom JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
