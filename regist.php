<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    define( 'DB_HOST', 'localhost');
    define( 'DB_USER', 'root');
    define( 'DB_PASS', '');
    define( 'DB_NAME', 'first-practise2');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO users (name, email , password) VALUES ('$name', '$email', '$pass')";

    if (mysqli_query($conn, $sql)) {
        echo "Данные успешно сохранены";
        header("welcome.php");
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="regist.css" />
    <title>Регистрация</title>
</head>
<body>
<form>
    <div>
        <label for="name">Как вас зовут:</label>
        <input type="text" name="name" id="name"><br>

        <label for="email">Введите почту:</label>
        <input type="text" name="email" id="email"><br>

        <label for="password">Введите пароль:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" name="Send1" id="send1" value="Отправить">
        <input type="submit" name="Delete1" id="delete1" value="Сбросить"><br>
    </div>
</form>

</body>
</html>
