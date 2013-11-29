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

class PluginHttpsdetect_ModuleUser_EntityUser extends PluginHttpsdetect_Inherit_ModuleUser_EntityUser {
	/**
	 * Возвращает полный веб путь до аватра
	 *
	 * @return string|null
	 */
	public function getProfileAvatar() {
        $sAvatar = parent::getProfileAvatar();
        $bHttps = Config::Get('plugin.httpsdetect.https');
		if ($bHttps) {
            $sAvatar = str_replace('http://', 'https://', $sAvatar);
        }
		return $sAvatar;
	}
	/**
	 * Возвращает полный веб путь до фото
	 *
	 * @return string|null
	 */
	public function getProfileFoto() {
        $sFoto = parent::getProfileFoto();
        $bHttps = Config::Get('plugin.httpsdetect.https');
		if ($bHttps) {
            $sFoto = str_replace('http://', 'https://', $sFoto);
        }
		return $sFoto;
	}
}
?>