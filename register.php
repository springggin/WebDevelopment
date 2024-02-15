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

<body>
    
</body>
</html>


<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$dob = $_POST['dob'];

$path= "/home/bk2930/databases";

$db = new SQLite3($path.'/test.db');

// Check if the username already exists in the table
$checkQuery = $db->prepare("SELECT * FROM USERS WHERE USER=:username");
$checkQuery->bindValue(':username', $username, SQLITE3_TEXT);
$result = $checkQuery->execute();


$row = $result->fetchArray();

if ($row) {
    // Username already exists, raise an error 
    echo "<div class='container'><p>Username already exists. Please choose a different username.<a href = 'register.html'>  go back </a></p></div>";
} else {
    $db->exec("INSERT INTO USERS VALUES ('$username', '$password','$fname','$lname','$email','$dob')");

    $db->close();
    unset($db);

    print("<div class = 'container'> <h2> Successfully registered, '$username' </h2> <p>click <a href='login.html'>here</a> to log in! </p></div>");
    }

?>