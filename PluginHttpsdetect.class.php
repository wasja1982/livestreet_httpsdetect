<?php
/**
 * HTTPS Detect - отслеживание HTTP / HTTPS входа на сайт
 *
 * Версия:	1.0.0
 * Автор:	Александр Вереник
 * Профиль:	http://livestreet.ru/profile/Wasja/
 * GitHub:	https://github.com/wasja1982/livestreet_httpsdetect
 *
 **/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (! class_exists ( 'Plugin' )) {
    die ( 'Hacking attemp!' );
}

class PluginHttpsdetect extends Plugin {

    /**
     * Активация плагина
     */
    public function Activate() {
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {
        return true;
    }
}