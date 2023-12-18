<head>
    <meta charset="utf-8">
    <title>Stone Responsive Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!--
    Stone Template
    http://www.templatemo.com/preview/templatemo_452_stone
    -->
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="css/templatemo-style.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
const USERNAME = "admin";
const PASSWORD = "admin";

if(isset($_POST['login'])) {
    if($_POST['username'] == USERNAME && $_POST['password'] == PASSWORD) {
        $_SESSION['login'] = true;
        header("Location: home.php");
    } else {
        header("Location: login.php?error=1");
    }
}

if(isset($_GET['error'])) {
    echo "<p style='color: red'>Nesprávne údaje</p><br>";
}
?>

<form method="post" action="">
    Meno<br>
    <input type="text" name="username" value="" placeholder="Username"><br>
    Heslo<br>
    <input type="password" name="password" value="" placeholder="Password"><br>
    <input type="submit" name="login" value="Prihlasit">
</form>
