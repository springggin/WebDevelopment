<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Web Page</title>
    <link rel="icon" type="image/x-icon" href="img_index/homeicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap">

    <style>
    .product-item {
        width: 300px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 15px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    /*.product-list {
        display: flex;
        list-style: none;
        padding: 0;

    }
    .product-info {
        text-align: center;
    }
    .product-image img {
        width: 100%;
        height: auto;
        display: block;
        margin-bottom: 15px;
    }*/
    </style>
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
<br><br>
    
</body>
</html>

<?php
// Check if the 'category' parameter is set in the URL
if(isset($_GET["category"])) {
    $category = $_GET["category"];

    $path = "/home/bk2930/databases";
    // Connect to the database using SQLite3
    $db = new SQLite3($path.'/test.db');


    // 
    $res = $db->query("SELECT * FROM products WHERE category like '$category%'");

    // Display the results
    echo "<div class='container'> <h2>Here is information about this product:</h2> ";
    echo "<div class='product-container'>";
    while ($row = $res->fetchArray()) { 
        echo "<div class='product-item'>";
        echo "<div class='product-info'>";
        echo "<h3>" . $row['productname'] . "</h3>";
        echo "<p> $ " . $row['price'] . "</p>";
        echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
        echo "<div class='product-image'>";
        echo "<img src=" . $row['image_path'] . " style='height: 300px;'>";
        echo "</div>";
        echo "</div>"; 
    }
    echo "</div>";

    $db->close();
    unset($db);

} else {
    echo "No 'category' parameter specified.";
}
?>
