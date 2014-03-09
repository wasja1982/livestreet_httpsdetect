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

class PluginHttpsdetect_ModuleTopic_EntityTopic extends PluginHttpsdetect_Inherit_ModuleTopic_EntityTopic {
	/**
	 * Возвращает текст топика
	 *
	 * @return string|null
	 */
	public function getText() {
        return PluginHttpsdetect::CorrectImages(parent::getText());
	}
	/**
	 * Возвращает короткий текст топика (до ката)
	 *
	 * @return string|null
	 */
	public function getTextShort() {
        return PluginHttpsdetect::CorrectImages(parent::getTextShort());
	}
}
?>