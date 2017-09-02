Self-developed MVC project, was made as a test task, written below. To start using project install composer dependencies using `composer install`.

Database configures in `config/db.php`. Table lays in root directory (bee-task.sql). There is no rows, so you have to add it by yourself or better create task on site to upload an image on server. 
Live example: &#128029;[bee-task.zzz.com.ua](http://bee-task.zzz.com.ua). &#128029;

### Task text

Создать приложение-задачник.
Задачи состоят из:
- имени пользователя;
- е-mail;
- текста задачи;
- картинки;

Стартовая страница - список задач с возможностью сортировки (обязательный пункт) по имени пользователя, email и статусу. Вывод задач нужно сделать страницами по 3 штуки (с пагинацией). Видеть список задач и создавать новые может любой посетитель без регистрации. 

Перед сохранением новой задачи можно нажать "Предварительный просмотр" (обязательный пункт), он должен работать без перезагрузки страницы. 

К задаче можно прикрепить картинку. Требования к изображениям - формат JPG/GIF/PNG, не более 320х240 пикселей. При попытке загрузить изображение большего размера, картинка должна быть пропорционально уменьшена до заданных размеров.

Сделать вход для администратора (логин "admin", пароль "123"). Администратор имеет возможность редактировать текст задачи и поставить галочку о выполнении. Выполненные задачи в общем списке выводятся с соответствующей отметкой.

В приложении нужно с помощью чистого PHP реализовать модель MVC. Фреймворки PHP использовать нельзя, библиотеки - можно. Верстка на bootstrap. К дизайну особых требований нет, но должно выглядеть аккуратно.

Результат нужно развернуть на любом бесплатном хостинге, (как пример - zzz.com.ua) чтобы можно было посмотреть его в действии.
