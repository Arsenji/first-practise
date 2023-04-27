<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'first-practise2');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // получаем данные из формы
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];

        $sql = "INSERT INTO users (email, password, name) VALUES ('$email', '$password', '$name')";

        if (mysqli_query($conn, $sql)) {
            // перенаправляем пользователя на другую страницу
            header("Location: welcome.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<form method="post">
        <label for="name">Как вас зовут:</label>
        <input type="text" name="name" id="name"><br>

        <label for="email">Введите почту:</label>
        <input type="text" name="email" id="email"><br>

        <label for="password">Введите пароль:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Register">
        <input type="submit" name="delete" id="delete" value="Сбросить"><br>
</form>

</body>
</html>
