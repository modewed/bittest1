<?php
// необходимые HTTP-заголовки
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// получаем соединение с базой данных
include_once 'config/database.php';

// создание объекта товара
include_once 'objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new user($db);

// получаем отправленные данные
$data = $_POST;

// убеждаемся, что данные не пусты
if (
    !empty($data['email']) &&
    !empty($data['tel'])
) {

    // устанавливаем значения свойств товара
    $user->email = $data['email'];
    $user->tel = $data['tel'];
    $user->message = $data['message'];

    // создание товара
    if($user->create()){

        // установим код ответа - 201 создано
        http_response_code(201);

        // сообщим пользователю
        echo json_encode(array("message" => "Пользователь был создан."), JSON_UNESCAPED_UNICODE);
    }

    // если не удается создать товар, сообщим пользователю
    else {

        // установим код ответа - 503 сервис недоступен
        http_response_code(503);

        // сообщим пользователю
        echo json_encode(array("message" => "Невозможно создать пользователя."), JSON_UNESCAPED_UNICODE);
    }
}

// сообщим пользователю что данные неполные
else {

    // установим код ответа - 400 неверный запрос
    http_response_code(400);

    // сообщим пользователю
    echo json_encode(array("message" => "Невозможно создать пользователя. Данные неполные."), JSON_UNESCAPED_UNICODE);
}