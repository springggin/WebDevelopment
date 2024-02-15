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

// POST로부터 사용자 입력 정보 가져오기
$username = $_POST['username'];
$password = $_POST['password'];

$path = "/home/bk2930/databases";
// Connect to the database using SQLite3
$db = new SQLite3($path.'/test.db');

$res = $db->prepare("SELECT * FROM USERS WHERE USER='$username' and PASSWORD='$password' ");

$result = $res ->execute();

$row = $result->fetchArray();
//if row exists -> login success 
if ($row) {
    echo "<div class = 'container'> <h2>Welcome to your site <strong> ' $username '</strong>.</h2><p>click <a href='products.html'>here</a> to move to your shopping cart! </p> </div>";
}else{
        echo "<div class = 'container'> <p>Can't enter site because of wrong username and password";
    }

$db->close();
unset($db);

?>



