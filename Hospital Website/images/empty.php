<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Toast Example</title>

    <style>
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>

    <button type="button" class="btn btn-primary" id="activateToastBtn">Activate Toast</button>

    <div class="toast-container">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header" style="background-color: #007bff; color:white;">
                <strong class="me-auto">Bootstrap Toast</strong><span style="width:10px;"></span>
                <small>Just now</small><span style="width:20px;"></span>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Hello, world! This is a Bootstrap toast message.
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Activate toast on button click
        $('#activateToastBtn').click(function () {
            $('.toast').toast('show');
        });
    </script>

</body>
</html>
