Краткая документация
Для запуска:
    1.Для запуска надо создать таблицу в бд 
    
    CREATE TABLE `users` (
      `id` int(11) NOT NULL,
      `email` text NOT NULL,
      `tel` text NOT NULL,
      `message` text
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ALTER TABLE `users`
      ADD PRIMARY KEY (`id`); 
    
    2.изменить config файлы:
        core.php:
            Переменную $home_url на домашний url.
        database.php:
            переменные $host $db_name $username $password изменить на ваши данные подключения к бд.
Для добавления новой записи:
    1. Для добавления новой записи в бд нужно послать post запрос с обязательными параметрами email и tel. И необезательным параметром message. 
Требования к окружению для запуска:
    php-7.2
    mysql 5.7