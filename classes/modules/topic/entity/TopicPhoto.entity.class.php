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

class PluginHttpsdetect_ModuleTopic_EntityTopicPhoto extends PluginHttpsdetect_Inherit_ModuleTopic_EntityTopicPhoto {
	/**
	 * Вовзращает полный веб путь до фото
	 *
	 * @return mixed|null
	 */
	public function getPath() {
        $sPath = parent::getPath();
        $bHttps = Config::Get('plugin.httpsdetect.https');
		if ($bHttps) {
            $sPath = str_replace('http://', 'https://', $sPath);
        }
		return $sPath;
	}
}