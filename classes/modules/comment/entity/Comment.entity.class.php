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

class PluginHttpsdetect_ModuleComment_EntityComment extends PluginHttpsdetect_Inherit_ModuleComment_EntityComment {
	/**
	 * Возвращает текст комментария
	 *
	 * @return string|null
	 */
	public function getText() {
        return PluginHttpsdetect::CorrectImages(parent::getText());
	}
}
?>