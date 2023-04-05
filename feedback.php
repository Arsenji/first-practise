<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    define( 'DB_HOST', 'localhost');
    define( 'DB_USER', 'root');
    define( 'DB_PASS', '');
    define( 'DB_NAME', 'feedback');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
$textShort = mysqli_real_escape_string($conn, $_POST['textShort']);
$textareaField = mysqli_real_escape_string($conn, $_POST['textareaField']);
$radioButtons = mysqli_real_escape_string($conn, $_POST['radioButtons']);
$selectedField = mysqli_real_escape_string($conn, $_POST['selectField']);
$checkBox = mysqli_real_escape_string($conn, $_POST['checkbox']);

$sql = "INSERT INTO feedback_users (textShort, textareaField, radioButtons, selectField, checkBox) VALUES ('$textShort', '$textareaField', '$radioButtons', '$selectedField','$checkBox')";

if (mysqli_query($conn, $sql)) {
    echo "Данные успешно сохранены";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="feedback.css" />
    <title>Обратная связь</title>
</head>
<body>
	<form id="form" method="post">
		<label for="textShort">Оставьте краткий отзыв:</label>
		<input type="text" name="textShort"><br>
		
		<label for="textareaField">Оставьте полный отзыв:</label><br>
		<textarea name="textareaField" rows="4" cols="50"></textarea><br>
		
		<label for="radioButtons">Понравился ли вам наш сайт?:</label><br>
		<input type="radio" id="radioButton_1" name="radioButtons" value="1">
		<label for="radioButton_1">Понравился</label><br>
		<input type="radio" id="radioButton_2" name="radioButtons" value="2">
		<label for="radioButton_2">Очень понравился</label><br>

		<label for="selectField">Что бы вы добавили?</label>
		<select id="selectField" name="selectField">
			<option value="1">Ничего</option>
			<option value="2">Сайт идеален</option>
			<option value="3">Мне все равно</option>
		</select><br>

		<label>Насколько бы вы оценили наш сайт:</label><br>
		<input type="checkbox" id="checkbox_1" name="checkbox" value="1">
		<label for="checkbox_1">1</label><br>
		<input type="checkbox" id="checkbox_2" name="checkbox" value="2">
		<label for="checkbox_2">2</label><br>
        <input type="checkbox" id="checkbox_3" name="checkbox" value="3">
        <label for="checkbox_1">3</label><br>
        <input type="checkbox" id="checkbox_4" name="checkbox" value="4">
        <label for="checkbox_1">4</label><br>
        <input type="checkbox" id="checkbox_5" name="checkbox" value="5">
        <label for="checkbox_1">5</label><br>

		<input type="submit" name="Send" id="send" value="Отправить">
		<input type="submit" name="Delete" id="delete" value="Сбросить"><br>
	</form>
</body>
</html>