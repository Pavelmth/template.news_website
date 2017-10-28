<?php

class News
{
//Получить новости
    public static function get_news()
    {
        // Подключение к серверу MySQL
        $mysqli = new mysqli('localhost', 'root', '', 'gallery');

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        // Посылаем запрос серверу
        if ($result = $mysqli->query('SELECT * FROM newsweek')) {

            return $result->fetch_all();

            // Освобождаем память
            $result->close();
        }

        // Закрываем соединение
        $mysqli->close();
    }

//Получить новость по id
    public static function get_one_news($id)
    {
        // Подключение к серверу MySQL
        $mysqli = new mysqli('localhost', 'root', '', 'gallery');

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        // Посылаем запрос серверу
        if ($result = $mysqli->query('SELECT * FROM newsweek WHERE id='.$id)) {

            return $result->fetch_all();

            // Освобождаем память
            $result->close();
        }

        // Закрываем соединение
        $mysqli->close();
    }

//Вставить новость
    public static function put_news($id = null, $name_news, $name_content, $date_news)
    {
// Подключение к серверу MySQL
        $mysqli = new mysqli('localhost', 'root', '', 'gallery');

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

// Вставка в базу данных названия и путь к файлу

        $stmt = $mysqli->prepare("INSERT INTO newsweek VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $id, $name_news, $name_content, $date_news);

// выполнение подготовленного выражения
        $stmt->execute();

        printf("%d Row inserted.\n", $stmt->affected_rows);

// Закрываем соединение
        $mysqli->close();
    }
}