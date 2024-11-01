# URL Shortener

Проект представляет собой сервис сокращения URL, который позволяет пользователю преобразовать длинный URL-адрес в уникальный короткий. Преобразованный URL можно использовать для быстрого перенаправления на оригинальный адрес. Сервис гарантирует постоянство и уникальность ссылок.

## Функциональные возможности

1. **Ввод оригинального URL** — посетитель вводит URL-адрес (например, `http://domain.com/any/path`) в поле ввода.
2. **Генерация короткого URL** — после отправки оригинальной ссылки через кнопку **Submit** выполняется AJAX-запрос на сервер.
3. **Вывод короткого URL** — уникальный сокращенный URL-адрес отображается на странице (например, `http://yourdomain.com/abCdE`).
4. **Повторное использование** — посетитель может скопировать короткий URL-адрес и повторить процесс для новой ссылки.
5. **Постоянство ссылок** — каждый сокращенный URL уникален и будет актуален навсегда, независимо от количества переходов.

## Технические требования

- **Backend**: PHP для обработки URL и сохранения в базе данных.
- **Frontend**: HTML, CSS, JS (с использованием jQuery и Bootstrap для оформления и удобства).
- **База данных**: PostgreSQL для хранения оригинальных и сокращенных ссылок.
- **Прямое перенаправление** — каждая короткая ссылка перенаправляет пользователя на соответствующий оригинальный URL.

## Установка

1. Клонируйте репозиторий:
   ```bash
   git clone https://github.com/CodeByte0xFF/ShortLinks.git
   ```
2. Запустите docker контейнер:
   ```bash
   docker-compose up --build -d
   ```
3. URL Shortener доступен в браузере: `http://localhost/`

## Лицензия

Этот проект распространяется по лицензии MIT. Подробности см. в файле LICENSE.
