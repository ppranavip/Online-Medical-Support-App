<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>

    <!-- JavaScript for form validation -->
    <script type="text/javascript">
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;

            // Clear existing messages
            clearMessages();

            if (email == "" || password == "") {
                displayMessage("All fields must be filled!", 'red');
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
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Login</h2>
            <?php
            // Check if the signup parameter is present in the URL
            if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
                echo '<p style="color: green;">Registered Successfully. Please login!</p>';
            }
            ?>
            <form id="loginForm" name="loginForm" action="logindata.php" method="POST" onsubmit="return validateForm()">
                <div id="messageContainer"></div>

                <?php
                    if (isset($_GET['error'])) {
                        echo "<p style=\"color:red;\">Incorrect Password! Please try again</p>";
                    }

                    if (isset($_GET['mistake'])) {
                        echo "<p style=\"color:red;\">Incorrect Email! Please try again</p>";
                    }
                ?>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <h6 class="mt-3">Don't have an account? <a href="signup.php">Signup here</a>.</h6>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
