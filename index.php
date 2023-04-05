<?php
session_start(); // начинаем сессию

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //подключаемся к базе данных
    define( 'DB_HOST', 'localhost');
    define( 'DB_USER', 'root');
    define( 'DB_PASS', '');
    define( 'DB_NAME', 'first-practise2');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // получаем email и пароль из формы
    $email = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query( $conn , $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result) == 1) {
            // авторизуем пользователя
            $_SESSION['email'] = $email;
            header("location: welcome.php"); // переходим на страницу приветствия
          } else {
            $error = "Неверный пароль";
          } 
         } else {
            $error = "Пользователь с таким email не найден";
        }
    mysqli_close($conn); // закрываем соединение с базой данных
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="index.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Аутентификация по email и паролю</title>
</head>
<body name = "body">
    <?php if(isset($error)) { echo "<div>$error</div>"; } ?>
    <div id="wrapper">
    <form method="POST" id="signin" action="" autocomplete="off">
        <input type="text" id="user" name="user" placeholder="username" required>
        <input type="password" id="pass" name="pass" placeholder="password" required>
        <button type="submit">&#xf0da;</button>
        <p name = "error"><?php echo $error; ?></p>
    </form>
</div>
</body>
</html>