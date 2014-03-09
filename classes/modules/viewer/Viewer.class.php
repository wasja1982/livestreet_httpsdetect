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

class PluginHttpsdetect_ModuleViewer extends PluginHttpsdetect_Inherit_ModuleViewer {
	public function ReloadFileParams() {
        $this->aFilesDefault = array('js'  => array(), 'css' => array());
        $this->InitFileParams();
	}

	public function GetAssignAjax($sName) {
        return $this->aVarsAjax[$sName];
	}
}
?>