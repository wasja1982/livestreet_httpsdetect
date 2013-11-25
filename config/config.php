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

$config = array();

$sUrl = Config::Get('path.root.web');

$bHttps = ((isset($_SERVER['HTTP_SCHEME']) && strtolower($_SERVER['HTTP_SCHEME']) == 'https') ||
           (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
           (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https') ||
           $_SERVER['SERVER_PORT'] == 443);

Config::Set('path.root.web', ($bHttps ? str_replace('http://', 'https://', $sUrl) : str_replace('https://', 'http://', $sUrl)));

return $config;