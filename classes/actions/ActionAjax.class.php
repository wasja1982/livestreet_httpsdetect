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

class PluginHttpsdetect_ActionAjax extends PluginHttpsdetect_Inherit_ActionAjax {
	/**
	 * Предпросмотр текста
	 *
	 */
	protected function EventPreviewText() {
        parent::EventPreviewText();
		$this->Viewer_AssignAjax('sText', PluginHttpsdetect::CorrectImages($this->Viewer_GetAssignAjax('sText')));
	}
}
?>