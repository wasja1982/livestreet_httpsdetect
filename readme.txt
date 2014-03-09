Плагин "HTTPS Detect" (версия 1.0.1) для LiveStreet 1.0.3


ОПИСАНИЕ

Плагин отслеживает схему, использованную пользователем для входа на сайт
(HTTP или HTTPS) и корректирует значение "$config['path']['root']['web']"
и ссылки на JS и CSS файлы, ссылки на аватары и фотографии пользователей,
ссылки на изображения в фотосете, а также ссылки на изображения и видио в
тексте топиков, комментариев и т.д.

Настройка плагина осуществляется редактированием файла "/plugins/httpsdetect/config/config.php".

Поддерживаемые директивы:
1. $config['correct_js_link'] - Обрабатывать ссылки на JS-файлы. По умолчанию включено (true).

2. $config['correct_css_link'] - Обрабатывать ссылки на CSS-файлы. По умолчанию включено (true).

3. $config['correct_img_src'] - Обрабатывать ссылки на изображения в тексте. По умолчанию включено (true).

4. $config['correct_video_src'] - Обрабатывать ссылки на видео в тексте. По умолчанию включено (true).

5. $config['separate_path'] - Использовать отдельный путь для хранения JS и CSS файлов HTTPS протокола.
По умолчанию отключено (false).

Обработка ссылок на изображения и видео в тексте осуществляется:
- в тексте топиков;
- в тексте комментариев;
- в тексте статических страниц (плагин "Static Page");
- в описании блога;
- в сообщениях;
- в записях на стене;
- в информации пользователей "О себе".



УСТАНОВКА

1. Скопировать плагин в каталог /plugins/
2. Через панель управления плагинами (/admin/plugins/) запустить его активацию.

При использовании перед Apache в качестве frontend сервера nginx необходимо добавить в его конфигурацию строку
proxy_set_header X-Forwarded-Proto $scheme;



ИЗВЕСТНЫЕ ПРОБЛЕМЫ

1. При заходе по HTTPS не загружаются файлы в фотосете (с использование SWF-загрузчика).
Причина в самом загрузчике, который не работает по HTTPS протоколу.
Решение: не использовать загрузчик.

2. При использовании шаблона «Synio» идет загрузка Google-шрифтов по HTTP протоколу.
Решение:
    — в файле "/templates/skin/synio/header.tpl" удалить строку
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    — в файле "/templates/skin/synio/settings/config/config.php" добавить в массив
$config['head']['default']['css'] = array(
...
);
    строку
"http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic" => array('merge'=>false),

3. При использовании плагина "Gravatar" аватары всегда загружаются по HTTP протоколу.
Решение: заменить в файле "/plugins/gravatar/classes/modules/gravatar/entity/User.entity.class.php"
    строку
return "http://www.gravatar.com/avatar/".md5(strtolower($this->getMail())).".png?size=".$iSize;
    на строку
return (Config::Get('plugin.httpsdetect.https') ? "https" : "http") . "://www.gravatar.com/avatar/".md5(strtolower($this->getMail())).".png?size=".$iSize;



ИЗМЕНЕНИЯ
1.0.1 (09.03.2014):
- Исправлены ошибки.
- Добавлен параметр $config['correct_video_src'] - Обрабатывать ссылки на видео в тексте.
- Добавлена коррекция параметра конфигурации 'path.static.root'.
- Добавлена поддержка плагина "Domain for static".



АВТОР
Александр Вереник

САЙТ 
https://github.com/wasja1982/livestreet_httpsdetect
