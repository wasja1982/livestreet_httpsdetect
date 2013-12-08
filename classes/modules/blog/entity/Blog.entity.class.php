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

class PluginHttpsdetect_ModuleBlog_EntityBlog extends PluginHttpsdetect_Inherit_ModuleBlog_EntityBlog {
	/**
	 * Возвращает описание блога
	 *
	 * @return string|null
	 */
	public function getDescription() {
        return PluginHttpsdetect::CorrectImages(parent::getDescription());
	}
}
?>