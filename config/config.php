<?php
/**
 * HTTPS Detect - отслеживание HTTP / HTTPS входа на сайт
 *
 * Версия:	1.0.1
 * Автор:	Александр Вереник
 * Профиль:	http://livestreet.ru/profile/Wasja/
 * GitHub:	https://github.com/wasja1982/livestreet_httpsdetect
 *
 **/

$config = array();

// Обрабатывать ссылки на JS-файлы
$config['correct_js_link'] = true;

// Обрабатывать ссылки на CSS-файлы
$config['correct_css_link'] = true;

// Обрабатывать ссылки на изображения в тексте
$config['correct_img_src'] = true;

// Обрабатывать ссылки на видео в тексте
$config['correct_video_src'] = true;

// Использовать отдельный путь для хранения JS и CSS файлов HTTPS протокола
$config['separate_path'] = false;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// НЕ ИЗМЕНЯТЬ (коррекция служебных параметров)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$bHttps = ((isset($_SERVER['HTTP_SCHEME']) && strtolower($_SERVER['HTTP_SCHEME']) == 'https') ||
           (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
           (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https') ||
           $_SERVER['SERVER_PORT'] == 443);

$sUrl = Config::Get('path.root.web');
Config::Set('path.root.web', ($bHttps ? str_replace('http://', 'https://', $sUrl) : str_replace('https://', 'http://', $sUrl)));
$sUrl = Config::Get('path.static.root');
Config::Set('path.static.root', ($bHttps ? str_replace('http://', 'https://', $sUrl) : str_replace('https://', 'http://', $sUrl)));
$config['https'] = $bHttps;

if ($config['separate_path']) {
    Config::Set('path.smarty.cache', Config::Get('path.smarty.cache') . ($bHttps ? DIRECTORY_SEPARATOR . 'https' : ''));
    @mkdir(Config::Get('path.smarty.cache'), 0755, true);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

return $config;