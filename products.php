<!-- Web Development and Programming (CSCI-UA 61) - 001 
Final Project: products.php 
Subi Hwang  
Dec 16, 2023 --> 

<!-- products.php (we will go over the details during next week): This product form should be connected to products.php script to store all the values from the products form such as name, email, phone, credit card and address into a clients.txt file. It should also send a thank you for their purchase. -->

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Web Page</title>
    <link rel="icon" type="image/x-icon" href="img_index/homeicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap">
</head>

<body>

<div style="overflow: hidden; text-align: center; background: #fff0db; color: #dbd7ce; display: flex; justify-content: space-between; align-items: center; margin-left: 35%;">
  <h1  style="color: black; padding-bottom: 30px; padding-top: 10px; flex-grow: 1;">Pure Adorn</h1>
  <div style="flex-grow: 1;">
    <a href="https://twitter.com/" class="links"><img src="img_index/twt.png" height="20" width="20"></a>
    <a href="https://www.facebook.com/" class="links"><img src="img_index/fb.png" height="20" width="20"></a>
    <a href="https://www.instagram.com/" class="links"><img src="img_index/ig.png" height="20" width="20"></a>
    <a href="https://www.linkedin.com/feed/" class="links"><img src="img_index/linkedin.png" height="20" width="20"></a>
  </div>
</div>

<div class="nav1">
    <a href="index.html" class="links">Home</a>
    <a href="search.html" class="links">Search</a>
    <a href="login.html" class="links">Login</a>
    <a href="register.html" class="links">Register</a>
    <a href="products.html" class="links">Shop Now!</a>
    <a href="contact.html" class="links">Contact Us</a>
</div>
    <?php
    // Check if the form is submitted
    if (!empty($_POST)) {
        // Extract specific data from the POST array
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNumber'];
        $creditCard = $_POST['creditCardCompany'];
        $creditCardNum = $_POST['cardNumber'];
        $address = $_POST['address'];

        // Extract only the last four digits of the credit card
        $creditCardLastFour = substr($creditCardNum, -4);

        // Prepare the data to be written
        $clientData = "Name: $firstname $lastname\nEmail: $email\nPhone: $phone\nCredit Card: $creditCard\nCredit Card Number: **** **** **** $creditCardLastFour\nAddress: $address\n";

        echo "<h2>Thank you for shopping with us!</h2>";
        print("<center><li> Firstname: $firstname </center>");
        print("<center><li> Lastname: $lastname </center>");
        print("<center><li> Email: $email </center>");
        print("<center><li> Phone: $phone </center>");
        print("<center><li> CreditCard: $creditCard </center>");
        print("<center><li> Card Number: **** **** **** $creditCardLastFour </center>");
        print("<center><li> address: $address ");

        // Open the file in append mode
        $file = fopen("clients.txt", "a") or die("Unable to open file!");

        // Write the data to the file
        fwrite($file, $clientData);

        // Close the file
        fclose($file);
    }
    ?>
    </body>
</html>