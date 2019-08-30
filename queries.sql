/* Добавление значений в таблицу categories */
INSERT INTO categories
SET name = 'Доски и лыжи', code = 'boards';
INSERT INTO categories
SET name = 'Крепления', code = 'attachment';
INSERT INTO categories
SET name = 'Ботинки', code = 'boots';
INSERT INTO categories
SET name = 'Одежда', code = 'clothing';
INSERT INTO categories
SET name = 'Инструменты', code = 'tools';
INSERT INTO categories
SET name = 'Разное', code = 'other';

/* Заполнение таблицы users */
INSERT INTO users
SET email='mail@mail.ru', name='Alica', password='111', contacts='Адрес: Страна Чудес';

INSERT INTO users
SET email='test@post.ru', name='Карлсон', password='qwerty', contacts='Живет на крыше';


/* Заполнение таблицы lots */
INSERT INTO lots
SET name = '2014 Rossignol District Snowboard', end_time = '2019-09-02', description='', image_link='img/lot-1.jpg', starting_price = 10999, step_bid = 10, user_id = 2, category_id = 1;
INSERT INTO lots
SET name = 'DC Ply Mens 2016/2017 Snowboard', creation_time = '2019-08-10 10:15:20', end_time = '2019-09-10', description='', image_link='img/lot-2.jpg', starting_price = 159999, step_bid = 20, user_id = 1, category_id = 1;
INSERT INTO lots
SET name = 'Крепления Union Contact Pro 2015 года размер L/XL', creation_time = '2019-08-20 12:20:05', end_time = '2019-09-15', description='', image_link='img/lot-3.jpg', starting_price = 8000, step_bid = 50, user_id = 1, category_id = 2;
INSERT INTO lots
SET name = 'Ботинки для сноуборда DC Mutiny Charocal', creation_time = '2019-08-15 09:00:20', end_time = '2019-08-20', description='', image_link='img/lot-4.jpg', starting_price = 10999, step_bid = 10, user_id = 2, category_id = 3;
INSERT INTO lots
SET name = 'Куртка для сноуборда DC Mutiny Charocal', creation_time = '2019-08-25 14:15:08', end_time = '2019-09-05', description='', image_link='img/lot-5.jpg', starting_price = 7500, step_bid = 15, user_id = 2, category_id = 4;
INSERT INTO lots
SET name = 'Маска Oakley Canopy', creation_time = '2019-08-19 21:15:01', end_time = '2019-09-07', description='', image_link='img/lot-6.jpg', starting_price = 5400, step_bid = 5, user_id = 2, category_id = 5;

/* Заполнение таблицы bids */
INSERT INTO `bids` (`amount`, `user_id`, `lot_id`)
VALUES (11500, 2, 1), (11200, 2, 1);

/*Вывод всех категорий */
SELECT * FROM categories;

/*Вывод новых, открытых лотов. */
SELECT l.name, creation_time, starting_price, image_link, c.name
FROM lots l
JOIN categories c ON l.category_id = c.id
WHERE end_time > now()
ORDER BY creation_time DESC;

/* показать лот по его id */
SELECT l.name, l.creation_time, starting_price, image_link, c.name, u.name, email
FROM lots l
JOIN categories c ON l.category_id = c.id
join users u ON l.user_id = u.id
WHERE l.id = 2;


/* обновление названия лота по его идентификатору */
UPDATE lots SET name = 'Крутая куртка для сноуборда DC Mutiny Charocal'
Where id = 5;


/* получение списка ставок для лота по его идентификатору с сортировкой по дате */
SELECT b.creation_time, u.name, u.email, l.name, amount
FROM bids b
JOIN users u ON b.user_id = u.id
JOIN lots l ON b.lot_id = l.id
WHERE b.lot_id = 1
ORDER BY b.creation_time DESC;
