<?php
    include "service/database.php";
    session_start();

    $register_message = "";

    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            if($db->query($sql)) {
                $register_message = "Sign Up Success, Please Login";
            }else {
                $register_message = "Sign Up Failed, Please Try Again";
            }
        }catch (mysqli_sql_exception) {
            $register_message = "Username Used, Try Another Username";
        }
        $db->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <?php include "layout/header.html" ?>

    <h2>SIGN UP</h2>
    <i><?= $register_message ?></i>

    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">Sign Up Now</button>
    </form>

    <?php include "layout/footer.html" ?>
</body>

<body>
  <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
</body>

</html>