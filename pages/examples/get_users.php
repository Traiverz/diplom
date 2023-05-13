<?php
require_once("connection.php");
// Выполнение SQL-запроса для получения списка пользователей
$sql = "SELECT name_person FROM person";
$result = $conn->query($sql);

// Создание массива для хранения пользователей
$users = array();

// Проверка наличия результатов
if ($result->num_rows > 0) {
    // Получение каждого пользователя и добавление его в массив
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Закрытие соединения с базой данных
$conn->close();

// Возвращение списка пользователей в формате JSON
echo json_encode($users);
?>