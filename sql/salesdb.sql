/* Если БД не создана, то создаем ее*/
CREATE DATABASE IF NOT EXISTS salestel
ENGINE=InnoDB
CHARACTER SET = utf8;

/* Создаем таблицу la_question с вопросами*/
CREATE TABLE IF NOT EXISTS la_question (
	id INT AUTO_INCREMENT NOT NULL,
 	question VARCHAR(1000), /* Вопрос */
 	meta VARCHAR(100), /* Служебная информация */
 	PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=UTF8;

/* Создаем таблицу la_answer с вариантами ответов*/
CREATE TABLE IF NOT EXISTS la_answer (
	id INT AUTO_INCREMENT NOT NULL,
	id_question INT NOT NULL, /* Ссылка на таблицу la_question "один вопрос - много ответов */
	id_next_question INT, /* ссылка куда ведет тот или иной вариант ответа в la_question*/
 	answer VARCHAR(1000), /* Ответ */
 	meta VARCHAR(100), /* Служебная информация */
 	PRIMARY KEY (id),
 	FOREIGN KEY (id_question) REFERENCES la_question(id), /* Связь вопрос-ответ*/
 	FOREIGN KEY (id_next_question) REFERENCES la_question(id) /* Связь ответ-следующийвопрос*/
) ENGINE=InnoDB CHARACTER SET=UTF8;

/* Создаем таблицу users*/
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT NOT NULL,
 	login VARCHAR(20), /* логин, совпадает с логином Windows */
 	pass VARCHAR(20), /* Пароль */
 	name VARCHAR(20), /* Отображаемое имя */
 	email VARCHAR(255) UNIQUE, /* Почта */
 	PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=UTF8;


/*  Вставляем первую запись в la_question */
INSERT INTO `salestel`.`la_question` (`id`, `question`, `meta`)
VALUES (NULL, '%s добрый день! Делаем звонок?', '%s имя пользователя, в плане брать из БД, пока авторизации нет'), (NULL,'Ну и досвидание!','Конец этой ветки'),
(NULL,'Тогда не тормози, набирай номер','Ничего интересного'), (NULL, 'Спроси имя и должность', 'Здесь в будущем будем принимать данные'),
(NULL, 'Поробуешь еще раз? Если нет, жмакай на Завершение', 'Надо подумать');

/* Вставляем в la_answer два ответа на первый вопрос в la_question, пока без ссылки на следующий вопрос*/
INSERT INTO `salestel`.`la_answer` (`id`, `id_question`, `id_next_question`, `answer`, `meta`)
VALUES (NULL, 1, 4, 'Да', NULL), (NULL, 1, 3, 'Нет', NULL), (NULL, 4, 5, 'Дозвонился?', 'Ничего интересного'),
(NULL, 4, 6, 'Не туда попал', 'Ничего интересного'), (NULL, 5, NULL, 'Если секретарь, спроси директора' , 'Будем сохранять данные директора, если есть'),
(NULL, 6, 1, 'Пробуем', 'Возвращаемся на ID1'), (NULL, 3, NULL, 'Зря ты так', 'Последняя ветка');

/*  Вводим пользователей */
INSERT INTO `users`(`login`, `pass`, `name`, `email`) VALUES ('yekorotin', '12345678', 'Евгений', 'yekorotin@ukrtelecom.ua'), 
('mobuhovskiy', '12345678', 'Максим', 'mobuhovskiy@ukrtelecom.ua'), ('pgrygoryev', '12345678', 'Павел', 'pgrygoryev@ukrtelecom.ua'), 
('angel', '12345678', 'Евгений', 'stang8@ukr.net'), ('root', '12345678', 'Admin', 'angel@mirnew.net');



/* Выборка вопроса и ответов на него*/
SELECT question.a, answer.b
FROM la_question a, la_answer b
WHERE a.id = b.id_question;
