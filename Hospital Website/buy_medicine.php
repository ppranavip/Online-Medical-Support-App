<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Buy Medicine</title>
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
        .btn-primary {
            margin-top: 1rem;
            margin-bottom: 2rem;
        }
        h2{
            margin: 2rem;
            margin-left: 0;
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

<div class="card mb-3" style="max-width: 100%; margin:5rem;">
    <div class="row g-0">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Buy the medicines at affordable prices!</h5>
          <p class="card-text">"Discover affordable healthcare solutions with our wide range of medicines. Conveniently order online and experience quality products tailored to your well-being. Your path to affordable and accessible healthcare starts here!"</p>
          <p class="card-text"><small class="text-body-secondary">Seamless health, one click away</small></p>
          <button class="btn btn-info" id="showOrdersBtn">Show Orders</button>
        </div>
      </div>
      <div class="col-md-4">
        <img src="images/orders.jpg" class="img-fluid rounded-start" alt="..." style="height:100%;">
      </div>
    </div>
    
  </div>
</div>

        

<div class="container mt-4">
            <table class="table mt-3" id="ordersTable" style="display: none;">
                <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
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
                    $sql = "SELECT * FROM orders";

                    // Execute the query
                    $result = mysqli_query($conn, $sql);

                    // Check if there are results
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row['productName'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>" . $row['productPrice'] . "</td>";
                            echo "<td>" . $row['totalPrice'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No orders found</td></tr>";
                    }

                    // Close the result set and database connection
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
    <h2>Categories</h2>

    <div class="card-deck">
        <!-- Category 1 -->
        <div class="card" style="width: 18rem;" onclick="showProducts('category1')">
            <!-- Include category image -->
            <img src="images/babycare.jpg" class="card-img-top" alt="Category 1" height="200px">
            <div class="card-body">
                <h5 class="card-title">Baby Care</h5>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="card" style="width: 18rem;" onclick="showProducts('category2')">
            <!-- Include category image -->
            <img src="images/winteressentials.jpg" class="card-img-top" alt="Category 2" height="200px">
            <div class="card-body">
                <h5 class="card-title">Winter Essentials</h5>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="card" style="width: 18rem;" onclick="showProducts('category3')">
            <!-- Include category image -->
            <img src="images/personalcare.jpg" class="card-img-top" alt="Category 3" height="200px">
            <div class="card-body">
                <h5 class="card-title">Personal Care</h5>
            </div>
        </div>
        
        <!-- Category 2 -->
        <div class="card" style="width: 18rem;" onclick="showProducts('category4')">
            <!-- Include category image -->
            <img src="images/ayurveda.jpg" class="card-img-top" alt="Category 4" height="200px">
            <div class="card-body">
                <h5 class="card-title">Ayurvedic</h5>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="card" style="width: 18rem;" onclick="showProducts('category5')">
            <!-- Include category image -->
            <img src="images/healthdrinks.jpg" class="card-img-top" alt="Category 5" height="200px">
            <div class="card-body">
                <h5 class="card-title">Health Drinks</h5>
            </div>
        </div>

        <!-- Add 3 more categories in a similar fashion -->

    </div>

    <!-- Display Products -->
    <div id="products" class="mt-4" style="display: none;">
        <h2>Products</h2>

        <div class="row" id="productContainer">
            <!-- Product details will be dynamically inserted here -->
        </div>

    </div>

    <!-- Buy Form -->
    <!-- Buy Form -->
<div id="buyForm" class="mt-4" style="display: none;">
    
    <form id="medicineForm" onsubmit="submitForm(); return false;">
    <h2>Buy Now</h2>
        <div class="form-group">
            <label for="deliveryAddress">Delivery Address:</label>
            <input type="text" class="form-control" id="deliveryAddress" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" required>
        </div>
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" readonly>
        </div>
        <!-- Add the following code for the product price -->
        <div class="form-group">
            <label for="productPrice">Product Price:</label>
            <input type="text" class="form-control" id="productPrice" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit Order</button>




    </form>
    <!-- Buying Summary -->
    <div id="buyingSummary" class="mt-4" style="display: none;">
            <h2>Order Summary</h2>

            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img id="summaryProductImage" class="card-img" alt="Selected Product Image" style="height:200px; margin:1rem; width:300px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><strong>Product Name:</strong> <span id="summaryProductName"></span></p>
                            <p class="card-text"><strong>Product Price:</strong> <span id="summaryProductPrice"></span></p>
                            <p class="card-text"><strong>Quantity:</strong> <span id="summaryQuantity"></span></p>
                            <p class="card-text"><strong>Total Price:</strong> <span id="summaryTotalPrice"></span></p>
                            <p class="card-text"><strong>Delivery Address:</strong> <span id="summaryAddress"></span></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        
</div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
        // Define product data for each category
        var categoryData = {
            category1: [
                { name: 'Baby Care combo soap, lotion', price: '465/-', rating: '⭐⭐⭐⭐', image: 'baby1.jpg' },
                { name: 'Johnsons baby combo of 3', price: '345/-', rating: '⭐⭐⭐⭐⭐', image: 'baby2.jpg' },
                { name: 'Pampers Baby Dry diapers', price: '110/-', rating: '⭐⭐⭐⭐⭐', image: 'baby3.jpg' },
                { name: 'Natures Aid Baby combo of 2', price: '300/-', rating: '⭐⭐⭐⭐⭐', image: 'baby4.jpg' },
                { name: 'Colgate baby toothpaste brush', price: '50/-', rating: '⭐⭐⭐⭐⭐', image: 'baby5.jpg' },
                { name: 'Bentley Organic baby oil', price: '75/-', rating: '⭐⭐⭐⭐⭐', image: 'baby6.jpg' },
                { name: 'Johnsons baby powder', price: '300/-', rating: '⭐⭐⭐⭐⭐', image: 'baby7.jpg' },




                // Add more products as needed
            ],
            category2: [
                { name: 'Vaseline Healthy Even Tone', price: '500/-', rating: '⭐⭐⭐⭐⭐', image: 'winter1.jpg' },
                { name: 'Garnier skin active Moisture cream', price: '200/-', rating: '⭐⭐⭐⭐⭐', image: 'winter2.jpg' },
                { name: 'Zandu Balm', price: '50/-', rating: '⭐⭐⭐⭐⭐', image: 'winter3.jpg' },
                { name: 'Dr Scholls Heel Repair cream', price: '65/-', rating: '⭐⭐⭐⭐⭐', image: 'winter4.jpg' },
                { name: 'Clear Revive Nasal Spray', price: '80/-', rating: '⭐⭐⭐⭐⭐', image: 'winter5.jpg' },
                { name: 'B&T Cough and Bronchial Syrup', price: '90/-', rating: '⭐⭐⭐⭐⭐', image: 'winter6.jpg' },
                { name: 'Vicks vapo Rub', price: '55/-', rating: '⭐⭐⭐⭐⭐', image: 'winter7.jpg' },
                { name: 'Vicks Vapo Inhaler', price: '35/-', rating: '⭐⭐⭐⭐⭐', image: 'winter8.jpg' },






                // Add more products as needed
            ],
            category3: [
                { name: 'Tresemme Combo of 2', price: '800/-', rating: '⭐⭐⭐⭐⭐', image: 'personal1.jpg' },
                { name: 'Loveli LipBalm', price: '70/-', rating: '⭐⭐⭐⭐⭐', image: 'personal2.jpg' },
                { name: 'Nivea Essentials', price: '89/-', rating: '⭐⭐⭐⭐⭐', image: 'personal3.jpg' },
                { name: 'Dove beauty cream bar', price: '79/-', rating: '⭐⭐⭐⭐⭐', image: 'personal4.jpg' },
                { name: 'Pears Body wash', price: '150/-', rating: '⭐⭐⭐⭐⭐', image: 'personal5.jpg' },
                { name: 'Equate nasal strips', price: '50/-', rating: '⭐⭐⭐⭐⭐', image: 'personal6.jpg' },
                { name: 'Neutrogena Hydro Boost', price: '90/-', rating: '⭐⭐⭐⭐⭐', image: 'personal7.jpg' },





                // Add more products as needed
            ],
            category4: [
                { name: 'Patanjali Dant Kanti', price: '100/-', rating: '⭐⭐⭐⭐⭐', image: 'ayurveda1.jpg' },
                { name: 'Ayurvit Herbal Syrup', price: '150/-', rating: '⭐⭐⭐⭐⭐', image: 'ayurveda2.jpg' },
                { name: 'Dabur Hingoli jar', price: '199/-', rating: '⭐⭐⭐⭐⭐', image: 'ayurveda3.jpg' },
                { name: 'Yogi Karthika', price: '67/-', rating: '⭐⭐⭐⭐⭐', image: 'ayurveda4.jpg' },
                { name: 'Indulekha Hair Oil', price: '99/-', rating: '⭐⭐⭐⭐⭐', image: 'ayurveda5.jpg' },
                { name: 'Vicco Turmeric', price: '50/-', rating: '⭐⭐⭐⭐⭐', image: 'ayurveda6.jpg' },


                // Add more products as needed
            ],
            category5: [
                { name: 'ORS orange flavour', price: '56/-', rating: '⭐⭐⭐⭐⭐', image: 'health1.jpg' },
                { name: 'Horlicks energy booster jar', price: '450/-', rating: '⭐⭐⭐⭐⭐', image: 'health2.jpg' },
                { name: 'Ensure protein vanilla flavour', price: '300/-', rating: '⭐⭐⭐⭐⭐', image: 'health3.jpg' },
                { name: 'Glucon-D Nimbu Pani', price: '50/-', rating: '⭐⭐⭐⭐⭐', image: 'health4.jpg' },
                { name: 'Horlicks Royal Kesar Badam', price: '400/-', rating: '⭐⭐⭐⭐⭐', image: 'health5.jpg' },
                { name: 'Junior Protinex Vanilla flavour', price: '450/-', rating: '⭐⭐⭐⭐⭐', image: 'health6.jpg' },




                // Add more products as needed
            ],
        };

        var selectedProduct = {};

        function showProducts(category) {
            // Hide all products
            document.getElementById('products').style.display = 'none';
            document.getElementById('buyForm').style.display = 'none';

            // Fetch and display products for the selected category
            fetchProducts(category);
        }

        function fetchProducts(category) {
            var products = categoryData[category];

            // Clear existing product container
            var productContainer = document.getElementById('productContainer');
            productContainer.innerHTML = '';

            // Display products dynamically
            for (var i = 0; i < products.length; i++) {
                var productCard = createProductCard(products[i]);
                productContainer.appendChild(productCard);
            }

            // Show the product div
            document.getElementById('products').style.display = 'block';
        }

        function createProductCard(product) {
            var card = document.createElement('div');
            card.className = 'col-md-3 mb-3';

            card.innerHTML = `
                <div class="card">
                    <img src="images/${product.image}" class="card-img-top" alt="${product.name}" style="height:150px;margin:2rem;width:150px;align-self:center;">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">Price: ${product.price}</p>
                        <p class="card-text">Rating: ${product.rating}</p>
                        <button class="btn btn-primary" onclick="showBuyForm('${product.name}', '${product.price}', '${product.image}')">Buy Now</button>
                    </div>
                </div>
            `;

            return card;
        }


        function showBuyForm(productName, productPrice, productImage) {
            // Hide the products and show the buy form
            document.getElementById('products').style.display = 'none';
            document.getElementById('buyForm').style.display = 'block';
            document.getElementById('medicineForm').style.display = 'block';
            document.getElementById('buyingSummary').style.display = 'none';


            // Set the selected product details in the form
            document.getElementById('productName').value = productName;
            document.getElementById('productPrice').value = productPrice;

            // Set the selected product image in the buying summary
            document.getElementById('summaryProductImage').src = 'images/' + productImage;

            // Store selected product details
            selectedProduct = {
                name: productName,
                price: productPrice,
                image: productImage,
            };
        }

        function submitForm() {
    // Collect form data
    var deliveryAddress = document.getElementById('deliveryAddress').value;
    var quantity = parseInt(document.getElementById('quantity').value, 10); // Convert to integer
    var productPrice = parseFloat(selectedProduct.price.replace('/-', '')); // Convert to float

    // Calculate total price
    var totalPrice = productPrice * quantity;

    // You can now send this data to your server using AJAX
    var orderData = {
    productName: selectedProduct.name,
    quantity: quantity,
    totalPrice: totalPrice, // Include totalPrice in the orderData object
    productPrice: productPrice,
    deliveryAddress: deliveryAddress,
    // Add other data you want to store in the database
};

    console.log(orderData)

        // Send data to the server using AJAX
        // Replace 'your-server-endpoint' with the actual endpoint URL where you handle the database interaction
        // You may want to use a library like Axios or fetch for more advanced AJAX handling
        // Here, I'm using the basic XMLHttpRequest for simplicity
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_orders.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Successful response from the server
                    console.log('Order submitted successfully!');
                    // You may want to show a confirmation message or redirect the user
                } else {
                    // Error handling
                    console.error('Error submitting order:', xhr.responseText);
                    // You may want to show an error message to the user
                }
            }
        };

        // Convert orderData to JSON before sending
        // Convert orderData to JSON before sending
        var jsonData = JSON.stringify(orderData);

        xhr.send(jsonData);


        document.getElementById('medicineForm').reset();
        document.getElementById('medicineForm').style.display = 'none';
        document.getElementById('buyingSummary').style.display = 'block';

        // Update the summary values
        document.getElementById('summaryProductName').innerText = selectedProduct.name;
        document.getElementById('summaryQuantity').innerText = quantity;
        document.getElementById('summaryTotalPrice').innerText = (productPrice * quantity)+'/-';
        document.getElementById('summaryProductPrice').innerText = productPrice+'/-';
        document.getElementById('summaryAddress').innerText = deliveryAddress;

        // You may want to show a confirmation message or redirect the user after form submission
    }
    document.getElementById('showOrdersBtn').addEventListener('click', function() {
        var appointmentsTable = document.getElementById('ordersTable');
        appointmentsTable.style.display = (appointmentsTable.style.display === 'none') ? 'table' : 'none';
    });



</script>

</body>
</html>
