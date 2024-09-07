<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['uname'])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Testimonials</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .testimonials-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            margin-top: 50px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .testimonial {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .testimonial h5 {
            color: #007bff;
        }

        .testimonial p {
            font-size: 16px;
            color: #495057;
        }

        #addTestimonialModal .modal-dialog {
            max-width: 500px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mt-5">Patient Testimonials</h2>

    <div class="testimonials-container">
        <div class="testimonial">
            <h5>John Doe</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique sapien vitae justo aliquet,
                sit amet iaculis lorem egestas. Ut in lacus at turpis tincidunt elementum sed id sem.</p>
        </div>

        <div class="testimonial">
            <h5>Jane Smith</h5>
            <p>Curabitur id nunc eu mauris eleifend congue. Nam bibendum urna non maximus ultricies. Vestibulum
                fringilla metus in sollicitudin ultrices.</p>
        </div>

        <!-- Add more testimonials here -->

        <button class="btn btn-primary" data-toggle="modal" data-target="#addTestimonialModal">Add Testimonial</button>
    </div>
</div>

<!-- Add Testimonial Modal -->
<div class="modal fade" id="addTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="addTestimonialModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTestimonialModalLabel">Add Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="testimonialForm">
                    <div class="form-group">
                        <label for="testimonialAuthor">Your Name</label>
                        <input type="text" class="form-control" id="testimonialAuthor" required>
                    </div>
                    <div class="form-group">
                        <label for="testimonialContent">Testimonial</label>
                        <textarea class="form-control" id="testimonialContent" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Add testimonial functionality using JavaScript (you can use AJAX to save it to the server)
    $(document).ready(function () {
        $('#testimonialForm').submit(function (e) {
            e.preventDefault();
            var author = $('#testimonialAuthor').val();
            var content = $('#testimonialContent').val();

            // You can use AJAX to send the data to the server and update the testimonials dynamically
            // For simplicity, let's just log the data to the console
            console.log('Author:', author);
            console.log('Testimonial:', content);

            // Clear the form and close the modal
            $('#testimonialAuthor').val('');
            $('#testimonialContent').val('');
            $('#addTestimonialModal').modal('hide');
        });
    });
    // Add testimonial functionality using JavaScript (you can use AJAX to save it to the server)
    $(document).ready(function () {
        $('#testimonialForm').submit(function (e) {
            e.preventDefault();
            var author = $('#testimonialAuthor').val();
            var content = $('#testimonialContent').val();

            // You can use AJAX to send the data to the server and update the testimonials dynamically
            // For simplicity, let's just append the testimonial to the container
            var newTestimonial = `
                <div class="testimonial">
                    <h5>${author}</h5>
                    <p>${content}</p>
                </div>
            `;

            $('.testimonials-container').append(newTestimonial);

            // Clear the form and close the modal
            $('#testimonialAuthor').val('');
            $('#testimonialContent').val('');
            $('#addTestimonialModal').modal('hide');
        });
    });
</script>

</body>
</html>
