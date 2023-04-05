<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="feedback.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Обратная связь</title>
</head>
<body>
	<form id="form">
		<label name="label1">Текстовое поле:</label>
		<input type="text"><br>
		
		<label for="textarea_field">Многострочное текстовое поле:</label><br>
		<textarea id="textarea_field" name="textarea_field" rows="4" cols="50"></textarea><br>
		
		<label>Радиокнопки:</label><br>
		<input type="radio" id="radio_button_1" name="radio_buttons" value="1">
		<label for="radio_button_1">Первая радиокнопка</label><br>
		<input type="radio" id="radio_button_2" name="radio_buttons" value="2">
		<label for="radio_button_2">Вторая радиокнопка</label><br>

		<label for="select_field">Выпадающий список:</label>
		<select id="select_field" name="select_field">
			<option value="1">Первый вариант</option>
			<option value="2">Второй вариант</option>
			<option value="3">Третий вариант</option>
		</select><br>

		<label>Флажки:</label><br>
		<input type="checkbox" id="checkbox_1" name="checkbox_1" value="1">
		<label for="checkbox_1">Первый флажок</label><br>
		<input type="checkbox" id="checkbox_2" name="checkbox_2" value="2">
		<label for="checkbox_2">Второй флажок</label><br>

		<input type="submit" name="Send" id="send" value="Отправить">
		<input type="submit" name="Delete" id="delete" value="Сбросить">
	</form>
</body>
</html>