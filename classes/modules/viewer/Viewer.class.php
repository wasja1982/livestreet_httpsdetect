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

class PluginHttpsdetect_ModuleViewer extends PluginStaticdomain_Inherit_ModuleViewer {
	public function ReloadFileParams() {
        $this->aFilesDefault = array('js'  => array(), 'css' => array());
        $this->InitFileParams();
	}
}
?>